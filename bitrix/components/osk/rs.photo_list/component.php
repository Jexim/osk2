<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $_REQUEST['SECTION'] - ID раздела
 * $arParam['COUNT_PAGE'] колличество на странице
 */

if (CModule::IncludeModule("iblock")) {   
    //Получаем массив разделов изображений
    $arFilter = Array("IBLOCK_CODE"=>"photo", "GLOBAL_ACTIVE"=>"Y");
    $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
    while($ar_result = $db_list->GetNext()){
        $section[$ar_result['ID']] = $ar_result;
    }
    //Получаем массив изображений
    $arSelect = Array("ID", "NAME", "DETAIL_TEXT", "DETAIL_PICTURE", "IBLOCK_SECTION_ID", "PROPERTY_BIG_IMG", "PREVIEW_PICTURE");   
    $arFilter = Array("IBLOCK_CODE"=>"photo", "ACTIVE"=>"Y");
    if(!empty($_REQUEST['SECTION'])){
        $arFilter['SECTION_ID'] = $_REQUEST['SECTION'];
    }
    $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk', 'sort'=>'asc'), $arFilter, false, array('nPageSize'=>$arParam['COUNT_PAGE']), $arSelect);
    while($ob = $res->GetNext()){
        $arResult['ITEM'][$ob['ID']] = $ob;
        if(!empty($ob['IBLOCK_SECTION_ID'])){
            $arResult['SECTION'][$ob['IBLOCK_SECTION_ID']] = $section[$ob['IBLOCK_SECTION_ID']];
        } else {
            $arResult['ALL_CATEGORY']++;
        }
    }
    $arResult['COUNT'] = $res->NavPageCount;
}

$this->IncludeComponentTemplate();