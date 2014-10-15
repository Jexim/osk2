<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $_REQUEST['ELEMENT_CODE'] код элемента
 */


if (CModule::IncludeModule("iblock")) {    
    $arSelect = Array("*");
    $arFilter = Array("IBLOCK_CODE"=>"media_corporation", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>$_REQUEST['ELEMENT_CODE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()){
        $arProps = $ob->GetProperties();
        $arFields = $ob->GetFields();
        $arResult['ELEMENT']['ITEM'] = $arFields;
        $arResult['ELEMENT']['PROP'] = $arProps;
    }
    //Получаем комментарии
    $arSelect = Array("ID", "NAME", "DETAIL_TEXT", "PROPERTY_RELATED_EMPLOYEE");
    $arFilter = Array("IBLOCK_CODE"=>"comments", "ACTIVE"=>"Y", "PROPERTY_RELATED_ARTICLE"=>$arResult['ELEMENT']['ITEM']['ID']);
    $res = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['COMMENTS'][$ob['ID']] = $ob;
    }
    //Получаем массив сотрудников
    $arSelect = Array("ID", "NAME", "DETAIL_PICTURE", "PROPERTY_POSITION");
    $arFilter = Array("IBLOCK_CODE"=>"employees", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['EMPLOYEES'][$ob['ID']] = $ob;
    }
    //Ошибка 404
    if(empty($arResult['ELEMENT'])){
        LocalRedirect("/404.php");
    }
}

$this->IncludeComponentTemplate();