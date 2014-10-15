<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$_ENV['NEXT_ELEMENT'] = array(
    'DETAIL_PAGE_URL' => '/press-center/',
    'NAME' => 'Пресс-центр',
);
?>

<style>
.sub_menu {display: none;}

.purchases_number {color: #000; font-family: 'DINPro-Light'; font-size: 3.4em; line-height: 1.1em;}

.block_characteristics {
    overflow: hidden;
    margin-bottom: 30px;
}

.block_characteristics h3 {
    margin-bottom: 8px;
}

.block_characteristics table.char td {
    padding-top: 35px;
}

.block_characteristics table.char td .text {
    font-size: 18px;
    color: #4e6577;
}

.block_characteristics table.char .value .text {
    color: #000;
    line-height: 1.5;
}
.block_characteristics table.char td.param{
    position: relative;
    width: 400px;
    vertical-align: top;
    background: url('/images/dashed_line.png');
    background-repeat: repeat-x;
    background-position: 0px 56px;
}

.block_characteristics table.char td.param .text {
    /*position: absolute;
    top: 27px;
    line-height: 24px;*/
    display: inline;
    line-height: 24px;

}

table.char td.value {
    padding-right: 0;
    text-align: left;
    vertical-align: top;
    padding-top: 34px;
}

table.char td.value .text {
    width: 100%;
    background: #fff;
    margin-bottom: 0px;
    padding-left: 2px;
}

table.char {
    margin-bottom: 0;
}

table.char tr {
    border: none;
}
</style>

<?$APPLICATION->IncludeComponent("osk:rs.purchases_usc_detail", "main", false, false);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>