<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/photo/index.js');
$APPLICATION->SetAdditionalCSS('/f/1/photo/index.css');
?>

<div class="block clear">
    <div class="sub_filter filter_section">
        <? if($arResult['ALL_CATEGORY'] || count($arResult['SECTION'])!=1): ?>
            <div class="item switcher_item for_jn_view selected" section="all"><span class="pseudo">Все фотоматериалы</span></div>   
        <? endif; ?>
        <? foreach ($arResult['SECTION'] as $section): ?>
            <div class="item switcher_item for_jn_view <? if(!$arResult['ALL_CATEGORY'] && count($arResult['SECTION'])==1): ?>selected<? endif; ?>" section="<?= $section['ID'] ?>"><span class="pseudo"><?= $section['NAME'] ?></span></div>
        <? endforeach; ?>
    </div>
</div>
<div class="block wide no-padding-left">
    <div class="gallery_mansory isotope" style="opacity: 1;">
        <input type="hidden" name="count" value="<?= $arResult['COUNT']?>" />
        <? foreach ($arResult['ITEM'] as $value): ?>
            <div class="item <? if ($value['PROPERTY_BIG_IMG_VALUE']): ?>width50<? endif; ?> section_all section_<?= $value['IBLOCK_SECTION_ID'] ?>"><a class="image fancybox" rel="gallery<?= $value['IBLOCK_SECTION_ID'] ?>" <? if(!empty($value['DETAIL_PICTURE'])): ?>href="<?= CFile::GetPath($value['DETAIL_PICTURE']) ?>"<? endif; ?> title="<?= $value['DETAIL_TEXT'] ?>"><img src="<? if(!empty($value['PREVIEW_PICTURE'])): ?><?= CFile::GetPath($value['PREVIEW_PICTURE']) ?><? else: ?><?= CFile::GetPath($value['DETAIL_PICTURE']) ?><? endif; ?>"></a></div>
        <? endforeach; ?>
    </div>
</div>