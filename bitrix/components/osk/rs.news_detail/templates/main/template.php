<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/news/detail.js');
$APPLICATION->SetAdditionalCSS('/f/1/news/detail.css');
$APPLICATION->SetTitle($arResult['ELEMENT']['ITEM']['NAME']);
?>

    <div class="block second">
        <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array("START_FROM" => "1"), false); ?>
        <h1><?= $arResult['ELEMENT']['ITEM']['NAME'] ?></h1>

        <p class="date">
            <? if(!empty($arResult['CITY'][$arResult['ELEMENT']['PROP']['CITY']['VALUE']]['NAME'])): ?>
            <?= $arResult['CITY'][$arResult['ELEMENT']['PROP']['CITY']['VALUE']]['NAME'] ?>, <? endif; ?><?= strtolower(FormatDateFromDB($arResult['ELEMENT']['ITEM']['ACTIVE_FROM'], 'DD MMMM')); ?>
        </p>
        <? if (!empty($arResult['ELEMENT']['ITEM']['DETAIL_PICTURE'])): ?>
            <p>
                <img src="<?= CFile::GetPath($arResult['ELEMENT']['ITEM']['DETAIL_PICTURE']) ?>"
                     style="max-width: 100%;">
            </p>
        <? endif; ?>
        <? if (!empty($arResult['ELEMENT']['ITEM']['PREVIEW_TEXT'])): ?>
            <p class="lead"><?= $arResult['ELEMENT']['ITEM']['PREVIEW_TEXT'] ?></p>
        <? endif; ?>
        <p><?= $arResult['ELEMENT']['ITEM']['~DETAIL_TEXT'] ?></p>
        <? if (!empty($arResult['ELEMENT']['PROP']['ENTERPRISE']['VALUE'])): ?>
            <p>
                <? foreach ($arResult['ENTERPRISE'] as $value): ?>
                    <? if (!empty($value['DETAIL_PICTURE'])): ?>
                        <a href="<?= $value['DETAIL_PAGE_URL'] ?>" class="no-border">
                            <img src="<?= CFile::GetPath($value['DETAIL_PICTURE']) ?>">
                        </a>
                    <? else: ?>
                        <a href="<?= $value['DETAIL_PAGE_URL'] ?>"><?= $value['NAME'] ?></a>
                    <? endif; ?>
                <? endforeach; ?>
            </p>
        <? endif; ?>
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

