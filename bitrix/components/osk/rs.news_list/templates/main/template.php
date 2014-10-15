<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/news/index.js');
$APPLICATION->SetAdditionalCSS('/f/1/news/index.css');
?>

<div class="block second">
    <div class="als-switcher">
        <div class="list_search_block">
            <div class="form_validate field required" data-id="field">
                <form method="GET" action="/search/">
                    <input type="hidden" value="news" name="TYPE" />
                    <input type="text" placeholder="Поиск в новостях" value="<?=$_REQUEST['SEARCH_TEXT']?>" name="SEARCH_TEXT"><button class="small disabled b_submit">Найти</button>
                </form>
            </div>
            <? if(empty($_REQUEST['SEARCH_TEXT'])): ?>
                <div class="filter_year">
                    <? foreach ($arResult['YEAR'] as $year):?>
                        <? if($arResult['THIS_YEAR']==$year): ?>
                            <div class="item selected"><b><?=$year?></b></div>
                        <? else: ?>
                            <div class="item"><a href="/press-center/news/<?=$year?>"><?=$year?></a></div>
                        <? endif; ?>
                    <? endforeach; ?>
                </div>
                <div class="sub_filter filter_month">
                    <div class="item switcher_item for_jn_view <? if(empty($_REQUEST['MONTH'])): ?>selected<? endif; ?>"><span class="pseudo" month="00">Весь год</span></div>
                    <? foreach ($arResult['MONTH'] as $key=>$month):?>
                        <div class="item switcher_item for_jn_view <? if($_REQUEST['MONTH']==$key): ?>selected<? endif; ?>"><span class="pseudo" month="<?=$key?>"><?=$month?></span></div>
                    <? endforeach; ?>
                </div>
            <? endif; ?>
        </div>

        <div class="all_news_list">
            <div class="list news switcher_view jn_view">
                <? foreach ($arResult['ITEM'] as $value): ?>
                    <div class="item">
                        <? if(!empty($value['DETAIL_PICTURE'])): ?>
                            <? $pach = CFile::ResizeImageGet($value['DETAIL_PICTURE'], array('width'=>300, 'height'=>160), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);?>
                            <a href="<?=$value['DETAIL_PAGE_URL']?>"><div class="image"><img src="<?=$pach['src']?>"></div></a>
                        <? endif; ?>
                        <div class="text <? if(empty($value['DETAIL_PICTURE'])): ?>without_image<? endif; ?>">
                            <div class="name h3"><a href="<?=$value['DETAIL_PAGE_URL']?>"><?=$value['NAME']?></a></div>
                            <div class="preview"><?=$value['~PREVIEW_TEXT']?></div>
                            <div class="date"><?=$value['DATE']?></div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
            <?=$arResult['PAGINATION']?>
        </div>
        <div class="news_list"></div>
    </div>
</div>
