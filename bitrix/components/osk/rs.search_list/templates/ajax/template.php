<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<input type="hidden" name="count" value="<?=$arResult['PAGE_COUNT']?>">
<? foreach ($arResult['ITEM'] as $value): ?>
    <div class="item">
        <div class="text without_image">
            <div class="name h3"><a href="<?= $value['DETAIL_PAGE_URL'] ?>"><?= $value['NAME'] ?></a></div>
            <div class="preview"><?= $value['PREVIEW_TEXT'] ?><?= $value['PROPERTY_SHORT_TEXT_VALUE'] ?></div>
            <div class="path">
                <? foreach ($value['PATH'] as $key=>$path): ?>
                    / <a href="<?= $key ?>"><?= $path[$_SESSION['LANG']] ?></a>
                <? endforeach; ?>
            /</div>
        </div>
    </div>
<? endforeach; ?>