<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetAdditionalCSS('/f/1/press-center/index.css');
$APPLICATION->SetTitle("Пресс-центр");
$APPLICATION->SetPageProperty("title", "Пресс-центр");
$APPLICATION->SetPageProperty("keywords", "Пресс-центр");
$APPLICATION->SetPageProperty("description", "Пресс-центр");
$_ENV['NEXT_ELEMENT'] = array(
    'DETAIL_PAGE_URL' => '/press-center/news/',
    'NAME' => 'Новости',
);
?>
<div class="press_center">
    <div class="block clear first_media_block">
        <h2><a class="color_black" href="/press-center/news/">Новости</a></h2>
    </div>
    <?$APPLICATION->IncludeComponent("osk:rs.news_list", "widget", array('COUNT_PAGE'=>3), false);?>
    <div class="block clear">
        <h2><a class="color_black" href="/press-center/press-releases/">Пресс-релизы</a></h2>
    </div>
    <?$APPLICATION->IncludeComponent("osk:rs.press_releases_list", "widget", array('COUNT_PAGE'=>3), false);?>

    <div class="block clear">
        <h2><a class="color_black" href="/press-center/media-corporation/">СМИ о корпорации</a></h2>
    </div>
    <?$APPLICATION->IncludeComponent("osk:rs.media_corporation_list", "widget", array('COUNT_PAGE'=>5), false);?>
    <div class="block clear">
        <h2><a class="color_black" href="/press-center/media-gallery/">Медиагалерея</a></h2>
    </div>
    <?$APPLICATION->IncludeComponent("osk:rs.media_center_list", "widget", array('COUNT_PAGE'=>9), false);?>
    <div class="block clear">
        <h2><a class="color_black" href="/press-center/corporate-media/">Выпуски журнала «Строим флот сильной страны»</a></h2>
        <?$APPLICATION->IncludeComponent("osk:rs.building_fleet_list", "widget", array('COUNT_PAGE'=>5), false);?>
    </div>

    <div class="journalists">
        <h3>Пресс-служба ОСК</h3>
        <div class="phone"><a href="tel:74956173300">+ 7 (495) 617 33 00</a></div>
        <div class="email"><a href="mailto:pressa@oaoosk.ru">pressa@oaoosk.ru</a></div>
    </div>
<!-- 
    <div class="block second">
        <h3>Для журналистов</h3>
        <p>
        Пресс-служба ОАО «ОСК»<br/>
        тел. <a href="tel:74956173300">+ 7 (495) 617 33 00</a><br/>
        факс. +7 (495) 617-34-00<br/>
        e-mail: <a href="mailto:pressa@oaoosk.ru ">pressa@oaoosk.ru</a><br/>
        <a href="http://www.oaoosk.ru">www.oaoosk.ru</a>
        </p>
    </div> -->
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>