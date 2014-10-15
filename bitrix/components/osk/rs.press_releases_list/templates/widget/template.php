<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="news_three_blocks">
    <? foreach ($arResult['ITEM'] as $value): ?>
        <div class="news_three_blocks_one">
            <a href="<?=$value['DETAIL_PAGE_URL']?>" class="news_three_blocks_img">
                <? $picArray = CFile::GetFileArray($value['DETAIL_PICTURE']); ?>
                <? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.515): ?>
                    <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width'=>300, 'height'=>413), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                <? else: ?>
                    <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width'=>413, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                <? endif; ?>
                <? if(!empty($value['DETAIL_PICTURE'])): ?>
                    <img src="<?=$pach['src']?>" class="<? if($picArray['WIDTH']/$picArray['HEIGHT']>=1.515): ?>img_height_100<? else: ?>img_width_100<? endif; ?>">
                <? else: ?>
                    <img src="/images/news-default-image.jpg" class="img_width_100">
                <? endif; ?>
            </a>
            <div class="news_three_blocks_text">
                <a href="<?=$value['DETAIL_PAGE_URL']?>"><?=$value['NAME']?></a>
                <p><?=$value['DATE']?></p>
            </div>
        </div>
    <? endforeach; ?>
</div>