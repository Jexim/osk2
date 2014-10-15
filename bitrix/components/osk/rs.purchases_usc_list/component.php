<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (CModule::IncludeModule("iblock")) {
    //Получаем массив документов
    $arSelect = Array("*");
    $arFilter = Array("IBLOCK_CODE"=>"purchases_usc", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();
        $arResult['ELEMENTS'][$arFields['IBLOCK_SECTION_ID']][$arFields['ID']]['PROP'] = $arProps;
        $arResult['ELEMENTS'][$arFields['IBLOCK_SECTION_ID']][$arFields['ID']]['ITEM'] = $arFields;
    }
}

$this->IncludeComponentTemplate();