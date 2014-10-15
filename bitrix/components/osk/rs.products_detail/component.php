<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $_REQUEST['ELEMENT_CODE'] - символьный код элемента
 */

if (CModule::IncludeModule("iblock")) {       
    //Делаем выборку в зависимости от языка
    $IBLOCK_ID = 5;
    if(SITE_ID!='s1'){
        $lang_prefix = '_' . SITE_ID;
        $IBLOCK_ID = 35;
    }
    //Получаем массив разделов
    $arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
    $arFilter = Array('IBLOCK_ID'=>$IBLOCK_ID, 'GLOBAL_ACTIVE'=>'Y', "SECTION_CODE"=>"military");
    $db_list = CIBlockSection::GetList(Array('sort'=>'asc'), $arFilter, true, $arSelect);
    while($ar_result = $db_list->GetNext()){
        $arResult['SECTION'][$ar_result['ID']] = $ar_result;
        $section[$ar_result['CODE']] = $ar_result['ID'];
    }

    //Делаем выборку предприятий в зависимости от языка
    $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID");
    $arFilter = Array("IBLOCK_CODE"=>"companies_list" . $lang_prefix, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()){
        $arResult['COMPANIES'][$ob['ID']] = $ob;
    }
    
    //Получаем данные проекта
    $arFilter = Array("IBLOCK_CODE"=>"products" . $lang_prefix,/* "ACTIVE"=>"Y",*/ "CODE"=>$_REQUEST['ELEMENT_CODE']);
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, Array("*"));
    while($ob = $res->GetNextElement()){
        $arResult['ELEMENT']['PROP'] = $ob->GetProperties();
        $arResult['ELEMENT']['ITEM'] = $ob->GetFields();
    }

    /*********************Определяем следующий элемент*******************/
    //Получаем отсортированый массив разделов военных
    $arSelect = Array("ID", "NAME");
    $arFilter = Array('IBLOCK_ID'=>$IBLOCK_ID, 'GLOBAL_ACTIVE'=>'Y', "SECTION_ID"=>$section["military"]);
    $db_list = CIBlockSection::GetList(Array('sort'=>'asc'), $arFilter, true, $arSelect);
    while($ar_result = $db_list->GetNext()){
        $arProducts[$ar_result['ID']] = array();
    }

    //Получаем отсортированый массив разделов гражданских
    $arSelect = Array("ID", "NAME");
    $arFilter = Array('IBLOCK_ID'=>$IBLOCK_ID, 'GLOBAL_ACTIVE'=>'Y', "SECTION_ID"=>$section["civil"]);
    $db_list = CIBlockSection::GetList(Array('sort'=>'asc'), $arFilter, true, $arSelect);
    while($ar_result = $db_list->GetNext()){
        $arProducts[$ar_result['ID']] = array();
    }

    //Получаем массив всех проектов
    $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID");
    $arFilter = Array("IBLOCK_CODE"=>"products" . $lang_prefix, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('SECTION_ID'=>'asc', 'sort'=>'asc'), $arFilter, false, false, Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_NAME_EN"));
    while($ob = $res->GetNext()){
        $arProducts[$ob['IBLOCK_SECTION_ID']][] = $ob['ID'];
        $arAllProducts[$ob['ID']] = $ob;
    }

    $arSortProducts = array();
    foreach($arProducts as $value){
        $arSortProducts = array_merge($arSortProducts, $value);
    }

    //Определяем следющий элемент
    foreach ($arSortProducts as $value){
        if($arResult['ELEMENT']['ITEM']['ID']==$value)
            break;
        else
            next($arSortProducts);
    }
    $arNextElement = current($arSortProducts);
    if(!empty($arAllProducts[$arNextElement])){
        $_ENV['NEXT_ELEMENT'] = $arAllProducts[$arNextElement];
    }else{
        $_ENV['NEXT_ELEMENT'] = array(
            'DETAIL_PAGE_URL' => '/innovation/',
            'NAME' => 'Инновации',
        );
    }
    /*********************Конец определения следующего элемента*******************/

    //Получаем связанные новости проекта
    $arFilter = Array("IBLOCK_CODE"=>"news"  . $lang_prefix, "ACTIVE"=>"Y", "PROPERTY_RELATED_PRODUCTS"=>$arResult['ELEMENT']['ITEM']['ID']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, Array("ID"));
    while($ob = $res->GetNext()){
        $arResult['NEWS'] = true;      
    }
    
    //Получаем связанные пресс-релизы
    $arFilter = Array("IBLOCK_CODE"=>"press_releases"  . $lang_prefix, "ACTIVE"=>"Y", "PROPERTY_RELATED_PRODUCTS"=>$arResult['ELEMENT']['ITEM']['ID']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, Array("ID"));
    while($ob = $res->GetNext()){
        $arResult['PRESS_RELEASES'] = true;      
    }
    
    //Получаем связанные новости проекта
    $arFilter = Array("IBLOCK_CODE"=>"purchases_usc"  . $lang_prefix, "ACTIVE"=>"Y", "PROPERTY_RELATED_PRODUCTS"=>$arResult['ELEMENT']['ITEM']['ID']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, Array("ID"));
    while($ob = $res->GetNext()){
        $arResult['PURCHASES_USC'] = true;      
    }
    //Ошибка 404
    if(empty($arResult['ELEMENT'])){
        LocalRedirect("/404.php");
    }
}

$this->IncludeComponentTemplate();