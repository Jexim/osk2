<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/first-person/index.js');
$APPLICATION->SetAdditionalCSS('/f/1/first-person/index.css');
?>

<div class="block second">
    <? if(!empty($_REQUEST['ELEMENT_CODE'])): ?>
        <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array("START_FROM" => "1"), false); ?>
        <h1><?= $arResult['ELEMENT']['ITEM']['NAME'] ?></h1>
    <? endif; ?>
    <div class="appeal appeal_small_left">
        <? if (!empty($arResult['EMPLOYEE']['DETAIL_PICTURE'])): ?>
                <? $pach = CFile::ResizeImageGet($arResult['EMPLOYEE']['DETAIL_PICTURE'], array('width' => 115, 'height' => 300), BX_RESIZE_IMAGE_PROPORTIONAL, false); ?>
                <div class="image"><img src="<?= $pach['src'] ?>"></div>
            <? endif; ?>
        <div class="name"><?= $arResult['EMPLOYEE']['NAME'] ?></div>
        <div class="dolgnost"><?= $arResult['EMPLOYEE']['PROPERTY_POSITION_VALUE'] ?></div>
        <div class="text">
            <span class="quote begin">«</span><?= $arResult['ELEMENT']['ITEM']['~DETAIL_TEXT'] ?><span class="quote end">»</span></p>
        </div>
    </div>
</div>
<? if(!empty($arResult['HANDLING'])): ?>
    <div class="block clear">
        <h3 class="before_list"><?=GetMessage("previous_treatment")?></h3>
        <ul class="list">
            <? foreach ($arResult['HANDLING'] as $value): ?>
                <li><a href="<?= $value['DETAIL_PAGE_URL'] ?>"><?= $value['NAME'] ?></a></li>
            <? endforeach; ?>
        </ul>
    </div>
<? endif; ?>
<? if(!empty($arResult['RELATED_MATERIALS']['media_corporation'])): ?>
    <div class="block clear">
        <h3 class="before_list"><?=GetMessage("Media_corporation")?></h3>
    </div>
    <div class="block wide">
        <table class="about_in_smi">
            <tbody>
                <tr>
                    <? $i=1 ?>
                    <? foreach ($arResult['RELATED_MATERIALS']['media_corporation'] as $value): ?>
                        <? if($i%4==0): ?></tr><tr><? endif; ?>
                        <td>
                            <div class="name h4"><a href="<?=$value['ITEM']['DETAIL_PAGE_URL']?>"><?=$value['ITEM']['NAME']?></a></div>
                            <div class="text"><p><?=$value['ITEM']['NAME']?></p></div>
                            <div class="date"><?= FormatDateFromDB($value['ITEM']['DATE_ACTIVE_FROM'], 'DD MMMM YYYY'); ?></div>
                            <div class="source"><a href="<?= $value['PROP']['LINK_PUBLICATION']['VALUE'] ?>"><?= $value['PROP']['NAME_PUBLICATION']['VALUE'] ?></a></div>
                        </td>
                        <? $i++ ?>
                    <? endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>
<? endif; ?>
<? if(!empty($arResult['RELATED_MATERIALS']['press_releases'])): ?>
    <div class="block clear">
        <h3 class="before_list"><?=GetMessage("Press_releases")?></h3>
    </div>
    <div class="block clear">
        <div class="list news">
            <? foreach ($arResult['RELATED_MATERIALS']['press_releases'] as $value): ?>
                <div class="item">
                    <? if(!empty($value['ITEM']['DETAIL_PICTURE'])): ?>
                        <? $pach = CFile::ResizeImageGet($value['ITEM']['DETAIL_PICTURE'], array('width'=>300, 'height'=>160), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);?>
                        <a href="<?=$value['ITEM']['DETAIL_PAGE_URL']?>"><div class="image"><img src="<?=$pach['src']?>"></div></a>
                    <? endif; ?>
                    <div class="text">
                        <div class="name h3"><a href="<?= $value['ITEM']['DETAIL_PAGE_URL'] ?>"><?= $value['ITEM']['NAME'] ?></a></div>
                        <div class="preview"><?= $value['ITEM']['PREVIEW_TEXT'] ?></div>
                        <div class="date"><?= FormatDateFromDB($value['ITEM']['DATE_ACTIVE_FROM'], 'DD MMMM YYYY'); ?></div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
<? endif; ?>
<? if(!empty($arResult['RELATED_MATERIALS']['photo_video'])): ?>
    <div class="block wide">
        <div class="gallery_mansory isotope" style="opacity: 1;">
            <? foreach ($arResult['RELATED_MATERIALS']['photo_video'] as $value): ?>
                <? if($value['ITEM']['IBLOCK_CODE']=='photo'): ?>
                    <div class="item <? if ($value['PROP']['BIG_IMG']['VALUE']): ?>width50<? endif; ?>"><a class="image fancybox" rel="gallery" <? if(!empty($value['ITEM']['DETAIL_PICTURE'])): ?>href="<?= CFile::GetPath($value['ITEM']['DETAIL_PICTURE']) ?>"<? endif; ?> title="<?= $value['ITEM']['DETAIL_TEXT'] ?>"><img src="<?= CFile::GetPath($value['ITEM']['PREVIEW_PICTURE']) ?>"></a></div>
                <? else: ?>
                    <div class="item"><a class="image video  fancybox_youtube <? if ($value['PROP']['BIG_IMG']['VALUE']): ?>width50<? endif; ?>" rel="gallery"  href="#video_<?= $value['ITEM']['ID'] ?>"><div class="caption"><?= $value['ITEM']['NAME'] ?></div> <img src="<?= CFile::GetPath($value['ITEM']['PREVIEW_PICTURE']) ?>" /></a></div>
                    <div style="display: none;">
                        <div id="video_<?= $value['ITEM']['ID'] ?>">
                            <? if(!empty($value['PROP']['VIDEO']['VALUE'])): ?>
                                <?$APPLICATION->IncludeComponent("bitrix:player","",Array(
                                    "PLAYER_TYPE" => "auto",   
                                    "USE_PLAYLIST" => "N",   
                                    "PATH" => $value['PROP']['VIDEO']['VALUE']['path'],   
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
                                <? if(!empty($value['PROP']['VIDEO']['VALUE']['path'])): ?><p><a href="<?=$value['PROP']['VIDEO']['VALUE']['path']?>"><?=GetMessage("download")?></a></p><? endif; ?>
                            <? else: ?>
                                <?=$value['PROP']['VIDEO_STRING']['~VALUE']['TEXT']?>
                                <? if(!empty($value['PROP']['DOWNLOAD_URL']['VALUE'])): ?><p><a href="<?=$value['PROP']['DOWNLOAD_URL']['VALUE']?>"><?=GetMessage("download")?></a></p><? endif; ?>
                            <? endif; ?>
                        </div>
                    </div>
                <? endif; ?>
            <? endforeach; ?>
        </div>
    </div>
<? endif; ?>