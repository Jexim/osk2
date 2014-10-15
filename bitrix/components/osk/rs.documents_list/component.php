<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * 
 */

if (CModule::IncludeModule("iblock")) {        
    $arSelect = Array("ID", "NAME", "PROPERTY_FILE", "DATE_ACTIVE_FROM");
    //Получаем массив документов
    $arFilter = Array("IBLOCK_CODE"=>"documents", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult[$ob['ID']] = $ob;
        $arResult[$ob['ID']]['FILE'] = CFile::GetFileArray($ob['PROPERTY_FILE_VALUE']); 
    }
}

$this->IncludeComponentTemplate();