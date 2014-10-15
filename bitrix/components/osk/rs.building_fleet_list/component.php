<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $arParam['COUNT_PAGE'] колличество на странице
 * $_REQUEST['YEAR'] год
 */

if (CModule::IncludeModule("iblock")) {
    //Определяем год
    if(!empty($_REQUEST['YEAR'])){
        //Новости заданого года
        $arResult['THIS_YEAR'] = $_REQUEST['YEAR'];
    } else {
        //Новости текущего года
        $arResult['THIS_YEAR'] = date('Y');
    }
    //Получаем массив журналов
    $arSelect = Array("ID", "NAME", "DETAIL_PICTURE", "PROPERTY_NUMBER", "PROPERTY_FILE", "DATE_ACTIVE_FROM");   
    $arFilter = Array("IBLOCK_CODE"=>"building_fleet", "ACTIVE"=>"Y", ">=DATE_ACTIVE_FROM" => "01.01." . $arResult['THIS_YEAR'], "<=DATE_ACTIVE_FROM" => "31.12." . $arResult['THIS_YEAR']);
    $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk', 'sort'=>'asc'), $arFilter, false, array('nPageSize'=>$arParam['COUNT_PAGE']), $arSelect);
    while($ob = $res->GetNext()){
        $arResult['ITEM'][$ob['ID']] = $ob;
        $arResult['ITEM'][$ob['ID']]['FILE'] = CFile::GetFileArray($ob['PROPERTY_FILE_VALUE']); 
    }
    $arResult['PAGINATION'] = $res->GetPageNavStringEx($navComponentObject, "");
    //Получаем года журналов
    $arSelect = Array("DATE_ACTIVE_FROM");
    $arFilter = Array("IBLOCK_CODE"=>"building_fleet", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arDate = ParseDateTime($ob['DATE_ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS");
        $arResult['YEAR'][$arDate['YYYY']] = $arDate['YYYY'];
    }
}

$this->IncludeComponentTemplate();