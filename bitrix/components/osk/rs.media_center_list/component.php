<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $arParam['MAIN_PAGE'] виджет главной страницы
 * $arParams['COUNT_PAGE'] колличество на странице
 * $_REQUEST['SECTION'] - ID раздела
 * $_REQUEST['ID'] - ID элемента
 */


if (CModule::IncludeModule("iblock")) {
    //Получаем массив разделов изображений
    $arFilter = Array("IBLOCK_CODE"=>array("photo", "video"), "GLOBAL_ACTIVE"=>"Y");
    $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
    while($ar_result = $db_list->GetNext()){
        $section[$ar_result['ID']] = $ar_result;
    }
    //Получаем массив связанных материалов
    $arSelect = Array("*");
    $arFilter = Array("IBLOCK_CODE"=>array("photo", "video"), "ACTIVE"=>"Y");
    //Фильтр для главной страницы
    if(!empty($arParams['MAIN_PAGE'])){
        $arFilter['!PROPERTY_SHOW_MAIN_PAGE'] = false;
    }
    //Фильтр по ID раздела
    if(!empty($_REQUEST['SECTION'])){
        $arFilter['SECTION_ID'] = $_REQUEST['SECTION'];
    }
    //Фильтр по ID элемента
    if(!empty($_REQUEST['ID'])){
        $arFilter['ID'] = $_REQUEST['ID'];
        $arFilter['ACTIVE'] = '';
    }
    //Фильтр по коду раздела
    if(!empty($_REQUEST['SECTION_CODE'])){
        $arFilter['SECTION_CODE'] = $_REQUEST['SECTION_CODE'];
    }
    $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk', 'sort'=>'asc'), $arFilter, false, array('nPageSize'=>$arParams['COUNT_PAGE']), $arSelect);
    while($ob = $res->GetNextElement()){
        $arProps = $ob->GetProperties();
        $arFields = $ob->GetFields();
        $arResult['ELEMENTS'][$arFields['ID']]['ITEM'] = $arFields;
        $arResult['ELEMENTS'][$arFields['ID']]['PROP'] = $arProps;
        if(!empty($arFields['IBLOCK_SECTION_ID'])){
            $arResult['SECTION'][$section[$arFields['IBLOCK_SECTION_ID']]['CODE']] = $section[$arFields['IBLOCK_SECTION_ID']];
        } else {
            $arResult['ALL_CATEGORY']++;
        }
    }
    $arResult['COUNT'] = $res->NavPageCount;
}

$this->IncludeComponentTemplate();