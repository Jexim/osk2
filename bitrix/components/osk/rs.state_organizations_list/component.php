<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (CModule::IncludeModule("iblock")) {   
    //Делаем выборку в зависимости от языка
    if(SITE_ID!='s1'){
        $lang_prefix = '_' . SITE_ID;
    } 
    //Получаем массив госучреждений
    $arSelect = Array("ID", "NAME", "PROPERTY_NAME_EN", "DETAIL_PICTURE", "PREVIEW_PICTURE", "PROPERTY_URL");
    $arFilter = Array("IBLOCK_CODE"=>"state_organizations" . $lang_prefix, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['ITEM'][$ob['ID']] = $ob;
    }
}

$this->IncludeComponentTemplate();