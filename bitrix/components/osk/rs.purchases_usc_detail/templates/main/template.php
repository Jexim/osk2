<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->SetAdditionalCSS('/f/1/purchases-usc/detail.css');
$APPLICATION->SetTitle($arResult['ELEMENT']['ITEM']['NAME']);
?>

<div class="purchase_detail">

    <div class="block clear">
        <div class="breadcrumbs">
            <ul>
                <li><a href="/purchases/purchases-usc/" title="Пресс-центр">Объявленные закупки ОСК</a></li>
            </ul>
        </div>

        <div class="purchases_number">Закупка № <?=$arResult['ELEMENT']['PROP']['NUMBER']['VALUE']?></div>

        <h1><?=$arResult['ELEMENT']['ITEM']['NAME']?></h1>
    </div>

    <div class="block clear block_characteristics">
        <table id="myTable" class="char tablesorter">
            <tbody>
            <? if(!empty($arResult['ELEMENT']['PROP']['DATE_PLACEMENT_PURCHASE_DOCUMENTATION']['VALUE'])): ?>
                <tr><td class="param"><span class="text">Дата размещения документации о закупке</span></td> <td class="value"><span class="text"><?=$arResult['ELEMENT']['PROP']['DATE_PLACEMENT_PURCHASE_DOCUMENTATION']['VALUE']?></span></td></tr>
            <? endif; ?>
            <? if(!empty($arResult['ELEMENT']['PROP']['DATE_START_APPLICATIONS']['VALUE'])): ?>
                <tr><td class="param"><span class="text">Дата начала приема заявок</span></td> <td class="value"><span class="text"><?=$arResult['ELEMENT']['PROP']['DATE_START_APPLICATIONS']['VALUE']?></span></td></tr>
            <? endif; ?>
            <? if(!empty($arResult['ELEMENT']['PROP']['DATE_DEADLINE_RECEIVING']['VALUE'])): ?>
                <tr><td class="param"><span class="text">Окончание приема заявок или текущего этапа</span></td> <td class="value"><span class="text"><?=$arResult['ELEMENT']['PROP']['DATE_DEADLINE_RECEIVING']['VALUE']?></span></td></tr>
            <? endif; ?>
            <? if(!empty($arResult['ELEMENT']['PROP']['DATE_FINISH_APPLICATIONS']['VALUE'])): ?>
                <tr><td class="param"><span class="text">Дата завершения приема заявок</span></td> <td class="value"><span class="text"><?=$arResult['ELEMENT']['PROP']['DATE_FINISH_APPLICATIONS']['VALUE']?></span></td></tr>
            <? endif; ?>
            <? if(!empty($arResult['ELEMENT']['PROP']['DATE_BID_OPENING']['VALUE'])): ?>
                <tr><td class="param"><span class="text">Дата вскрытия конвертов</span></td> <td class="value"><span class="text"><?=$arResult['ELEMENT']['PROP']['DATE_BID_OPENING']['VALUE']?></span></td></tr>
            <? endif; ?>
            <? if(!empty($arResult['ELEMENT']['PROP']['MAX_PRICE']['VALUE'])): ?>
                <tr><td class="param"><span class="text">Начальная цена</span></td> <td class="value"><span class="text"><?=number_format($arResult['ELEMENT']['PROP']['MAX_PRICE']['VALUE'], 0, ',', ' ')?> руб.</span></td></tr>
            <? endif; ?>
            <? if(!empty($arResult['ELEMENT']['PROP']['METHOD']['VALUE'])): ?>
                <tr><td class="param"><span class="text">Способ закупки</span></td> <td class="value"><span class="text"><?=$arResult['ELEMENT']['PROP']['METHOD']['VALUE']?></span></td></tr>
            <? endif; ?>
            </tbody>
        </table>
    </div>

    <div class="block clear">
        <div class="files">

            <? if(!empty($arResult['ELEMENT']['PROP']['PROTOCOL_APPROVAL_DOCUMENTATION']['VALUE'])): ?>
                <h3>Протокол утверждения закупочной документации</h3>
                <? foreach($arResult['ELEMENT']['PROP']['PROTOCOL_APPROVAL_DOCUMENTATION']['VALUE'] as $value): ?>
                    <? $file = CFile::GetFileArray($value)  ?>
                    <div class="file">
                        <a href="<?= $file['SRC'] ?>" class="underline">
                            <div class="icon <? if($file['CONTENT_TYPE']=='application/pdf'): ?>icons-pdf<? endif; ?><? if($file['CONTENT_TYPE']=='application/vnd.ms-excel'): ?>icons-xls<? endif; ?>"></div>
                            <? if(!empty($file['DESCRIPTION'])): ?>
                                <?= $file['DESCRIPTION'] ?>
                            <? else: ?>
                                <?= $file['FILE_NAME'] ?>
                            <? endif; ?>
                        </a>
                        <div class="info">
                            <span class="value size"><?= number_format($file['FILE_SIZE']/1048576, 2, ',', ' '); ?> мб</span>
                        </div>
                    </div>
                <? endforeach; ?>
            <? endif; ?>

            <? if(!empty($arResult['ELEMENT']['PROP']['MINUTES_PROCUREMENT_COMMISSION']['VALUE'])): ?>
                <h3>Протокол закупочной комиссии</h3>
                <? foreach($arResult['ELEMENT']['PROP']['MINUTES_PROCUREMENT_COMMISSION']['VALUE'] as $value): ?>
                    <? $file = CFile::GetFileArray($value)  ?>
                    <div class="file">
                        <a href="<?= $file['SRC'] ?>" class="underline">
                            <div class="icon <? if($file['CONTENT_TYPE']=='application/pdf'): ?>icons-pdf<? endif; ?><? if($file['CONTENT_TYPE']=='application/vnd.ms-excel'): ?>icons-xls<? endif; ?>"></div>
                            <? if(!empty($file['DESCRIPTION'])): ?>
                                <?= $file['DESCRIPTION'] ?>
                            <? else: ?>
                                <?= $file['FILE_NAME'] ?>
                            <? endif; ?>
                        </a>
                        <div class="info">
                            <span class="value size"><?= number_format($file['FILE_SIZE']/1048576, 2, ',', ' '); ?> мб</span>
                        </div>
                    </div>
                <? endforeach; ?>
            <? endif; ?>

            <? if(!empty($arResult['ELEMENT']['PROP']['DOCUMENTATION']['VALUE'])): ?>
                <h3>Документация</h3>
                <? foreach($arResult['ELEMENT']['PROP']['DOCUMENTATION']['VALUE'] as $value): ?>
                    <? $file = CFile::GetFileArray($value)  ?>
                    <div class="file">
                        <a href="<?= $file['SRC'] ?>" class="underline">
                            <div class="icon <? if($file['CONTENT_TYPE']=='application/pdf'): ?>icons-pdf<? endif; ?><? if($file['CONTENT_TYPE']=='application/msword'): ?>icons-doc<? endif; ?>"></div>
                            <? if(!empty($file['DESCRIPTION'])): ?>
                                <?= $file['DESCRIPTION'] ?>
                            <? else: ?>
                                <?= $file['FILE_NAME'] ?>
                            <? endif; ?>
                        </a>
                        <div class="info">
                            <span class="value size"><?= number_format($file['FILE_SIZE']/1048576, 2, ',', ' '); ?> мб</span>
                        </div>
                    </div>
                <? endforeach; ?>
            <? endif; ?>
        </div>
    </div>

</div>

<? if (!empty($arResult['ELEMENT']['PROP']['RELATED_PRODUCTS']['VALUE'])): ?>
    <? $APPLICATION->IncludeComponent("osk:rs.products_list", "widget", array("PRODUCT_ID" => $arResult['ELEMENT']['PROP']['RELATED_PRODUCTS']['VALUE'], "DOP_PROJECT" => "Y", "TEXT_H3" => "Связанные проекты"), false); ?>
<? endif; ?>