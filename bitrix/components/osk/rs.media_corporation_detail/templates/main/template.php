<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/media-corporation/detail.js');
$APPLICATION->SetAdditionalCSS('/f/1/media-corporation/detail.css');
$APPLICATION->SetTitle($arResult['ELEMENT']['ITEM']['NAME']);
?>

<div class="block second">
    <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array("START_FROM" => "1"), false); ?>
    <h1><?= $arResult['ELEMENT']['ITEM']['NAME'] ?></h1>

    <p>
        <?= $arResult['CITY'][$arResult['ELEMENT']['PROP']['CITY']['VALUE']]['NAME'] ?> <?= FormatDateFromDB($arResult['ELEMENT']['ITEM']['ACTIVE_FROM'], 'DD MMMM YYYY'); ?>
        <br>
        <a href="<?= $arResult['ELEMENT']['PROP']['LINK_PUBLICATION']['VALUE'] ?>"><?= $arResult['ELEMENT']['PROP']['NAME_PUBLICATION']['VALUE'] ?></a>
    </p>
    <? if (!empty($arResult['ELEMENT']['ITEM']['DETAIL_PICTURE'])): ?>
        <p>
            <img src="<?= CFile::GetPath($arResult['ELEMENT']['ITEM']['DETAIL_PICTURE']) ?>" style="max-width: 100%;">
        </p>
    <? endif; ?>
    <div>
        <?= $arResult['ELEMENT']['ITEM']['~DETAIL_TEXT'] ?>
        <?= $arResult['ELEMENT']['PROP']['HELP_TEXT']['~VALUE']['TEXT'] ?>
        <?= $arResult['ELEMENT']['PROP']['INCUT_TEXT']['~VALUE']['TEXT'] ?>
    </div>
    <div class="social_button_group">
        <div class="social_button">
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.0";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
            <div class="fb-like" data-href="http://<?=$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
        </div>
        <div class="social_button">
            <!-- Put this script tag to the <head> of your page -->
            <script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>

            <!-- Put this script tag to the place, where the Share button will be -->
            <script type="text/javascript"><!--
                document.write(VK.Share.button(false,{type: "round", text: "Сохранить"}));
                --></script>
        </div>
        <div class="social_button social_button_twitter">
            <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
        <div class="social_button social_button_google">
                <span class="social_like social_like_google">
                <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px; background: transparent;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1412078240945" name="I0_1412078240945" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;hl=ru&amp;origin=http%3A%2F%2Fcollectionerus.ru&amp;url=http%3A%2F%2Fcollectionerus.ru%2Fi%2FGGnE%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.ru.ov_XRm1V1qA.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAItRSTNUWeCWuwtxFCvZcTL9sjbqqghW7g#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1412078240945&amp;parent=http%3A%2F%2Fcollectionerus.ru&amp;pfname=&amp;rpctoken=37308660" data-gapiattached="true" title="+1"></iframe></div>
                <script type="text/javascript">
                    window.___gcfg = {lang: 'ru'};
                    (function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();
                </script>
                </span>
        </div>
        <div class="social_button social_button_lj">
                <span class="social_like social_like_lj">
                    <a class="no_underline" title="Рассказать в ЖЖ" href="javascript:void((function()%7Bvar%20u='http://www.livejournal.com/',w=window.open('','','toolbar=0,resizable=1,scrollbars=1,status=1,width=730,height=500');if(window.LJ_bookmarklet)%7Breturn%20LJ_bookmarklet(w,u)%7D;var%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.onload=function()%7BLJ_bookmarklet(w,u)%7D;e.setAttribute('src',u+'js/bookmarklet.js');document.getElementsByTagName('head').item(0).appendChild(e)%7D)())%0A%09%09%09%09%09%09"><img src="/images/zhzh.png"></a>
                </span>
        </div>
    </div>
</div>

<? foreach ($arResult['COMMENTS'] as $value): ?>
<div class="block clear">
    <div class="appeal">
        <div class="image"><img src="<?= CFile::GetPath($arResult['EMPLOYEES'][$value['PROPERTY_RELATED_EMPLOYEE_VALUE']]['DETAIL_PICTURE']) ?>"></div>
        <div class="name"><?= $arResult['EMPLOYEES'][$value['PROPERTY_RELATED_EMPLOYEE_VALUE']]['NAME'] ?></div>
        <div class="dolgnost"><?= $arResult['EMPLOYEES'][$value['PROPERTY_RELATED_EMPLOYEE_VALUE']]['PROPERTY_POSITION_VALUE'] ?></div>
        <div class="text"><span class="quote begin">«</span>
            <p><?= $value['DETAIL_TEXT'] ?><span class="quote end">»</span></p>
        </div>
    </div>
</div>
<? endforeach; ?>