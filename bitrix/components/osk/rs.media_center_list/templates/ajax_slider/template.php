<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult['ELEMENTS'][$_REQUEST['ID']]['PROP']['VIDEO']['VALUE'])): ?>
    <?$APPLICATION->IncludeComponent("bitrix:player", "", Array(
            "PLAYER_TYPE" => "auto",
            "USE_PLAYLIST" => "N",
            "PATH" => $arResult['ELEMENTS'][$_REQUEST['ID']]['PROP']['VIDEO']['VALUE']['path'],
            "WIDTH" => $_REQUEST['WIDTH'],
            "HEIGHT" => $_REQUEST['HEIGHT'],
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
            "AUTOSTART" => "Y",
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
<? else: ?>
    <?= $arResult['ELEMENTS'][$_REQUEST['ID']]['PROP']['VIDEO_STRING']['~VALUE']['TEXT'] ?>
<? endif; ?>