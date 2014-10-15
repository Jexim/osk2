<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Объединенная судостроительная корпорация");
$APPLICATION->AddHeadScript('/f/1/min/global/rus.js');
?>

<!-- каруселька-->
<div class="main_carousel_wrapper">
    <?$APPLICATION->IncludeComponent("osk:rs.slider_list", "main", false, false);?>
</div>

<!-- Новости -->
<style>
/*.tmp-news .news_three_blocks_text {min-height: 170px;}*/
</style>
<div class="tmp-news">
	<?$APPLICATION->IncludeComponent("osk:rs.news_list", "main_widget", array('COUNT_PAGE'=>4), false);?>
</div>

<!-- Текст в черном блоке -->
<div class="important index_black" id="contacts">
    <?
    $APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/main_info.php",
        "EDIT_TEMPLATE" => ""
            ), false
    );
    ?>
</div>

<!-- Фото-видео -->
<?$APPLICATION->IncludeComponent("osk:rs.media_center_list", "widget", array("MAIN_PAGE"=>"Y"), false);?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>