<? if (!empty($arResult['ELEMENT']['PROP']['ADDITIONALLY_PHOTOS']['VALUE'])): ?>
    <div class="block wide">
        <div class="gallery_mansory isotope" style="opacity: 1;">
            <? foreach ($arResult['ELEMENT']['PROP']['ADDITIONALLY_PHOTOS']['VALUE'] as $value): ?>
                <div class="item"><a class="image fancybox" rel="gallery"
                                     href="<?= CFile::GetPath($arResult['PHOTO'][$value]['DETAIL_PICTURE']) ?>"
                                     title="<?= $arResult['PHOTO'][$value]['DETAIL_TEXT'] ?>"><img
                            src="<?= CFile::GetPath($arResult['PHOTO'][$value]['PREVIEW_PICTURE']) ?>"></a></div>
            <? endforeach; ?>
            <? foreach ($arResult['ELEMENT']['PROP']['VIDEO']['VALUE'] as $value): ?>
                <div class="item"><a
                        class="image fancybox_youtube video <? if ($value['PROPERTY_BIG_IMG_VALUE']): ?>width50<? endif; ?>"
                        rel="gallery2" href="#video_<?= $arResult['VIDEO'][$value]['ID'] ?>">
                        <div class="caption"><?= $arResult['VIDEO'][$value]['NAME'] ?></div>
                        <img src="<?= CFile::GetPath($arResult['VIDEO'][$value]['PREVIEW_PICTURE']) ?>"/></a></div>
                <div style="display: none;">
                    <div id="video_<?= $arResult['VIDEO'][$value]['ID'] ?>">
                        <? if (!empty($arResult['VIDEO'][$value]['PROPERTY_VIDEO_VALUE'])): ?>
                            <?$APPLICATION->IncludeComponent("bitrix:player", "", Array(
                                    "PLAYER_TYPE" => "auto",
                                    "USE_PLAYLIST" => "N",
                                    "PATH" => $arResult['VIDEO'][$value]['PROPERTY_VIDEO_VALUE']['path'],
                                    "WIDTH" => "400",
                                    "HEIGHT" => "300",
                                    "FULLSCREEN" => "Y",
                                    "SKIN_PATH" => "/bitrix/components/bitrix/player/mediaplayer/skins",
                                    "SKIN" => "bitrix.swf",
                                    "CONTROLBAR" => "bottom",
                                    "WMODE" => "transparent",
                                    "HIDE_MENU" => "N",
                                    "SHOW_CONTROLS" => "Y",
                                    "SHOW_STOP" => "N",
                                    "SHOW_DIGITS" => "Y",
                                    "CONTROLS_BGCOLOR" => "FFFFFF",
                                    "CONTROLS_COLOR" => "000000",
                                    "CONTROLS_OVER_COLOR" => "000000",
                                    "SCREEN_COLOR" => "000000",
                                    "AUTOSTART" => "N",
                                    "REPEAT" => "N",
                                    "VOLUME" => "90",
                                    "DISPLAY_CLICK" => "play",
                                    "MUTE" => "N",
                                    "HIGH_QUALITY" => "Y",
                                    "ADVANCED_MODE_SETTINGS" => "N",
                                    "BUFFER_LENGTH" => "10",
                                    "DOWNLOAD_LINK_TARGET" => "_self"
                                )
                            );?>
                            <p>
                                <a href="<?= $arResult['VIDEO'][$value]['PROPERTY_VIDEO_VALUE']['path'] ?>">Скачать</a>
                            </p>
                        <? else: ?>
                            <?= $arResult['VIDEO'][$value]['~PROPERTY_VIDEO_STRING_VALUE']['TEXT'] ?>
                            <? if (!empty($arResult['VIDEO'][$value]['PROPERTY_DOWNLOAD_URL_VALUE'])): ?><p><a
                                    href="<?= $arResult['VIDEO'][$value]['PROPERTY_DOWNLOAD_URL_VALUE'] ?>">Скачать</a>
                                </p><? endif; ?>
                        <? endif; ?>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
<? endif; ?>


<? if (!empty($arResult['NEWS'])): ?>
    <div class="block clear">
        <h3 class="before_list">Другие новости</h3>
    </div>
    <div class="block wide">
        <div class="similar_wrap">
            <table class="similar">
                <tbody>
                <tr>
                    <? foreach ($arResult['NEWS'] as $value): ?>
                        <td>
                            <? if (!empty($value['DETAIL_PICTURE'])): ?>
                                <div class="image">
                                    <a href="#"><img src="<?= CFile::GetPath($value['DETAIL_PICTURE']) ?>"></a>
                                </div>
                            <? endif; ?>
                            <div class="text">
                                <div class="name h4"><a
                                        href="<?= $value['DETAIL_PAGE_URL'] ?>"><?= $value['NAME'] ?></a></div>
                                <div class="date"><?= $value['DATE'] ?></div>
                            </div>
                        </td>
                    <? endforeach; ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<? endif; ?>
<? if (!empty($arResult['PRESS_RELEASES'])): ?>
    <div class="block clear">
        <h3 class="before_list">Пресс-релизы</h3>
    </div>
    <div class="block wide">
        <div class="similar_wrap">
            <table class="similar">
                <tbody>
                <tr>
                    <? foreach ($arResult['PRESS_RELEASES'] as $value): ?>
                        <td>
                            <? if (!empty($value['DETAIL_PICTURE'])): ?>
                                <div class="image">
                                    <a href="#"><img src="<?= CFile::GetPath($value['DETAIL_PICTURE']) ?>"></a>
                                </div>
                            <? endif; ?>
                            <div class="text">
                                <div class="name h4"><a
                                        href="<?= $value['DETAIL_PAGE_URL'] ?>"><?= $value['NAME'] ?></a></div>
                                <div class="date"><?= $value['DATE'] ?></div>
                            </div>
                        </td>
                    <? endforeach; ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<? endif; ?>
<? if (!empty($arResult['ELEMENT']['PROP']['RELATED_PRODUCTS']['VALUE'])): ?>
    <? $APPLICATION->IncludeComponent("osk:rs.products_list", "widget", array("PRODUCT_ID" => $arResult['ELEMENT']['PROP']['RELATED_PRODUCTS']['VALUE'], "DOP_PROJECT" => "Y", "TEXT_H3" => "Связанные проекты"), false); ?>
<? endif; ?>