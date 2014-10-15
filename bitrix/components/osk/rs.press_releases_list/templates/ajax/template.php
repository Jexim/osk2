<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->SetAdditionalCSS('/f/1/products/press-releases.css');
?>

<div class="list news switcher_view jn_view">
    <? foreach ($arResult['ITEM'] as $value): ?>
        <div class="item">
            <? if (!empty($value['DETAIL_PICTURE'])): ?>
                <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width' => 300, 'height' => 160), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true); ?>
                <a href="<?= $value['DETAIL_PAGE_URL'] ?>"><div class="image"><img src="<?= $pach['src'] ?>"></div></a>
            <? endif; ?>
            <div class="text <? if (empty($value['DETAIL_PICTURE'])): ?>without_image<? endif; ?>">
                <div class="name h3"><a href="<?= $value['DETAIL_PAGE_URL'] ?>"><?= $value['NAME'] ?></a></div>
                <div class="preview"><?= $value['~PREVIEW_TEXT'] ?></div>
                <div class="date"><?= $value['DATE'] ?></div>
            </div>
        </div>
    <? endforeach; ?>      
</div>
<?=$arResult['PAGINATION']?>