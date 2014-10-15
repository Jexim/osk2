<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Strength and power at sea");
$APPLICATION->SetPageProperty("title", "First-person");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("description", "");
$_ENV['NEXT_ELEMENT'] = array(
    'DETAIL_PAGE_URL' => '/en/products/',
    'NAME' => 'Products',
);
?>
<?$APPLICATION->IncludeComponent("osk:rs.first_person_detail", "main", array(), false);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>