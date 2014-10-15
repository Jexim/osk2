<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/search/index.js');
if(SITE_ID!='s1'){
    $lang_prefix = '_' . SITE_ID;
}
?>

<h1 class="last_child"><?=GetMessage("Results_for")?> «<?= $_REQUEST['SEARCH_TEXT'] ?>»</h1>
<? if(!empty($arResult['ITEM'])): ?>
    <p><?=GetMessage("found")?> <?= $arResult['ITEM_COUNT'] ?> <?=GetMessage("results")?></p>
<? else: ?>
    <p><?=GetMessage("no_found")?></p>
<? endif ?>

<div class="als-switcher">
    <div class="list_search_block">
        <div class="form_validate field unrequired" data-id="field">
            <form>
                <input type="text" placeholder="<?=GetMessage('Site_search')?>" name="SEARCH_TEXT" value="<?= $_REQUEST['SEARCH_TEXT'] ?>"><button class="small b_submit"><?=GetMessage("Find")?></button>
            </form>
        </div>
        <? if(!empty($arResult['ITEM'])): ?>
            <div class="sub_filter type_filter">
                <? if($_REQUEST['TYPE']!='companies_list' . $lang_prefix && $_REQUEST['TYPE']!='purchases_usc' . $lang_prefix): ?><div class="item switcher_item for_pro_view <? if(empty($_REQUEST['TYPE'])): ?>selected<? endif; ?>"><span class="pseudo" type="all" lang="<?=LANGUAGE_ID?>"><?=GetMessage("whole_site")?></span></div><? endif; ?>
                <? if($arResult['SECTION']['products' . $lang_prefix]): ?><div class="item switcher_item for_all_view <? if($_REQUEST['TYPE']=='products' . $lang_prefix): ?>selected<? endif; ?>"><span class="pseudo" type="products" lang="<?=LANGUAGE_ID?>"><?=GetMessage("projects")?></span></div><? endif; ?>
                <? if($arResult['SECTION']['companies_list' . $lang_prefix] && $_REQUEST['TYPE']!='companies_list' . $lang_prefix): ?><div class="item switcher_item for_pro_view <? if($_REQUEST['TYPE']=='companies_list' . $lang_prefix): ?>selected<? endif; ?>"><span class="pseudo" type="companies_list" lang="<?=LANGUAGE_ID?>"><?=GetMessage("Enterprises")?></span></div><? endif; ?>
                <? if($arResult['SECTION']['news' . $lang_prefix]): ?><div class="item switcher_item for_all_view <? if($_REQUEST['TYPE']=='news' . $lang_prefix): ?>selected<? endif; ?>"><span class="pseudo" type="news" lang="<?=LANGUAGE_ID?>"><?=GetMessage("news")?></span></div><? endif; ?>
                <? if($arResult['SECTION']['press_releases' . $lang_prefix]): ?><div class="item switcher_item for_pro_view <? if($_REQUEST['TYPE']=='press_releases' . $lang_prefix): ?>selected<? endif; ?>"><span class="pseudo" type="press_releases" lang="<?=LANGUAGE_ID?>"><?=GetMessage("Press_releases")?></span></div><? endif; ?>
                <? if($arResult['SECTION']['media_corporation' . $lang_prefix]): ?><div class="item switcher_item for_pro_view <? if($_REQUEST['TYPE']=='media_corporation' . $lang_prefix): ?>selected<? endif; ?>"><span class="pseudo" type="media_corporation" lang="<?=LANGUAGE_ID?>"><?=GetMessage("Media_corporation")?></span></div><? endif; ?>
                <? if($arResult['SECTION']['purchases_usc' . $lang_prefix]): ?><div class="item switcher_item for_pro_view <? if($_REQUEST['TYPE']=='purchases_usc' . $lang_prefix): ?>selected<? endif; ?>"><span class="pseudo" type="purchases_usc" lang="<?=LANGUAGE_ID?>"><?=GetMessage("purchases")?></span></div><? endif; ?>
            </div>
        <? endif; ?>
    </div>
    
    <div class="list search_list">
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
    </div>  
</div>