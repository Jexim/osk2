<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<ul class="list">
    <? foreach ($arResult as $value): ?>     
        <li><a target="_blank" class="external" href="<?= $value['PROPERTY_LINK_PURCHASE_VALUE'] ?>"><span class="text"><?= $value['NAME'] ?></span><span class="icons-external"></span></a></li>
    <? endforeach; ?>
</ul>