<?require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');?>
<? if($_SESSION['LANG']=='en'): ?>
    <!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en"
        "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Error 404</title>
        <link rel="icon" href="/f/1/media/favicon.ico" type="image/x-icon">
        <?
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/global.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/guideline/guideline.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/jquery.fancybox.css?v=2.1.5');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/pretty_form.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/selectik.css');
        $APPLICATION->SetAdditionalCSS('/f/1/404/s404.css');
        $APPLICATION->ShowHead();
        ?>
        <style>
            .menu_404 a:hover {color: #FFF; border-bottom: 1px solid rgba(255, 255, 255, 0.3);}
        </style>
    </head>
    <body id="guideline" class="small_block_padding body404">
    <div class="header"><img src="/f/1/media/header404.png"></div>
    <div class="e_left"><a id="logo" class="logo_eng" href="/en/"></a></div>
    <div class="e_right">
        <h1>You have misspelled the URL,<br/>or this page does not exist any more.</h1>

        <div class="form_validate field unrequired" data-id="field">
            <form action="/en/search/">
                <input type="hidden" value="companies_list" name="TYPE"/>
                <input type="text" data-xp="required: true" name="SEARCH_TEXT" placeholder="Site search" value=""/>
                <button data-xp="enabled_on_completed: true" class="small">Find</button>
            </form>
        </div>
        <ul class="menu_404">
            <li><a href="/en/">Home</a></li>
            <li><a href="/en/about/">About</a></li>
            <li><a href="/en/products/">Products</a></li>
            <li><a href="/en/contacts/">Contacts</a></li>
            <li><a href="/en/enterprises/">Enterprises</a></li>
            <li><a href="/en/innovation/">Innovation</a></li>
        </ul>
    </div>
    </body>
    </html>
<? else: ?>
    <!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en"
    "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
    <!-- saved from url=(0035)/guideline/ -->
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ошибка 404</title>
        <?
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/global.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/guideline/guideline.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/jquery.fancybox.css?v=2.1.5');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/pretty_form.css');
        $APPLICATION->SetAdditionalCSS('/f/1/min/global/selectik.css');
        $APPLICATION->SetAdditionalCSS('/f/1/404/s404.css');
        $APPLICATION->ShowHead();
        ?>
        <style>
            .menu_404 a:hover {color: #FFF; border-bottom: 1px solid rgba(255, 255, 255, 0.3);}
        </style>
    </head>
    <body id="guideline" class="small_block_padding body404">
    <div class="header"><img src="/f/1/media/header404.png"></div>
    <div class="e_left"><a id="logo" href="/"></a></div>
    <div class="e_right">
        <h1>Неправильно набран адрес, или такой<br> страницы на сайте больше не существует</h1>

        <div class="form_validate field unrequired" data-id="field">
            <form action="/search/">
                <input type="hidden" value="companies_list" name="TYPE"/>
                <input type="text" data-xp="required: true" name="SEARCH_TEXT" placeholder="Поиск по сайту" value=""/>
                <button data-xp="enabled_on_completed: true" class="small">Найти</button>
            </form>
        </div>
        <ul class="menu_404">
            <li><a href="/">Главная страница</a></li>
            <li><a href="/about/">О корпорации</a></li>
            <li><a href="/products/">Продукция</a></li>
            <li><a href="/contacts/">Контактная информация</a></li>
            <li><a href="/enterprises/">Предприятия</a></li>
            <li><a href="/innovation/">Инновации</a></li>
            <li><a href="/purchases/">Закупки</a></li>
            <li><a href="/corporate-housing-policy/">Корпоративная жилищная политика</a></li>
            <li><a href="/press-center/">Пресс-центр</a></li>
            <li><a href="/personnel-policy/">Кадровая политика</a></li>
        </ul>
    </div>
    </body>
    </html>
<? endif; ?>