<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $_REQUEST['ELEMENT_CODE'] код элемента
 */


if (CModule::IncludeModule("iblock")) {    
    //Получаем массив городов
    $arFilter = Array("IBLOCK_CODE"=>"city", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['CITY'][$ob['ID']] = $ob;
    }
    //Получаем массив изображений
    $arSelect = Array("ID", "NAME", "DETAIL_TEXT", "DETAIL_PICTURE", "PROPERTY_BIG_IMG", "PREVIEW_PICTURE");   
    $arFilter = Array("IBLOCK_CODE"=>"photo", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['PHOTO'][$ob['ID']] = $ob;
    }
    //Получаем массив видео
    $arSelect = Array("ID", "NAME", "PROPERTY_VIDEO_STRING", "PROPERTY_VIDEO", "PROPERTY_DOWNLOAD_URL", "PREVIEW_PICTURE");   
    $arFilter = Array("IBLOCK_CODE"=>"video", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['VIDEO'][$ob['ID']] = $ob;    
    }
    //Получаем пресс-релиз
    $arSelect = Array("*");
    $arFilter = Array("IBLOCK_CODE"=>"press_releases", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>$_REQUEST['ELEMENT_CODE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()){
        $arProps = $ob->GetProperties();
        $arFields = $ob->GetFields();
        $arResult['ELEMENT']['ITEM'] = $arFields;
        $arResult['ELEMENT']['PROP'] = $arProps;
    }
    //Получаем связаное предприятия
    $arSelect = Array("ID", "NAME", "DETAIL_PICTURE", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_CODE"=>"companies_list", "ACTIVE"=>"Y", "ID"=>$arResult['ELEMENT']['PROP']['ENTERPRISE']['VALUE']);
    $res = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['ENTERPRISE'] = $ob;
    }
    //Ошибка 404
    if(empty($arResult['ELEMENT'])){
        LocalRedirect("/404.php");
    }
}

$this->IncludeComponentTemplate();