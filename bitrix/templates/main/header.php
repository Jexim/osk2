<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<!-- (c) Art. Lebedev Studio | http://www.artlebedev.ru/ -->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><? $APPLICATION->ShowTitle() ?></title>
        <link rel="icon" href="/f/1/media/favicon.ico" type="image/x-icon">
        <?
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/global.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/guideline/guideline.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/jquery.fancybox.css?v=2.1.5');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/pretty_form.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/selectik.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/social-likes_birman.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/rs.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/main.css');

        $APPLICATION->AddHeadScript('/f/1/js/jquery-1.10.2.min.js');
        $APPLICATION->AddHeadScript('/f/1/js/jquery.fancybox.js?v=2.1.5');
        $APPLICATION->AddHeadScript('/f/1/js/expromptum.min.js');
        $APPLICATION->AddHeadScript('/f/1/js/als-switcher.js');
        $APPLICATION->AddHeadScript('/f/1/js/als-centerImg.js');
        $APPLICATION->AddHeadScript('/f/1/js/jquery.selectik.min.js');
        $APPLICATION->AddHeadScript('/f/1/js/placeholders.jquery.min.js');
        $APPLICATION->AddHeadScript('/f/1/js/global.js');
        $APPLICATION->AddHeadScript('/f/1/js/social-likes.min.js');
        $APPLICATION->AddHeadScript('/f/1/min/global/jquery.jcarousel-core.js');
        $APPLICATION->AddHeadScript('/f/1/min/global/jquery.jcarousel-control.min.js');
        $APPLICATION->AddHeadScript('/f/1/min/global/jquery.jcarousel-pagination.min.js');
        $APPLICATION->AddHeadScript('/f/1/min/global/main.js');
        $APPLICATION->AddHeadScript('/f/1/min/global/state_company.js');
        $APPLICATION->AddHeadScript('/f/1/min/global/footer.js');
        ?>

        <? $APPLICATION->ShowHead();?>
    </head>

    <body id="guideline" class="big_file_names">

        <?/*
        <div id="panel">
            <?$APPLICATION->ShowPanel(); ?>
        </div>
        */?>

        <div id="layout">
        
            <div id="content" class="content_1024">
                <div class="hight_liyout"></div>
                <div id="sidebar">
                    <? if($_SERVER['SCRIPT_NAME']!='/search/index.php' && $_SERVER['SCRIPT_NAME']!='/press-center/news/index.php' && $_SERVER['SCRIPT_NAME']!='/press-center/press-releases/index.php'
                            && $_SERVER['SCRIPT_NAME']!='/press-center/media-corporation/index.php' && $_SERVER['SCRIPT_NAME']!='/enterprises/index.php'): ?>
                        <div class="search">
                            <form action="/search/">
                                <input type="text" class="search_field" name="SEARCH_TEXT" value="<?= $_REQUEST['SEARCH_TEXT'] ?>" />
                            </form>
                        </div>
                        <div class="all_sait">
                            <span class="pseudo main_menu_btn">Весь сайт</span>
                        </div>
                    <? else: ?>
                        <div class="all_sait no_search">
                            <span class="pseudo main_menu_btn">Весь сайт</span>
                        </div>
                    <? endif; ?>
                    <a id="logo" href="/"></a>
            
                    

                    <ul class="navigation navigation_medium <?if($_SERVER['SCRIPT_NAME'] != '/index.php'){?>navigation_inner<?}?>" >

                        <?if($_SERVER['REAL_FILE_PATH']=='/products/element.php'){?>

                            <li class="with_icon catalog_military">
                              <a href="/products/">
                                Военная продукция
                              </a>
                            </li>
                            <li class="with_icon catalog_civil">
                              <a href="/products/civil/">
                                Гражданская продукция
                              </a>
                            </li>

                        <?}elseif($_SERVER['SCRIPT_NAME'] == '/products/index.php' || $_SERVER['SCRIPT_NAME'] == '/products/civil/index.php'){?>
                            <li class="with_icon enterprises">
                              <a href="/enterprises/">
                                Предприятия ОСК
                              </a>
                            </li>
                        <?}elseif($_SERVER['SCRIPT_NAME'] == '/index.php'){?>
                            <li class="with_icon catalog_military">
                              <a href="/products/">
                                Военная продукция
                              </a>
                            </li>
                            <li class="with_icon catalog_civil">
                              <a href="/products/civil/">
                                Гражданская продукция
                              </a>
                            </li>
                            <li class="with_icon news">
                                <a href="/press-center/news/">
                                    Новости
                                </a>
                            </li>
                            <li class="with_icon cont">

                            <a href="/contacts/">
                                Контактная информация
                            </a>
                            <span class="cont_in">
                               <a href="" class="cont_fb"></a>
                               <a href="" class="cont_tw"></a>
                               <a href="" class="cont_vk"></a>
                             </span>
                            </li>
                            <li class="with_icon photo">
                              <a href="/press-center/media-gallery/">
                                  Медиагалерея
                              </a>
                            </li>
                        <? }else{ ?>
                            <li class="with_icon catalog_military">
                              <a href="/products/">
                                Военная продукция
                              </a>
                            </li>
                            <li class="with_icon catalog_civil">
                              <a href="/products/civil/">
                                Гражданская продукция
                              </a>
                            </li>
                        <?}?>
                    </ul>

                    

                </div>
                
                <div id="wrapper">                   
                    <?
                    $APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/gen_menu.php",
                        "EDIT_TEMPLATE" => ""
                            ), false
                    );
                    ?>
                    <div id="page" class="page_top_padding page_bg">
                        
                        <div class="block before_wide most_higher <?if($_SERVER['PHP_SELF'] == '/index.php'){?>top_menu_transparent<?}?>"> <!--top_navigation-->
                            
                            <div class="lang">
                                <div class="item selected <?if($_SERVER['SCRIPT_NAME'] == '/index.php'):?>main_selected<? endif; ?>"><b>РУС</b></div>
                                <div class="item <?if($_SERVER['SCRIPT_NAME'] == '/index.php'):?>main_no_selected<? endif; ?>"><a href="/en/">ENG</a></div>
                            </div>
                            
                            <div class="top_menu top_menu_big top_menu_gray">
                                <?
                                $APPLICATION->IncludeComponent("bitrix:menu", "general_menu", Array(
                                    "ROOT_MENU_TYPE" => "top",
                                    "MAX_LEVEL" => "1",
                                    "CHILD_MENU_TYPE" => "submenu",
                                    "USE_EXT" => "Y",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "Y",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "MENU_CACHE_GET_VARS" => ""
                                        )
                                );
                                ?>
                            </div>

                        </div>
                        <? if($_SERVER['REQUEST_URI']!='/products/' && $_SERVER['SCRIPT_NAME']!='/products/civil/index.php' 
                                && $_SERVER['REAL_FILE_PATH']!='/products/element.php' && $_SERVER['REAL_FILE_PATH']!='/enterprises/element.php' 
                                && $_SERVER['SCRIPT_NAME']!='/index.php' && $_SERVER['REAL_FILE_PATH']!='/press-center/news/element.php'
                                && $_SERVER['REAL_FILE_PATH']!='/press-center/press-releases/element.php' && $_SERVER['REAL_FILE_PATH']!='/press-center/media-corporation/element.php' 
                                && $_SERVER['SCRIPT_NAME']!='/search/index.php' && $_SERVER['REAL_FILE_PATH']!='/purchases/purchases-usc/element.php' && $_SERVER['REAL_FILE_PATH']!='/about/first-person/index.php'): ?>
                            <div class="block clear">
                                <h1><?$APPLICATION->ShowTitle(false);?></h1>                              
                                <?
                                $APPLICATION->IncludeComponent("bitrix:menu", "sub_menu", Array(
                                    "ROOT_MENU_TYPE" => "submenu",
                                    "MAX_LEVEL" => "1",
                                    "USE_EXT" => "Y",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "MENU_CACHE_GET_VARS" => ""
                                ));
                                ?>
                            </div>
                        <? endif; ?>