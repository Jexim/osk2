<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (CModule::IncludeModule("iblock")) {      
    //Делаем выборку в зависимости от языка
    if(SITE_ID!='s1'){
        $lang_prefix = '_' . SITE_ID;
    }
    //Получаем массив документов
    $arSelect = Array("ID", "NAME", "PROPERTY_ADDRESS", "DATE_ACTIVE_FROM", "PROPERTY_FAX", "PROPERTY_PHONE", "PROPERTY_EMAIL", "PROPERTY_COORDINATES");
    $arFilter = Array("IBLOCK_CODE"=>"contacts" . $lang_prefix, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult[$ob['ID']] = $ob;
    }
}

$this->IncludeComponentTemplate();