<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/media-corporation/index.js');?>

<div class="block second">
    <div class="als-switcher">
        <div class="list_search_block">
            <div class="form_validate field required" data-id="field">
                <form method="GET" action="/search/">     
                    <input type="hidden" value="media_corporation" name="TYPE" />
                    <input type="text" placeholder="Поиск в СМИ о корпорации" value="<?=$_REQUEST['SEARCH_TEXT']?>" name="SEARCH_TEXT"><button class="small disabled b_submit">Найти</button>
                </form>
            </div>
            <? if(empty($_REQUEST['SEARCH_TEXT'])): ?>
                <div class="filter_year">
                    <? foreach ($arResult['YEAR'] as $year):?>
                        <? if($arResult['THIS_YEAR']==$year): ?>                  
                            <div class="item selected"><b><?=$year?></b></div>
                        <? else: ?>
                            <div class="item"><a href="/press-center/media-corporation/<?=$year?>"><?=$year?></a></div>
                        <? endif; ?>
                    <? endforeach; ?>
                </div>
                <div class="sub_filter filter_month">
                    <div class="item switcher_item for_jn_view selected"><span class="pseudo" month="00">Весь год</span></div>
                    <? foreach ($arResult['MONTH'] as $key=>$month):?>              
                        <div class="item switcher_item for_jn_view"><span class="pseudo" month="<?=$key?>"><?=$month?></span></div>
                    <? endforeach; ?>
                </div>
            <? endif; ?>
        </div>
    </div>
</div>
<div class="block wide">
    <table class="about_in_smi">
        <tbody>
            <tr>
                <? $i=1 ?>
                <? foreach ($arResult['ITEM'] as $value): ?>
                    <? if($i%4==0): ?></tr><tr><? endif; ?>
                    <td>
                        <div class="name h4"><a href="<?=$value['DETAIL_PAGE_URL']?>"><?=$value['NAME']?></a></div>
                        <div class="text"><p><?=$value['~PREVIEW_TEXT']?></p></div>
                        <div class="date"><?=$value['DATE']?></div>
                        <div class="source"><a href="<?=$value['PROPERTY_LINK_PUBLICATION_VALUE']?>"><?=$value['PROPERTY_NAME_PUBLICATION_VALUE']?></a></div>
                    </td>
                    <? $i++ ?>
                <? endforeach; ?> 
            </tr>
        </tbody>
    </table>
    <?=$arResult['PAGINATION']?>
</div>
