<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Contact information");
$APPLICATION->SetPageProperty("title", "Contact information");
$APPLICATION->SetPageProperty("keywords", "Contact information");
$APPLICATION->SetPageProperty("description", "Contact information");
?>
<div class="block">
    <?$APPLICATION->IncludeComponent("osk:rs.contacts_list", "main", array(), false);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>