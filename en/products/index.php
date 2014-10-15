<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "Military products");
$APPLICATION->SetPageProperty("keywords", "Military products");
$APPLICATION->SetPageProperty("description", "Military products");
$APPLICATION->AddChainItem("Military products", "");
$_ENV['NEXT_ELEMENT'] = array(
    'DETAIL_PAGE_URL' => '/en/innovation/',
    'NAME' => 'Innovation',
);
?>

<?$APPLICATION->IncludeComponent("osk:rs.products_list", "default", array("SECTION_ID"=>53, "TYPE"=>"military"), false);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>