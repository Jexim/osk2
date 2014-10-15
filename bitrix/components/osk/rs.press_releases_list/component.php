<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $_REQUEST['YEAR'] год
 * $arParams['COUNT_PAGE'] колличество на странице
 * $arParams['PRODUCT_ID'] ID проекта
 */

$arMounth = array('01' => 'Январь', '02' => 'Февраль', '03' => 'Март', '04' => 'Апрель',
    '05' => 'Май', '06' => 'Июнь', '07' => 'Июль', '08' => 'Август', '09' => 'Сентябрь',
    '10' => 'Октябрь', '11' => 'Ноябрь', '12' => 'Декабрь', );

if (CModule::IncludeModule("iblock")) {            
    if(!empty($_REQUEST['YEAR'])){
        //Пресс-релизы заданого года
        $arResult['THIS_YEAR'] = $_REQUEST['YEAR'];     
    } else {
        //Пресс-релизы текущего года
        $arResult['THIS_YEAR'] = date('Y');
    }
    if(empty($_REQUEST['MONTH'])){    
        //Пресс-релизы всего года
        $arFilter = Array("IBLOCK_CODE"=>"press_releases", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", ">=DATE_ACTIVE_FROM" => "01.01." . $arResult['THIS_YEAR'], "<=DATE_ACTIVE_FROM" => "31.12." . $arResult['THIS_YEAR']);
        
    } else {
        //Пресс-релизы заданого месяца    
        $arFilter = Array("IBLOCK_CODE"=>"press_releases", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", ">=DATE_ACTIVE_FROM" => "01." . $_REQUEST['MONTH'] . "." . $arResult['THIS_YEAR'], "<=DATE_ACTIVE_FROM" => "31." . $_REQUEST['MONTH'] . "." . $arResult['THIS_YEAR']);
    }
    //Фильтр по продуктам
    if(!empty($_REQUEST['PRODUCT_ID'])){
        $arFilter['PROPERTY_RELATED_PRODUCTS'] = $_REQUEST['PRODUCT_ID'];
        $arFilter['>=DATE_ACTIVE_FROM'] = null;
        $arFilter['<=DATE_ACTIVE_FROM'] = null;
    }
    //Получаем массив пресс-релизов
    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "DETAIL_PICTURE", "DETAIL_PAGE_URL");   
    $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk', 'sort'=>'asc'), $arFilter, false, array('nPageSize'=>$arParams['COUNT_PAGE']), $arSelect);
    while($ob = $res->GetNext()){
        $arResult['ITEM'][$ob['ID']] = $ob;
        $arResult['ITEM'][$ob['ID']]['DATE'] = FormatDateFromDB($ob['DATE_ACTIVE_FROM'], 'DD MMMM');
    }
    
    $arResult['PAGINATION'] = $res->GetPageNavStringEx($navComponentObject, "", "press_releases");
    //Получаем года пресс-релизов
    $arSelect = Array("DATE_ACTIVE_FROM");
    $arFilter = Array("IBLOCK_CODE"=>"press_releases", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arDate = ParseDateTime($ob['DATE_ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS");
        $arResult['YEAR'][$arDate['YYYY']] = $arDate['YYYY'];
    }
    //Получаем месяца пресс-релизов
    $arSelect = Array("DATE_ACTIVE_FROM");
    $arFilter = Array("IBLOCK_CODE"=>"press_releases", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", ">=DATE_ACTIVE_FROM" => "01.01." . $arResult['THIS_YEAR'], "<=DATE_ACTIVE_FROM" => "31.12." . $arResult['THIS_YEAR']);
    $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arDate = ParseDateTime($ob['DATE_ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS");
        $arResult['MONTH'][$arDate['MM']]=$arMounth[$arDate['MM']];
    }
    ksort($arResult['MONTH']);
}

$this->IncludeComponentTemplate();