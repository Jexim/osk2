<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="management">
    <? foreach ($arResult as $value): ?>
        <div class="item">
            <? if (!empty($value['DETAIL_PICTURE'])): ?>
                <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width' => 115, 'height' => 115), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true); ?>
                <div class="image"><img src="<?= $pach['src'] ?>"></div>
            <? endif; ?>
            <div class="text">
                <div class="name"><?= $value['NAME'] ?></div>
                <? if (!empty($value['PROPERTY_PLACE_WORK_VALUE'])): ?>
                    <div class="dolgnost"><?= $value['PROPERTY_PLACE_WORK_VALUE'] ?></div>
                <? endif; ?>
                <? if (!empty($value['PROPERTY_POSITION_VALUE'])): ?>
                    <div class="lid"><?= $value['PROPERTY_POSITION_VALUE'] ?></div>
                <? endif; ?>
            </div>
        </div>
    <? endforeach; ?>
</div>