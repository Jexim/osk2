<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/products/index.js');
$APPLICATION->SetAdditionalCSS('/f/1/products/index.css');
?>

<div class="products_wrapper">
    <h1 class="products_wrapper_title">
        <?if($arResult['TYPE'] == 'military'){?>
            <?= GetMessage("SELECT_PRODUCTS_MILITARY") ?>
        <?}else{?>
            <?= GetMessage("SELECT_PRODUCTS_CIVIL") ?>
        <?}?>
    </h1>
    <div class="sub_menu sub_menu-products sub_menu-products_<?if($arResult['TYPE'] == 'military'){?>military<?}else{?>civil<?}?>" data-id="hide">
        <div class="item <? if(empty($_REQUEST['section'])): ?>selected<? endif; ?> section_button" section="all"><a><?= GetMessage("ALL_PRODUCTS") ?></a></div>
        <? foreach ($arResult['SECTION'] as $value): ?>       
            <div class="item section_button <? if($_REQUEST['section']==$value['ID']): ?>selected<? endif; ?>" section="<?= $value['ID'] ?>"><a><?= $value['NAME'] ?></a></div>
        <? endforeach; ?>        
    </div>
</div>

<?$sectionNumber = 0;?>
<? foreach ($arResult['ITEM'] as $key => $arSection): ?>
    <div class="block clear section section_all" <? if(!empty($_REQUEST['section'])): ?>style="display:none;"<? endif; ?>>
        <p class="lead_2 <?if($arResult['TYPE'] == 'military'){?>military<?}?>" data-id="hide"><?= $arResult['SECTION'][$key]['NAME'] ?></p>
    </div>

<div class="products_block section section_<?= $key ?>" data-id="<?=$sectionNumber;?>" <? if(!empty($_REQUEST['section']) && $key!=$_REQUEST['section']): ?>style="display:none;"<? endif; ?>>
        <!-- <div class="products_block_row"> -->
            <? //$i = 1; ?>
            <? foreach ($arSection as $value): ?>       
                <a class="products_block_one <?if($arResult['TYPE'] == 'military'){?>civilian<?}?> <? if(!empty($value['PREVIEW_PICTURE']) || (!empty($value['PROPERTY_TOP_IMAGES_VALUE']) && !empty($value['PROPERTY_DISPLAY_GEN_IMG_VALUE']))){?>products_block_one_yes<?}?>" data-id="hide" href="<?= $value['DETAIL_PAGE_URL'] ?>">
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
                        <div class="<? if(empty($value['PREVIEW_PICTURE'])){?>products_block_one_non<?}?>">
                            <img class="img_small_item_mask" src="<?= CFile::GetPath($value['PROPERTY_SCHEME_TRANSPARENCY_VALUE']) ?>">
                            <img data-id="<?= CFile::GetPath($value['PROPERTY_SCHEME_TRANSPARENCY_VALUE']) ?>" class="img_small_item" src="<? if(!empty($value['PROPERTY_SCHEME_VALUE'])): ?><?= CFile::GetPath($value['PROPERTY_SCHEME_VALUE']) ?><? elseif($arResult['TYPE'] == 'military'): ?>/images/osk-z-voen.png<? else: ?>/images/osk-z-grazhd.png<? endif; ?>">
                        </div>
                    </div>
                    <div class="products_one_link">
                        <p class="<? if(empty($value['PREVIEW_PICTURE'])){?>products_block_one_non<?}?>">
                            <?= $value['NAME'] ?>
                        </p>
                        <? if (!empty($value['PROPERTY_SHORT_TEXT_VALUE'])): ?>
                            <span>
                                <?= $value['PROPERTY_SHORT_TEXT_VALUE'] ?>
                            </span>
                        <? endif; ?>
                    </div>
                </a>
                <? //if ($i % 3 == 0): ?>
                    <!-- <div class="clear_both"></div> -->
                <!-- </div> -->
                <!-- <div class="products_block_row"> -->
                 <?// endif; ?>
                <?// $i++ ?>
            <? endforeach; ?>    
            <div class="clear_both"></div>
        <!-- </div>     -->
        <!-- <div class="clear_both"></div> -->
    </div>
    <?$sectionNumber ++;?>
<? endforeach; ?>     