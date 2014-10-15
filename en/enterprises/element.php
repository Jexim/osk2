<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Предприятия ОСК");
$APPLICATION->SetPageProperty("title", "Предприятия ОСК");
$APPLICATION->SetPageProperty("keywords", "Предприятия ОСК");
$APPLICATION->SetPageProperty("description", "Предприятия ОСК");
$_ENV['NEXT_ELEMENT'] = array(
    'DETAIL_PAGE_URL' => '/en/contacts/',
    'NAME' => 'Contacts',
);
?>
<?$APPLICATION->IncludeComponent("osk:rs.enterprises_detail", "main", array(), false);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>