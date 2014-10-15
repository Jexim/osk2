<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * 
 */

if (CModule::IncludeModule("iblock")) {        
    //Получаем массив вакансий
    $arFilter = Array("IBLOCK_CODE"=>"vacancies", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult[$ob['ID']] = $ob;
    }
}

$this->IncludeComponentTemplate();