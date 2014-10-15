<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/*
 * $_REQUEST['SEARCH_TEXT'] код элемента
 * $_REQUEST['IBLOCK_CODE'] код ИБ
 * $arParam['COUNT_PAGE'] колличество на странице
 */

$arResult['IBLOCK_TYPE_NAME'] = array(
    "Press_center" => array(
        "en" => "Press-center",
        "ru" => "Пресс-центр",
    ),
    "Enterprises" => array(
        "en" => "Enterprises",
        "ru" => "Предприятия",
    ),
    "Catalog" => array(
        "en" => "Products",
        "ru" => "Продукция",
    ),
    "Purchases" => array(
        "en" => "Purchases",
        "ru" => "Закупки",
    ),
);

if (CModule::IncludeModule("iblock")) {   
    if(!empty($_REQUEST['SEARCH_TEXT'])){
        if($_SESSION['LANG']!='ru'){
            $lang_prefix = '_' . $_SESSION['LANG'];
        }
        //Фильтр
        if(empty($_REQUEST['TYPE'])){
            $arFilter = Array("IBLOCK_CODE"=>array("news" . $lang_prefix, "press_releases" . $lang_prefix, "companies_list" . $lang_prefix, "products" . $lang_prefix, "media_corporation" . $lang_prefix, "purchases_usc" . $lang_prefix), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        } else {
            $arFilter = Array("IBLOCK_CODE"=>$_REQUEST['TYPE'] . $lang_prefix, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        }
        $arFilter[] = array(
            "LOGIC"=>"OR",
            "NAME"=>"%" . $_REQUEST['SEARCH_TEXT'] . "%",
            "DETAIL_TEXT"=>"%" . $_REQUEST['SEARCH_TEXT'] . "%",
            "PREVIEW_TEXT"=>"%" . $_REQUEST['SEARCH_TEXT'] . "%",
            "PROPERTY_SHORT_TEXT"=>"%" . $_REQUEST['SEARCH_TEXT'] . "%",
            "PROPERTY_FULL_NAME"=>"%" . $_REQUEST['SEARCH_TEXT'] . "%",
        );
        $arSelect = Array("ID", "IBLOCK_NAME", "IBLOCK_CODE", "NAME", "DETAIL_PAGE_URL", "DATE_ACTIVE_FROM", "IBLOCK_TYPE_ID", "PREVIEW_TEXT", "PROPERTY_SHORT_TEXT", "IBLOCK_SECTION_ID");    
        //Получаем результаты поиска                   
        $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk', 'sort'=>'asc'), $arFilter, false, array('nPageSize'=>$arParams['COUNT_PAGE']), $arSelect);
        while($ob = $res->GetNext()){
            $arResult['ITEM'][$ob['ID']] = $ob;
            //Формируем путь
            switch ($ob['IBLOCK_TYPE_ID']) {
                case "Enterprises" . $lang_prefix:
                        $arResult['ITEM'][$ob['ID']]['PATH'] = array(
                            "/enterprises/"=>array(
                                "ru" => "Предприятия",
                                "en" => "Enterprises",
                            ),
                        );
                    break;
                case "purchases" . $lang_prefix:
                    $arResult['ITEM'][$ob['ID']]['PATH'] = array(
                        "/purchases/purchases-usc/"=>array(
                            "ru" => "Закупки",
                            "en" => "Purchases",
                        ),
                    );
                    break;
                case "Catalog" . $lang_prefix:
                    $section = CIBlockSection::GetByID($ob['IBLOCK_SECTION_ID']);
                    $section = $section->GetNext();
                    $section_l2 = CIBlockSection::GetByID($section['IBLOCK_SECTION_ID']);
                    $section_l2 = $section_l2->GetNext();
                    if($section['IBLOCK_SECTION_ID']==5){
                        $pach = '/products/';
                    } else {
                        $pach = $section_l2['SECTION_PAGE_URL'];
                    }
                    $arResult['ITEM'][$ob['ID']]['PATH'] = array(
                            "/products"=>array(
                                "en" => "Products",
                                "ru" => "Продукция",
                            ),
                            $pach=>array(
                                "en" => $section_l2['NAME'],
                                "ru" => $section_l2['NAME'],
                            ),
                        );           
                    break;
                default:
                    if($ob['IBLOCK_CODE']=='news'){
                        $pach = '/press-center/news/';
                    }
                    if($ob['IBLOCK_CODE']=='media_corporation'){
                        $pach = '/press-center/media-corporation/';
                    }else{
                        $pach = '/press-center/press-releases/';
                    }
                    $arResult['ITEM'][$ob['ID']]['PATH'] = array(
                            "/press-center/"=>array(
                                "en" => "Press-center",
                                "ru" => "Пресс-центр",
                            ),
                            $pach=>array(
                                "en" => $ob['IBLOCK_NAME'],
                                "ru" => $ob['IBLOCK_NAME'],
                            ),
                            $pach . "?YEAR=" . FormatDateFromDB($ob['DATE_ACTIVE_FROM'], 'YYYY') . "&MONTH=" . FormatDateFromDB($ob['DATE_ACTIVE_FROM'], 'MM')=>array(
                                "en" => FormatDateFromDB($ob['DATE_ACTIVE_FROM'], 'DD MMMM YYYY'),
                                "ru" => FormatDateFromDB($ob['DATE_ACTIVE_FROM'], 'DD MMMM YYYY'),
                            ),
                        );
                    break;
            }
        }
        //$arResult['PAGINATION'] = $res->GetPageNavStringEx($navComponentObject, "", "search");
        $arResult['ITEM_COUNT'] = $res->nSelectedCount;
        $arResult['PAGE_COUNT'] = $res->NavPageCount;
        //Пролучаем нужные фильтры
        $res = CIBlockElement::GetList(Array('DATE_ACTIVE_FROM'=>'desk', 'sort'=>'asc'), $arFilter, false, false, array('IBLOCK_CODE'));
        while($ob = $res->GetNext()){
            $arResult['SECTION'][$ob['IBLOCK_CODE']] = true;
        }
    }
}

$this->IncludeComponentTemplate();