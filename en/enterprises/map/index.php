<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Companies USC");
$APPLICATION->SetPageProperty("title", "Companies USC");
$APPLICATION->SetPageProperty("keywords", "Companies USC");
$APPLICATION->SetPageProperty("description", "Companies USC");
$_ENV['NEXT_ELEMENT'] = array(
    'DETAIL_PAGE_URL' => '/en/contacts/',
    'NAME' => 'Contacts',
);
?>
<?$APPLICATION->IncludeComponent("osk:rs.enterprises_list", "map", array(), false);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
