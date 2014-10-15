<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $arParams["SECTION_ID"] - ID раздела (Совет директоров/Менеджмент/Сотрудники)
 */

if (CModule::IncludeModule("iblock")) {        
    //Делаем выборку в зависимости от языка
    if(SITE_ID!='s1'){
        $lang_prefix = '_' . SITE_ID;
    }
    //Получаем массив директоров
    $arSelect = Array("ID", "NAME", "PROPERTY_POSITION", "PROPERTY_PLACE_WORK", "DETAIL_PICTURE", "PREVIEW_TEXT", "PROPERTY_FELLOW");
    $arFilter = Array("IBLOCK_CODE"=>"employees" . $lang_prefix, "ACTIVE"=>"Y");
    if(!empty($arParams["HALL_FAME"])){
        $arFilter["!PROPERTY_FELLOW"] = false;
    }
    if(!empty($arParams["SECTION_ID"])){
        $arFilter["SECTION_ID"] = $arParams["SECTION_ID"];
    }
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult[$ob['ID']] = $ob;
    }
}

$this->IncludeComponentTemplate();