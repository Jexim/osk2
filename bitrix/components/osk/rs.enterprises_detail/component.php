<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $_REQUEST['ELEMENT_CODE'] символьный код предприятия
 */

if (CModule::IncludeModule("iblock")) {
    //Делаем выборку в зависимости от языка
    if(SITE_ID!='s1'){
        $lang_prefix = '_' . SITE_ID;
    }
    $arSelect = Array("ID", "NAME");
    //Получаем массив городов
    $arFilter = Array("IBLOCK_CODE"=>"city" . $lang_prefix, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['CITY'][$ob['ID']] = $ob;
    }
    
    //Получаем массив характеристик
    $arFilter = Array("IBLOCK_CODE"=>"characteristics_enterprise" . $lang_prefix, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['CHARACTERISTICS'][$ob['ID']] = $ob;
    }

    $arSelect = Array("ID", "NAME", "PROPERTY_CITY", "PROPERTY_CHARACTERISTICS", "PROPERTY_FULL_NAME",
        "DETAIL_TEXT", "PROPERTY_URL", "PROPERTY_ADDRESS", "PROPERTY_FAX", "PROPERTY_PHONE", "PROPERTY_EMAIL",
        "DETAIL_PICTURE", "PROPERTY_LEADER_NAME", "PREVIEW_PICTURE", "PROPERTY_POSITION", "*");
    $arFilter = Array("IBLOCK_CODE"=>"companies_list" . $lang_prefix, "ACTIVE"=>"Y", "CODE"=>$_REQUEST['ELEMENT_CODE']);
    //Получаем массив предприятий    
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()){
        $arCharacteristics = array();
        $arProps = $ob->GetProperties();
        $arFields = $ob->GetFields();
        $arResult['ELEMENT'] = $arFields;
        $arResult['ELEMENT']['PROPERTY_PHONE_VALUE'] = trim(implode($arProps['PHONE']['VALUE'], ', '));
        //Преводим список характеристик к нужному виду
        $i=0;
        foreach ($arProps['CHARACTERISTICS']['VALUE'] as $characteristics){
            if($i==0){
                $arCharacteristics[] = $arResult['CHARACTERISTICS'][$characteristics]['NAME'];
            } else {
                $arCharacteristics[] = strtolower($arResult['CHARACTERISTICS'][$characteristics]['NAME']);
            }
            $i++;
        }
        $arResult['ELEMENT']['PROPERTY_CHARACTERISTICS_VALUE'] = trim(implode($arCharacteristics, ', '));
    }
    //Ошибка 404
    if(empty($arResult['ELEMENT'])){
        LocalRedirect("/404.php");
    }
}

$this->IncludeComponentTemplate();