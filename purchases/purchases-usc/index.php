<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Закупки");
$APPLICATION->SetPageProperty("title", "Закупки ОСК");
$APPLICATION->SetPageProperty("keywords", "Закупки ОСК");
$APPLICATION->SetPageProperty("description", "Закупки ОСК");
$_ENV['NEXT_ELEMENT'] = array(
    'DETAIL_PAGE_URL' => '/press-center/',
    'NAME' => 'Пресс-центр',
);
?>

<?/*
** Закупки из инфоблока:
*/?>

<?$APPLICATION->IncludeComponent("osk:rs.purchases_usc_list", "main", false, false);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>