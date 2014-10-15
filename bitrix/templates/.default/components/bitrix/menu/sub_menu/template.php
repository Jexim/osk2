<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)): ?>
    <div class="sub_menu sub_menu_small_margin">
        <? foreach ($arResult as $arItem): ?>
            <? if($arItem['SELECTED']): ?>
                <div class="item selected"><b><?=$arItem['TEXT']?></b></div>
            <? else: ?>
                <div class="item"><a href="<?=$arItem['LINK']?>"><?=$arItem['TEXT']?></a></div>
            <? endif; ?>         
        <? endforeach; ?>
    </div>
<? endif; ?>