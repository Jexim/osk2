<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результаты поиска");
?>
<div class="block second">
    <?$APPLICATION->IncludeComponent("osk:rs.search_list", "main", array('COUNT_PAGE'=>10), false);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>