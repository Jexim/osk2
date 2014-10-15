<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if(!empty($arResult['ELEMENTS'])): ?>
    <input type="hidden" name="count" value="<?= $arResult['COUNT']?>" />
    <? foreach ($arResult['ELEMENTS'] as $value): ?>
        <? if($value['ITEM']['IBLOCK_CODE']=='photo'): ?>
            <? if(!empty($value['ITEM']['PREVIEW_PICTURE'])): ?>
                <? $pach = CFile::ResizeImageGet($value['ITEM']['PREVIEW_PICTURE'], array('width'=>620, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
            <? else: ?>
                <? $pach = CFile::ResizeImageGet($value['ITEM']['DETAIL_PICTURE'], array('width'=>620, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
            <? endif; ?>
            <div class="item <? if ($value['PROP']['BIG_IMG']['VALUE']): ?>width50<? endif; ?>"><a class="image fancybox" rel="gallery" href="<? if(!empty($value['ITEM']['DETAIL_PICTURE'])): ?><?= CFile::GetPath($value['ITEM']['DETAIL_PICTURE']) ?><? else: ?><?= CFile::GetPath($value['ITEM']['PREVIEW_PICTURE']) ?><? endif; ?>" title="<?= $value['ITEM']['DETAIL_TEXT'] ?>"><img src="<?=$pach['src']?>"></a></div>
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
                        <? if(!empty($value['PROP']['VIDEO']['VALUE']['path'])): ?><p><a href="<?=$value['PROP']['VIDEO']['VALUE']['path']?>">Скачать</a></p><? endif; ?>
                    <? else: ?>
                        <?=$value['PROP']['VIDEO_STRING']['~VALUE']['TEXT']?>
                        <? if(!empty($value['PROP']['DOWNLOAD_URL']['VALUE'])): ?><p><a href="<?=$value['PROP']['DOWNLOAD_URL']['VALUE']?>">Скачать</a></p><? endif; ?>
                    <? endif; ?>
                </div>
            </div>
        <? endif; ?>
    <? endforeach; ?>
<? endif; ?>