<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->SetAdditionalCSS('/f/1/widget/photo.css');
?>

<div class="block wide no-padding-left">
    <div class="gallery_mansory isotope" style="opacity: 1;">
        <? foreach ($arResult['ITEM'] as $value): ?>
            <div class="item <? if ($value['PROPERTY_BIG_IMG_VALUE']): ?>width50<? endif; ?> section_all section_<?= $value['IBLOCK_SECTION_ID'] ?>"><a class="image fancybox" rel="gallery<?= $value['IBLOCK_SECTION_ID'] ?>" <? if(!empty($value['DETAIL_PICTURE'])): ?>href="<?= CFile::GetPath($value['DETAIL_PICTURE']) ?>"<? endif; ?> title="<?= $value['DETAIL_TEXT'] ?>"><img src="<? if(!empty($value['PREVIEW_PICTURE'])): ?><?= CFile::GetPath($value['PREVIEW_PICTURE']) ?><? else: ?><?= CFile::GetPath($value['DETAIL_PICTURE']) ?><? endif; ?>"></a></div>
        <? endforeach; ?>
    </div>
</div>