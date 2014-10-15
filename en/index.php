<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("United Shipbuilding Corporation");
?>

<div class="main_carousel_wrapper"><!-- каруселька начало -->
    <?$APPLICATION->IncludeComponent("osk:rs.slider_list", "main", false, false);?>
</div><!-- каруселька конец -->
<div class="important index_black" id="contacts">
    <?
    $APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/en/main_info.php",
        "EDIT_TEMPLATE" => ""
            ), false
    );
    ?>
</div>
<div class="block before_wide">
    <h1 class="products_wrapper_title"><a href="/en/products/">Military</a> and <a class="civilian" data-id="hide" href="/en/products/civil/">civilian</a> products</h1>
</div>
<div class="products_eng_main">
    <?$APPLICATION->IncludeComponent("osk:rs.products_list", "widget", array('SECTION_ID'=>53,  "MAIN_ENG"=>"Y"), false);?>
    <?$APPLICATION->IncludeComponent("osk:rs.products_list", "widget", array('SECTION_ID'=>51,  "MAIN_ENG"=>"Y", "SECTION_NUMBER"=>1), false);?>
</div>

<script type="text/javascript" src="/js/eng.js"></script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>