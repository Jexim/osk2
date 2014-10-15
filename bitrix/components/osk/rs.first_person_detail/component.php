<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $_REQUEST['ELEMENT_CODE'] код элемента
 */


if (CModule::IncludeModule("iblock")) {    
    //Делаем выборку в зависимости от языка
    if(SITE_ID!='s1'){
        $lang_prefix = '_' . SITE_ID;
    }
    //Получаем обращение
    $arSelect = Array("*");
    $arFilter = Array("IBLOCK_CODE"=>"handling" . $lang_prefix, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    if(!empty($_REQUEST['ELEMENT_CODE'])){
        $arFilter['CODE'] = $_REQUEST['ELEMENT_CODE'];
    }
    $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()){
        $arProps = $ob->GetProperties();
        $arFields = $ob->GetFields();
        $arResult['ELEMENT']['ITEM'] = $arFields;
        $arResult['ELEMENT']['PROP'] = $arProps;
    }
    //Получаем связанного сотрудника
    if(!empty($arResult['ELEMENT']['PROP']['RELATED_EMPLOYEE']['VALUE'])){
        $arSelect = Array("ID", "NAME", "PROPERTY_POSITION", "PROPERTY_PLACE_WORK", "DETAIL_PICTURE");
        $arFilter = Array("IBLOCK_CODE"=>"employees"  . $lang_prefix, "ID"=>$arResult['ELEMENT']['PROP']['RELATED_EMPLOYEE']['VALUE']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNext()){
            $arResult['EMPLOYEE'] = $ob;
        }
    }
    //Получаем массив предыдущих обращений
    $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_CODE"=>"handling" . $lang_prefix, "ACTIVE"=>"Y", "<DATE_ACTIVE_FROM"=>$arResult['ELEMENT']['ITEM']['DATE_ACTIVE_FROM']);
    $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['HANDLING'][$ob['ID']] = $ob;
    }
    if(!empty($arResult['ELEMENT']['PROP']['RELATED_MATERIALS']['VALUE'])){
        //Получаем массив связанных материалов
        $arSelect = Array("*");
        $arFilter = Array("ACTIVE"=>"Y", "ID"=>$arResult['ELEMENT']['PROP']['RELATED_MATERIALS']['VALUE']);
        $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk', 'sort'=>'asc'), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement()){           
            $arProps = $ob->GetProperties();
            $arFields = $ob->GetFields();       
            if($arFields['IBLOCK_CODE'] == 'photo' || $arFields['IBLOCK_CODE'] == 'video'){
                $arResult['RELATED_MATERIALS']['photo_video'][$arFields['ID']]['ITEM'] = $arFields;
                $arResult['RELATED_MATERIALS']['photo_video'][$arFields['ID']]['PROP'] = $arProps;
            } else {
                $arResult['RELATED_MATERIALS'][$arFields['IBLOCK_CODE']][$arFields['ID']]['ITEM'] = $arFields;
                $arResult['RELATED_MATERIALS'][$arFields['IBLOCK_CODE']][$arFields['ID']]['PROP'] = $arProps;
            }
        }
    }
    //Ошибка 404
    if(empty($arResult['ELEMENT'])){
        LocalRedirect("/404.php");
    }
}

$this->IncludeComponentTemplate();