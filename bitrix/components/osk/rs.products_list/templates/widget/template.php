<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/widget/products.js');
$APPLICATION->SetAdditionalCSS('/f/1/widget/products.css');
?>

<? if(!empty($arResult['WIDGET_ITEM'])): ?>
    <? if(empty($arParams['SECTION_NUMBER'])): ?>
        <?$sectionNumber = 0;?>
    <? else: ?>
        <?$sectionNumber = $arParams['SECTION_NUMBER'];?>
    <? endif; ?>
    <div class="other_products_block">
        <div class="block clear">
            <? if($arParams["PRODUCT_H3"]): ?><h3 class="widget_products_page"><?=GetMessage("OTHER")?> <?=strtolower($arResult['SECTION'][$arParams["SECTION_ID"]]['NAME'])?></h3><? endif; ?>
            <? if($arParams["TEXT_H3"]): ?><h3><?=$arParams["TEXT_H3"]?></h3><? endif; ?>
        </div>
        <div class="products_block section section_<?= $key ?>" data-id="<?=$sectionNumber;?>" <? if (!empty($_REQUEST['section']) && $key != $_REQUEST['section']): ?>style="display:none;"<? endif; ?>>
            <? foreach ($arResult['WIDGET_ITEM'] as $value): ?>
                <a class="products_block_one <? if ($value['SECTION_TYPE'] == 'military') { ?>civilian<? } ?> <? if (!empty($value['PREVIEW_PICTURE']) || (!empty($value['PROPERTY_TOP_IMAGES_VALUE']) && !empty($value['PROPERTY_DISPLAY_GEN_IMG_VALUE']))) { ?>products_block_one_yes<? } ?>" data-id="hide" href="<?= $value['DETAIL_PAGE_URL'] ?>">
                    <? if(!empty($value['PREVIEW_PICTURE'])): ?>
                        <? $pach = CFile::ResizeImageGet($value['PREVIEW_PICTURE'], array('width'=>294, 'height'=>294), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                        <div class="img_big_item">
                            <img src="<?= $pach['src'] ?>" class="img_big_item">
                        </div>
                    <? elseif(!empty($value['PROPERTY_TOP_IMAGES_VALUE']) && !empty($value['PROPERTY_DISPLAY_GEN_IMG_VALUE'])): ?>
                        <? $pach = CFile::ResizeImageGet($value['PROPERTY_TOP_IMAGES_VALUE'], array('width'=>294, 'height'=>294), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                        <div class="img_big_item">
                            <img src="<?= $pach['src'] ?>" class="img_big_item">
                        </div>
                    <? endif; ?>
                    <div class="products_block_one_ico">
                        <div class="<? if (empty($value['PREVIEW_PICTURE'])) { ?>products_block_one_non<? } ?>">
                            <img class="img_small_item_mask" src="<?= CFile::GetPath($value['PROPERTY_SCHEME_TRANSPARENCY_VALUE']) ?>">
                            <img data-id="<?= CFile::GetPath($value['PROPERTY_SCHEME_TRANSPARENCY_VALUE']) ?>" class="img_small_item" src="<? if(!empty($value['PROPERTY_SCHEME_VALUE'])): ?><?= CFile::GetPath($value['PROPERTY_SCHEME_VALUE']) ?><? elseif($value['SECTION_TYPE'] == 'military'): ?>/images/osk-z-voen.png<? else: ?>/images/osk-z-grazhd.png<? endif; ?>">
                        </div>
                    </div>
                    <div class="products_one_link">
                        <p class="<? if (empty($value['PREVIEW_PICTURE'])) { ?>products_block_one_non<? } ?>">
                            <?= $value['NAME'] ?>
                        </p>
                        <? if (!empty($value['PROPERTY_SHORT_TEXT_VALUE'])): ?>
                            <span>
                                <?= $value['PROPERTY_SHORT_TEXT_VALUE'] ?>
                            </span>
                        <? endif; ?>
                    </div>
                </a>
            <? endforeach; ?>
            <div class="clear_both"></div>
        </div>
    </div>
<? endif; ?>