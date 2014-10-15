<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (CModule::IncludeModule("iblock")) {
    //Делаем выборку в зависимости от языка
    if(SITE_ID!='s1'){
        $lang_prefix = '_' . SITE_ID;
    }

    $arSelect = Array("ID", "NAME");
    $arSort = Array('name'=>'desk');
    //Получаем массив городов
    $arFilter = Array("IBLOCK_CODE"=>"city" . $lang_prefix, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['CITY'][$ob['ID']] = $ob;
        $arResult['ARR_CITY'][$ob['ID']] = Array();
        $arResult['ITEM_BY_CITY_DESK'][$ob['NAME']] = Array();
    }

    $arSelect = Array("ID", "NAME");
    $arSort = Array('name'=>'asc');
    //Получаем массив характеристик
    $arFilter = Array("IBLOCK_CODE"=>"characteristics_enterprise"  . $lang_prefix, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['CHARACTERISTICS'][$ob['ID']] = $ob;
    }

    $arSelect = Array("ID", "NAME", "PROPERTY_CITY", "PROPERTY_CHARACTERISTICS", "DETAIL_PAGE_URL", "PROPERTY_COORDINATES", "PROPERTY_ADDRESS", "PROPERTY_PHONE", "PROPERTY_URL", "PROPERTY_EMAIL", "PROPERTY_FAX");
    $arSort = Array('name'=>'asc');
    $arFilter = Array("IBLOCK_CODE"=>"companies_list"  . $lang_prefix, "ACTIVE"=>"Y");
    //Фильтр по городам
    if(!empty($_REQUEST['city'])){
        $arFilter['PROPERTY_CITY'] = $_REQUEST['city'];
    }
    //Получаем массив предприятий отсортированых по названию
    $res = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()){      
        $arCharacteristics = Array();
        $arProps = $ob->GetProperties();
        
        $arFields = $ob->GetFields();       
        $arResult['ITEM'][$arFields['ID']] = $arFields; 
        //Преводим список характеристик к нужному виду
        $i=0;
        foreach ($arProps['CHARACTERISTICS']['VALUE'] as $characteristics){
            if($i==0){
                $arCharacteristics[] = $arResult['CHARACTERISTICS'][$characteristics]['NAME'];
            } else {
                $arCharacteristics[] = strtolower($arResult['CHARACTERISTICS'][$characteristics]['NAME']);
            }
            $i++;
        }
        if(!empty($arResult['CITY'][$arFields['PROPERTY_CITY_VALUE']])){
            $arResult['ARR_CITY'][$arFields['PROPERTY_CITY_VALUE']] = $arResult['CITY'][$arFields['PROPERTY_CITY_VALUE']];
        }
        if(!empty($arResult['CHARACTERISTICS'][$arFields['PROPERTY_CHARACTERISTICS_VALUE']])){
            $arResult['ARR_CHARACTERISTICS'][$arFields['PROPERTY_CHARACTERISTICS_VALUE']] = $arResult['CHARACTERISTICS'][$arFields['PROPERTY_CHARACTERISTICS_VALUE']];
        }
        $arResult['ITEM_BY_CITY_ASC'][$arResult['CITY'][$arFields['PROPERTY_CITY_VALUE']]['NAME']][$arFields['ID']] = $arFields;
        $arResult['ITEM_BY_CITY_DESK'][$arResult['CITY'][$arFields['PROPERTY_CITY_VALUE']]['NAME']][$arFields['ID']] = $arFields;
        $arResult['ITEM_BY_CITY_ASC'][$arResult['CITY'][$arFields['PROPERTY_CITY_VALUE']]['NAME']][$arFields['ID']]['CHARACTERISTICS'] = trim(implode($arCharacteristics, ', '));
        $arResult['ITEM_BY_CITY_DESK'][$arResult['CITY'][$arFields['PROPERTY_CITY_VALUE']]['NAME']][$arFields['ID']]['CHARACTERISTICS'] = trim(implode($arCharacteristics, ', '));
        $arResult['ITEM'][$arFields['ID']]['CHARACTERISTICS'] = trim(implode($arCharacteristics, ', '));
        $arResult['ITEM'][$arFields['ID']]['PROPERTY_CHARACTERISTICS_VALUE'] = $arProps['CHARACTERISTICS']['VALUE'];       
        $arResult['ITEM_BY_CITY_ASC'][$arResult['CITY'][$arFields['PROPERTY_CITY_VALUE']]['NAME']][$arFields['ID']]['PROPERTY_CHARACTERISTICS_VALUE'] = $arProps['CHARACTERISTICS']['VALUE'];
        $arResult['ITEM_BY_CITY_DESK'][$arResult['CITY'][$arFields['PROPERTY_CITY_VALUE']]['NAME']][$arFields['ID']]['PROPERTY_CHARACTERISTICS_VALUE'] = $arProps['CHARACTERISTICS']['VALUE'];
    }
    ksort($arResult['ITEM_BY_CITY_ASC']);
}

$this->IncludeComponentTemplate();