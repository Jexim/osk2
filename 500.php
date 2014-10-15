<?require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');?>
<? if($_SESSION['LANG']=='en'): ?>
    <!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en"
        "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
    <!-- saved from url=(0035)/guideline/ -->
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Error 500</title>
        <link rel="icon" href="/f/1/media/favicon.ico" type="image/x-icon">
        <link rel="start" href="/en/">
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
            .text_500 a {border-bottom: 1px solid rgba(77, 96, 112, 0.8);}
            .text_500 a:hover {color: #FFF; border-bottom: 1px solid rgba(255, 255, 255, 0.3);}
        </style>
    </head>
    <body id="guideline" class="small_block_padding body404 body500">
    <div class="header"><img src="/f/1/media/header500.png"></div>
    <div class="e_left"><a id="logo" class="logo_eng" href="/en/"></a></div>
    <div class="e_right">
        <h1>Server error</h1>

        <p class="text_500">The page is temporarily unavailable.<br/>Try to come back later or go to the <a href="/en/">main page</a>.</p>
    </div>
    </body>
    </html>
<? else: ?>
    <!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en"
    "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ошибка 500</title>
        <link rel="icon" href="/f/1/media/favicon.ico" type="image/x-icon">
        <link rel="start" href="/">
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
            .text_500 a {border-bottom: 1px solid rgba(77, 96, 112, 0.8);}
            .text_500 a:hover {color: #FFF; border-bottom: 1px solid rgba(255, 255, 255, 0.3);}
        </style>
    </head>
    <body id="guideline" class="small_block_padding body404 body500">
    <div class="header"><img src="/f/1/media/header500.png"></div>
    <div class="e_left"><a id="logo" href="/"></a></div>
    <div class="e_right">
        <h1>Ошибка сервера</h1>
        <p class="text_500">Страница временно недоступна.<br/>Попробуйте зайти сюда позже или перейдите на <a href="/">главную</a>.</p>
    </div>
    </body>
    </html>
<? endif; ?>