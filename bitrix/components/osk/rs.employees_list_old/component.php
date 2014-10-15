<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $arParams["SECTION_ID"] - ID раздела (Совет директоров/Менеджмент)
 */

if (CModule::IncludeModule("iblock")) {        
    //Делаем выборку в зависимости от языка
    if(SITE_ID=='s1'){
         $arSelect = Array("ID", "NAME", "PROPERTY_POSITION", "PROPERTY_PLACE_WORK", "DETAIL_PICTURE");
    } else {
         $arSelect = Array("ID", "PROPERTY_NAME_EN", "PROPERTY_POSITION_EN", "PROPERTY_PLACE_WORK_EN", "DETAIL_PICTURE");
    } 
    //Получаем массив директоров
    $arFilter = Array("IBLOCK_CODE"=>"employees", "ACTIVE"=>"Y", "SECTION_ID"=>$arParams["SECTION_ID"]);
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult[$ob['ID']] = $ob;
    }
}

$this->IncludeComponentTemplate();