<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<a class="main_prev"></a>
<a class="main_next"></a>
<div class="main_big_carousel">			
    <ul>	
        <? foreach ($arResult['ITEM'] as $value): ?>
            <? if(!empty($arResult['PRODUCTS'][$value['PROPERTY_RELATED_PRODUCTS_VALUE']])): ?>
                <li>
                    <div class="main_carousel_one">
                        <? if(!empty($value['DETAIL_PICTURE'])): ?>
                            <? $picArray = CFile::GetFileArray($value['DETAIL_PICTURE']); ?>
                            <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.594): ?>
                                <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width'=>1024, 'height'=>3000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                            <? else: ?>
                                <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width'=>3000, 'height'=>524), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                            <? endif; ?>

                            <img class="main_carousel_img <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.594): ?>img_height_100<? else: ?>img_width_100<? endif; ?>" src="<?= $pach['src'] ?>">
                        <? else: ?>
                            <? $picArray = CFile::GetFileArray($arResult['PRODUCTS'][$value['PROPERTY_RELATED_PRODUCTS_VALUE']]['PROPERTY_TOP_IMAGES_VALUE']); ?>
                            <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.594): ?>
                                <? $pach = CFile::ResizeImageGet($arResult['PRODUCTS'][$value['PROPERTY_RELATED_PRODUCTS_VALUE']]['PROPERTY_TOP_IMAGES_VALUE'], array('width'=>1024, 'height'=>3000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                            <? else: ?>
                                <? $pach = CFile::ResizeImageGet($arResult['PRODUCTS'][$value['PROPERTY_RELATED_PRODUCTS_VALUE']]['PROPERTY_TOP_IMAGES_VALUE'], array('width'=>3000, 'height'=>524), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                            <? endif; ?>

                            <img class="main_carousel_img <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.594): ?>img_height_100<? else: ?>img_width_100<? endif; ?>" src="<?= $pach['src'] ?>">
                        <? endif; ?>
                        <div class="main_carousel_text">
                            <img src="<? if($value['SECTION']==5): ?>/images/main_carousel/military_ico.png<? else: ?>/images/main_carousel/civilian_ico.png<? endif; ?>" alt="">
                            <a <? if($arResult['PRODUCTS'][$value['PROPERTY_RELATED_PRODUCTS_VALUE']]['ACTIVE']!='N' && empty($value['PROPERTY_URL_VALUE'])): ?>href="<?= $arResult['PRODUCTS'][$value['PROPERTY_RELATED_PRODUCTS_VALUE']]['DETAIL_PAGE_URL'] ?>"<? elseif(!empty($value['PROPERTY_URL_VALUE'])): ?><?=!empty($value['PROPERTY_URL_VALUE'])?><? endif; ?> <? if($arResult['PRODUCTS'][$value['PROPERTY_RELATED_PRODUCTS_VALUE']]['ACTIVE']=='N' && empty($value['PROPERTY_URL_VALUE'])): ?>class="slider_not_link" <? endif; ?>>
                                <?= $arResult['PRODUCTS'][$value['PROPERTY_RELATED_PRODUCTS_VALUE']]['NAME'] ?>
                            </a>
                            <? if(!empty($value['~DETAIL_TEXT'])): ?>
                                <span><?= $value['~DETAIL_TEXT'] ?></span>
                            <? elseif(!empty($arResult['PRODUCTS'][$value['PROPERTY_RELATED_PRODUCTS_VALUE']]['PROPERTY_SHORT_TEXT_VALUE'])): ?>
                                <span><?= $arResult['PRODUCTS'][$value['PROPERTY_RELATED_PRODUCTS_VALUE']]['PROPERTY_SHORT_TEXT_VALUE'] ?></span>
                            <? endif; ?>
                        </div>
                    </div>
                </li>
            <? else: ?>
                <? if(!empty($value['PROPERTY_RELATED_VIDEO_VALUE'])): ?>
                    <li>
                        <div class="main_carousel_one main_carousel_one_video">
                            <div class="video_in_carousel video_id_<?=$value['PROPERTY_RELATED_VIDEO_VALUE']?>" data-id="<?=$value['PROPERTY_RELATED_VIDEO_VALUE']?>">

                            </div>
                            <? if(!empty($arResult['VIDEO'][$value['PROPERTY_RELATED_VIDEO_VALUE']]['PREVIEW_PICTURE'])): ?>
                                <? if(!empty($value['DETAIL_PICTURE'])): ?>
                                    <? $picArray = CFile::GetFileArray($value['DETAIL_PICTURE']); ?>
                                    <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.594): ?>
                                        <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width'=>1024, 'height'=>3000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                                    <? else: ?>
                                        <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width'=>3000, 'height'=>524), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                                    <? endif; ?>

                                    <img class="main_carousel_img <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.594): ?>img_height_100<? else: ?>img_width_100<? endif; ?>" src="<?= $pah['src'] ?>">
                                <? else: ?>
                                    <? $picArray = CFile::GetFileArray($arResult['VIDEO'][$value['PROPERTY_RELATED_VIDEO_VALUE']]['PREVIEW_PICTURE']); ?>
                                    <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.594): ?>
                                        <? $pach = CFile::ResizeImageGet($arResult['VIDEO'][$value['PROPERTY_RELATED_VIDEO_VALUE']]['PREVIEW_PICTURE'], array('width'=>1024, 'height'=>3000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                                    <? else: ?>
                                        <? $pach = CFile::ResizeImageGet($arResult['VIDEO'][$value['PROPERTY_RELATED_VIDEO_VALUE']]['PREVIEW_PICTURE'], array('width'=>3000, 'height'=>524), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                                    <? endif; ?>

                                    <img class="main_carousel_img <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.594): ?>img_height_100<? else: ?>img_width_100<? endif; ?>" src="<?= $pach['src'] ?>">
                                <? endif; ?>
                            <? endif; ?>
                            <div class="main_carousel_text">
                                <a <? if(!empty($value['PROPERTY_URL_VALUE'])): ?>href="<?=$value['PROPERTY_URL_VALUE']?>"<? else: ?>class="slider_not_link"<? endif; ?>><?=$arResult['VIDEO'][$value['PROPERTY_RELATED_VIDEO_VALUE']]['NAME']?></a>
                                <? if(!empty($value['~DETAIL_TEXT'])): ?>
                                    <span><?= $value['~DETAIL_TEXT'] ?></span>
                                <? else: ?>
                                    <span><?= $arResult['VIDEO'][$value['PROPERTY_RELATED_VIDEO_VALUE']]['NAME'] ?></span>
                                <? endif; ?>
                            </div>
                        </div>
                    </li>
                <? else: ?>
                    <li>
                        <div class="main_carousel_one">
                            <? if(!empty($value['DETAIL_PICTURE'])): ?>
                                <? $picArray = CFile::GetFileArray($value['DETAIL_PICTURE']); ?>
                                <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.594): ?>
                                    <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width'=>1024, 'height'=>3000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                                <? else: ?>
                                    <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width'=>3000, 'height'=>524), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                                <? endif; ?>

                                <img class="main_carousel_img <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.594): ?>img_height_100<? else: ?>img_width_100<? endif; ?>" src="<?= $pach['src'] ?>">
                            <? endif; ?>
                            <div class="main_carousel_text">
                                <a <? if(!empty($value['PROPERTY_URL_VALUE'])): ?>href="<?=$value['PROPERTY_URL_VALUE']?>"<? else: ?>class="slider_not_link"<? endif; ?>><?= $value['NAME'] ?></a>
                                <? if(!empty($value['~DETAIL_TEXT'])): ?>
                                    <span><?= $value['~DETAIL_TEXT'] ?></span>
                                <? endif; ?>
                            </div>
                        </div>
                    </li>
                <? endif; ?>
            <? endif; ?>
        <? endforeach; ?>
    </ul>
</div>
<div class="main_big_carousel_pagination"></div>