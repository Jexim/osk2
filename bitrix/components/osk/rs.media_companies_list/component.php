<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (CModule::IncludeModule("iblock")) {   
    //Получаем массив журналов
    $arSelect = Array("ID", "NAME", "DETAIL_PICTURE", "PROPERTY_URL");   
    $arFilter = Array("IBLOCK_CODE"=>"media_companies", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['ITEM'][$ob['ID']] = $ob;
    }  
}

$this->IncludeComponentTemplate();