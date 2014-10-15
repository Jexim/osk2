<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<input type="hidden" name="count" value="<?= $arResult['COUNT'] ?>" />
<? foreach ($arResult['ITEM'] as $value): ?>
    <div class="item"><a class="image video fancybox_youtube <? if ($value['PROPERTY_BIG_IMG_VALUE']): ?>width50<? endif; ?>" rel="gallery<?= $value['IBLOCK_SECTION_ID'] ?>"  href="#video_<?= $value['ID'] ?>"><div class="caption"><?= $value['NAME'] ?></div> <img src="<?= CFile::GetPath($value['PREVIEW_PICTURE']) ?>" /></a></div>
    <div style="display: none;">
        <div id="video_<?= $value['ID'] ?>">
            <? if (!empty($value['PROPERTY_VIDEO_VALUE'])): ?>
                <?
                $APPLICATION->IncludeComponent("bitrix:player", "", Array(
                    "PLAYER_TYPE" => "auto",
                    "USE_PLAYLIST" => "N",
                    "PATH" => $value['PROPERTY_VIDEO_VALUE']['path'],
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
                );
                ?>         
                <? if(!empty($value['PROPERTY_VIDEO_VALUE']['path'])):?><p><a href="<?=$value['PROPERTY_VIDEO_VALUE']['path']?>">Скачать</a></p><? endif; ?>
            <? else: ?>
                <?= $value['~PROPERTY_VIDEO_STRING_VALUE']['TEXT'] ?>
                <? if(!empty($value['PROPERTY_DOWNLOAD_URL_VALUE'])): ?><p><a href="<?=$value['PROPERTY_DOWNLOAD_URL_VALUE']?>">Скачать</a></p><? endif; ?>
            <? endif; ?>
        </div>
    </div>
<? endforeach; ?>