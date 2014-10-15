<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="files">
    <? foreach ($arResult as $value): ?>
        <div class="file">
            <a href="<?= $value['FILE']['SRC'] ?>" class="underline">
                <div class="icon <? if ($value['FILE']['CONTENT_TYPE'] == 'application/pdf'): ?>icons-pdf<? endif; ?><? if ($value['FILE']['CONTENT_TYPE'] == 'application/vnd.ms-excel'): ?>icons-xls<? endif; ?>"></div>
                <?= $value['NAME'] ?>
            </a>
            <div class="info">
                <span class="value size"><?= number_format($value['FILE']['FILE_SIZE'] / 1048576, 2, ',', ' '); ?> мб</span>
                <span class="value date"><?= $value['DATE_ACTIVE_FROM'] ?></span>
            </div>
        </div>
    <? endforeach; ?>
</div>