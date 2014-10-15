<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (CModule::IncludeModule("iblock")) {   
    //Делаем выборку в зависимости от языка
    if(SITE_ID=='en'){
         $lang_prefix = '_en';
    }    
    //Получаем массив проектов
    $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "SECTION_ID", "PROPERTY_TOP_IMAGES", "ACTIVE", "PROPERTY_SHORT_TEXT");
    $arFilter = Array("IBLOCK_CODE"=>"products" . $lang_prefix);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['PRODUCTS'][$ob['ID']] = $ob;
    }
    //Получаем массив слайдов   
    $arSelect = Array("ID", "NAME", "DETAIL_TEXT", "DETAIL_PICTURE", "PROPERTY_VIDEO", "PROPERTY_RELATED_PRODUCTS", "PROPERTY_RELATED_VIDEO", "PROPERTY_URL");
    $arFilter = Array("IBLOCK_CODE"=>"slider" . $lang_prefix, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['ITEM'][$ob['ID']] = $ob;
        $arResult['ITEM'][$ob['ID']]['SECTION'] = getParent($arResult['PRODUCTS'][$ob['PROPERTY_RELATED_PRODUCTS_VALUE']]['IBLOCK_SECTION_ID']);
    }
    //Получаем массив видео
    $arSelect = Array("ID", "NAME", "PROPERTY_VIDEO_STRING", "PROPERTY_VIDEO", "PREVIEW_PICTURE");   
    $arFilter = Array("IBLOCK_CODE"=>"video" . $lang_prefix);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['VIDEO'][$ob['ID']] = $ob;    
    }
}

$this->IncludeComponentTemplate();