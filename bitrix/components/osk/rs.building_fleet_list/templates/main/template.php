<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="filter_year">
    <? foreach ($arResult['YEAR'] as $year):?>
        <? if($arResult['THIS_YEAR']==$year): ?>
            <div class="item selected"><b><?=$year?></b></div>
        <? else: ?>
            <div class="item"><a href="/press-center/corporate-media/<?=$year?>/"><?=$year?></a></div>
        <? endif; ?>
    <? endforeach; ?>
</div>
<div class="columns magazine-list">
    <? foreach ($arResult['ITEM'] as $value): ?>
        <div class="col">
            <div class="image"><a href="<?= $value['FILE']['SRC'] ?>"><img src="<?= CFile::GetPath($value['DETAIL_PICTURE']) ?>"></a></div>
            <div class="name"><a href="<?= $value['FILE']['SRC'] ?>"><?= $value['NAME'] ?></a></div>
            <div class="size">PDF <?= number_format($value['FILE']['FILE_SIZE']/1048576, 2, ',', ' '); ?> Мб</div>
        </div>
    <? endforeach; ?>
</div>
<p><?= $arResult['PAGINATION'] ?></p>