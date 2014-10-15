<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="columns magazine-list">
    <? foreach ($arResult['ITEM'] as $value): ?>
        <div class="col">
            <div class="image"><a href="<?= $value['PROPERTY_URL_VALUE'] ?>" target="_blank"><img src="<?= CFile::GetPath($value['DETAIL_PICTURE']) ?>"></a></div>
        </div>
    <? endforeach; ?>
</div>
<p><?= $arResult['PAGINATION'] ?></p>