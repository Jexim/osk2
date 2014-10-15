<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Civil products");
$_ENV['NEXT_ELEMENT'] = array(
    'DETAIL_PAGE_URL' => '/en/innovation/',
    'NAME' => 'Innovation',
);
?>
<?$APPLICATION->IncludeComponent("osk:rs.products_list", "default", array("SECTION_ID"=>51, "TYPE"=>"civil"), false);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>