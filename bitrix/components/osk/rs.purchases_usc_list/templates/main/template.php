<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/purchases-usc/index.js');
$APPLICATION->SetAdditionalCSS('/f/1/purchases-usc/index.css');
?>


<script type="text/javascript" src="/js/jquery.tablesorter.js"></script>
<script>
    $(document).ready(function() {
            $(".horizontal-table").tablesorter();
    });
</script>


<div class="block clear">
    <div class="als-switcher">
        <div class="list_search_block">
            <!-- <div class="form_validate field required" data-id="field">
                <form method="GET" action="/search/">
                    <input type="hidden" value="news" name="TYPE">
                    <input type="text" placeholder="Поиск закупок" value="" name="SEARCH_TEXT"><button class="small disabled b_submit">Найти</button>
                </form>
            </div> -->
            <div class="form_validate field" data-id="field">
                <form action="/search/">
                    <input type="hidden" value="purchases_usc" name="TYPE" />
                    <input type="text" data-xp="required: true" placeholder="Поиск закупок" name="SEARCH_TEXT" /><button data-xp="enabled_on_completed: true" class="small">Найти</button>
                </form>
            </div>
            <div class="sub_filter filter_month">
                <div class="item switcher_item for_jn_view selected "><span class="pseudo section_button" section="15">Действующие</span></div>
                <div class="item switcher_item for_jn_view"><span class="pseudo section_button" section="16">Завершенные</span></div>
            </div>
        </div>
    </div>
</div>
<? //print_r($arResult['ELEMENTS']) ?>
<div class="block_purchases_table">
    <table class="horizontal-table section section_15 tablesorter" id="myTable">
        <thead>
        <tr>
            <th width="455">Тип, номер, наименование</th>
            <th>Начальная цена</th>
            <th>Начало приема заявок</th>
            <th>Размещение документации о закупке</th>
            <th>Окончание приема заявок или текущего этапа</th>
        </tr>
        </thead>
        <tbody>
        <? foreach($arResult['ELEMENTS'][15] as $value): ?>
            <tr class="section_<?=$value['ITEM']['IBLOCK_SECTION_ID']?>" onclick="document.location.href = '<?=$value['ITEM']['DETAIL_PAGE_URL']?>'">
                <td>
                    <span><?=$value['PROP']['METHOD']['VALUE']?> №<?=$value['PROP']['NUMBER']['VALUE']?></span>
                    <br/>
                    <a href="<?=$value['ITEM']['DETAIL_PAGE_URL']?>"><?=$value['ITEM']['NAME']?></a>
                </td>
                <td><?=number_format($value['PROP']['MAX_PRICE']['VALUE'], 0, ',', ' ')?> руб.</td>
                <td><?=$value['PROP']['DATE_START_APPLICATIONS']['VALUE']?></td>
                <td><?=$value['PROP']['DATE_PLACEMENT_PURCHASE_DOCUMENTATION']['VALUE']?></td>
                <td><?=$value['PROP']['DATE_DEADLINE_RECEIVING']['VALUE']?></td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
    <table class="horizontal-table section section_16" style="display: none;">
        <thead>
        <tr>
            <th width="455">Тип, номер, наименование</th>
            <th>Окончание приема заявок</th>
            <th>Вскрытие конвертов</th>
        </tr>
        </thead>
        <tbody>
        <? foreach($arResult['ELEMENTS'][16] as $value): ?>
            <tr class="section_<?=$value['ITEM']['IBLOCK_SECTION_ID']?>">
                <td>
                    <span><?=$value['PROP']['METHOD']['VALUE']?> №<?=$value['PROP']['NUMBER']['VALUE']?></span>
                    <br/>
                    <a href="<?=$value['ITEM']['DETAIL_PAGE_URL']?>"><?=$value['ITEM']['NAME']?></a>
                </td>
                <td><?=$value['PROP']['DATE_FINISH_APPLICATIONS']['VALUE']?></td>
                <td><?=$value['PROP']['DATE_BID_OPENING']['VALUE']?></td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
</div>