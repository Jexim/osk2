<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * 
 */

if (CModule::IncludeModule("iblock")) {        
    //Делаем выборку в зависимости от языка
    if(SITE_ID=='s1'){
         $arSelect = Array("ID", "NAME", "RELATED_EMPLOYEE", "PROPERTY_PLACE_WORK", "DETAIL_PICTURE");
    } else {
         $arSelect = Array("ID", "PROPERTY_NAME_EN", "RELATED_EMPLOYEE", "RELATED_MATERIALS", "DETAIL_PICTURE");
    } 
    //Получаем массив директоров
    $arFilter = Array("IBLOCK_CODE"=>"handling", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult[$ob['ID']] = $ob;
    }
}

$this->IncludeComponentTemplate();