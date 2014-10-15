<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * 
 */

if (CModule::IncludeModule("iblock")) {    
    //Делаем выборку в зависимости от языка
    if(SITE_ID!='s1'){
        $lang_prefix = '_' . SITE_ID;
    }
    $arSelect = Array("ID", "NAME", "PROPERTY_FILE", "DATE_ACTIVE_FROM", "IBLOCK_SECTION_ID");
    //Получаем массив документов
    $arFilter = Array("IBLOCK_CODE"=>"disclosures" . $lang_prefix, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['ITEM'][$ob['IBLOCK_SECTION_ID']][$ob['ID']] = $ob;
        $arResult['ITEM'][$ob['IBLOCK_SECTION_ID']][$ob['ID']]['FILE'] = CFile::GetFileArray($ob['PROPERTY_FILE_VALUE']); 
    }
    $arFilter = Array('IBLOCK_CODE'=>"disclosures" . $lang_prefix, 'GLOBAL_ACTIVE'=>'Y');
    $db_list = CIBlockSection::GetList(Array('sort'=>'asc'), $arFilter, true);
    while($ar_result = $db_list->GetNext()){
        $arResult['SECTION'][$ar_result['ID']] = $ar_result;
    }
}

$this->IncludeComponentTemplate();