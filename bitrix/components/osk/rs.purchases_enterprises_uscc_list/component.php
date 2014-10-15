<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * 
 */

if (CModule::IncludeModule("iblock")) {        
    $arSelect = Array("ID", "NAME", "PROPERTY_LINK_PURCHASE");
    //Получаем массив документов
    $arFilter = Array("IBLOCK_CODE"=>"companies_list", "ACTIVE"=>"Y", "!PROPERTY_LINK_PURCHASE"=>false);
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult[$ob['ID']] = $ob;
    }
}

$this->IncludeComponentTemplate();