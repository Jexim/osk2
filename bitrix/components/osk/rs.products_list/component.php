<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)    die();/* * $arParams["SECTION_ID"] - ID текущего раздела (Военные/Гражданские) * $arParams["TYPE"] - тип продукции (Военные/Гражданские) * $arParams["CURRENT_PROJECT_ID"] - ID текущего проекта * $arParams['COUNT_PAGE'] колличество на странице */if (CModule::IncludeModule("iblock")) {    //Делаем выборку в зависимости от языка    $IBLOCK_ID = 5;    if (SITE_ID != 's1') {        $lang_prefix = '_' . SITE_ID;        $IBLOCK_ID = 35;    }    //Получаем массив разделов    $arSelect = Array("ID", "NAME");    $arFilter = Array('IBLOCK_ID' => $IBLOCK_ID, 'GLOBAL_ACTIVE' => 'Y', "DEPTH_LEVEL" => 2);    if (empty($arParams["DOP_PROJECT"])) {        $arFilter['SECTION_ID'] = $arParams["SECTION_ID"];    }    $db_list = CIBlockSection::GetList(Array('sort' => 'asc'), $arFilter, true, $arSelect);    while ($ar_result = $db_list->GetNext()) {        $arResult['SECTION'][$ar_result['ID']] = $ar_result;        if (!empty($ob['IBLOCK_SECTION_ID']))            $arResult['ITEM'][$ob['IBLOCK_SECTION_ID']] = Array();    }    //Получаем массив проектов    $arSelect = Array("ID", "NAME", "PROPERTY_SHORT_TEXT", "PREVIEW_PICTURE", "PROPERTY_SCHEME", "PROPERTY_SCHEME_TRANSPARENCY", "DETAIL_PAGE_URL", "SECTION_ID", "PROPERTY_TOP_IMAGES", "PROPERTY_DISPLAY_GEN_IMG");    $arFilter = Array("IBLOCK_CODE" => "products" . $lang_prefix, "ACTIVE" => "Y", "INCLUDE_SUBSECTIONS" => "Y");    //Фильтр по предприятиям    if (!empty($arParams["ENTERPRISES"])) {        $arFilter[] = array(            'LOGIC' => 'OR',           // array(                'PROPERTY_DEVELOPER' => $arParams["ENTERPRISES"],                'PROPERTY_BUILDER' => $arParams["ENTERPRISES"],            //),        );    }    //Фильтр по категориям    if (!empty($arParams["SECTION_ID"])) {        $arFilter["SECTION_ID"] = $arParams["SECTION_ID"];    }    //Фильтр по продуктам    if (!empty($arParams["PRODUCT_ID"])) {        $arFilter["ID"] = $arParams["PRODUCT_ID"];    }    //Фильтр по продуктам (исключающий) - чтобы не выводить тот же самый проект, на странице которого мы находимся    if (!empty($arParams["CURRENT_PROJECT_ID"])) {        $arFilter["!ID"] = $arParams["CURRENT_PROJECT_ID"];    }    $res = CIBlockElement::GetList(Array('sort' => 'asc'), $arFilter, false, false, $arSelect);    while ($ob = $res->GetNext()) {        $arResult['ITEM'][$ob['IBLOCK_SECTION_ID']][$ob['ID']] = $ob;        if (!empty($arParams["DOP_PROJECT"])  || !empty($arParams["MAIN_ENG"])){            $arResult['WIDGET_ITEM'][$ob['ID']] = $ob;            //Определяем тип продукции (военная/гражданская)            if(getParent($ob['IBLOCK_SECTION_ID']) == '5' || getParent($ob['IBLOCK_SECTION_ID']) == '53'){                $arResult['WIDGET_ITEM'][$ob['ID']]['SECTION_TYPE'] = 'military';            }            if(getParent($ob['IBLOCK_SECTION_ID']) == '6' || getParent($ob['IBLOCK_SECTION_ID']) == '51'){                $arResult['WIDGET_ITEM'][$ob['ID']]['SECTION_TYPE'] = 'civil';            }        }    }    $arResult['TYPE'] = $arParams["TYPE"];    if (!empty($arParams["DOP_PROJECT"]) && count($arResult['WIDGET_ITEM']) > 3 && !empty($arParams["SECTION_ID"])) {        $arResult['RAND_KEY'] = array_rand($arResult['WIDGET_ITEM'], 3);        $arResult['WIDGET_ITEM'] = Array(            '0' => $arResult['WIDGET_ITEM'][$arResult['RAND_KEY'][0]],            '1' => $arResult['WIDGET_ITEM'][$arResult['RAND_KEY'][1]],            '2' => $arResult['WIDGET_ITEM'][$arResult['RAND_KEY'][2]],        );    }    if (!empty($arParams["MAIN_ENG"])) {        $arResult['RAND_KEY'] = array_rand($arResult['WIDGET_ITEM'], 6);        $arResult['WIDGET_ITEM'] = Array(            '0' => $arResult['WIDGET_ITEM'][$arResult['RAND_KEY'][0]],            '1' => $arResult['WIDGET_ITEM'][$arResult['RAND_KEY'][1]],            '2' => $arResult['WIDGET_ITEM'][$arResult['RAND_KEY'][2]],            '3' => $arResult['WIDGET_ITEM'][$arResult['RAND_KEY'][3]],            '4' => $arResult['WIDGET_ITEM'][$arResult['RAND_KEY'][4]],            '5' => $arResult['WIDGET_ITEM'][$arResult['RAND_KEY'][5]],        );    }}$this->IncludeComponentTemplate();