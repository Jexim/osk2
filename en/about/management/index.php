<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Strength and power at sea");
$APPLICATION->SetPageProperty("title", "Management of JSC \"USC\"");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("description", "");
$_ENV['NEXT_ELEMENT'] = array(
    'DETAIL_PAGE_URL' => '/en/products/',
    'NAME' => 'Products',
);
?>
<div class="block second">
    <?$APPLICATION->IncludeComponent("osk:rs.employees_list", "main", array("SECTION_ID"=>27), false);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>