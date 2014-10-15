<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->SetAdditionalCSS('/f/1/enterprises/detail.css');
?>

<div class="block second">
    <div class="header_link">
        <a href="/enterprises/"><?=GetMessage("enterprises")?></a>
    </div>
    <h1><?= $arResult['ELEMENT']['PROPERTY_FULL_NAME_VALUE'] ?></h1>
</div>

<div class="block second">

    <?
    $rightClass = "right_column";
    if(
        empty($arResult['ELEMENT']['PROPERTY_LEADER_NAME_VALUE']) &&
        empty($arResult['ELEMENT']['PROPERTY_CHARACTERISTICS_VALUE']) &&
        empty($arResult['ELEMENT']['DETAIL_TEXT'])
    ) $rightClass="w60";?>

        <div class="<?=$rightClass;?>">
            <? if (!empty($arResult['ELEMENT']['DETAIL_PICTURE'])): ?>
                <div class="enterprise_logo"><img src="<?= CFile::GetPath($arResult['ELEMENT']['DETAIL_PICTURE']) ?>"></div>
            <? endif; ?>
            <div class="enterprise_contacts">
                <h6><?=GetMessage("contact_information")?></h6>
                <? if (!empty($arResult['ELEMENT']['PROPERTY_ADDRESS_VALUE'])): ?>
                    <div class="enterprise_contacts__address">
                        <p><?= $arResult['ELEMENT']['~PROPERTY_ADDRESS_VALUE']['TEXT'] ?></p>
                    </div>
                <? endif; ?>
                <? if (!empty($arResult['ELEMENT']['PROPERTY_PHONE_VALUE'])): ?>
                    <div class="enterprise_contacts__phone">
                        <p><?= $arResult['ELEMENT']['PROPERTY_PHONE_VALUE'] ?></p>
                    </div>
                <? endif; ?>
                <? if (!empty($arResult['ELEMENT']['PROPERTY_FAX_VALUE'])): ?>
                    <div class="enterprise_contacts__phone">
                        <p><?=GetMessage("fax")?>: <?= $arResult['ELEMENT']['PROPERTY_FAX_VALUE'] ?></p>
                    </div>
                <? endif; ?>
                <? if (!empty($arResult['ELEMENT']['PROPERTY_EMAIL_VALUE'])): ?>
                    <div class="enterprise_contacts__email">
                        <a href="mailto:<?= $arResult['ELEMENT']['PROPERTY_EMAIL_VALUE'] ?>"><?= $arResult['ELEMENT']['PROPERTY_EMAIL_VALUE'] ?></a>
                    </div>
                <? endif; ?>
                <? if (!empty($arResult['ELEMENT']['PROPERTY_URL_VALUE'])): ?>
                    <div class="enterprise_contacts__site">
                        <a href="http://<?= $arResult['ELEMENT']['PROPERTY_URL_VALUE'] ?>"><?= $arResult['ELEMENT']['PROPERTY_URL_VALUE'] ?></a>
                    </div>
                <? endif; ?>
            </div>
        </div>
    <div class="w60">
        <? if (!empty($arResult['ELEMENT']['PROPERTY_LEADER_NAME_VALUE'])): ?>
            <div class="management managment_circle_photo management_enterprise">
                <div class="item">
                    <? if (!empty($arResult['ELEMENT']['PREVIEW_PICTURE'])): ?>
                        <div class="image"><img src="<?= CFile::GetPath($arResult['ELEMENT']['PREVIEW_PICTURE']) ?>"></div>
                    <? endif; ?>    
                    <div class="text">
                        <div class="dolgnost"><?=GetMessage("head")?></div>
                        <? if (!empty($arResult['ELEMENT']['PROPERTY_LEADER_NAME_VALUE'])): ?>
                            <div class="name"><?= $arResult['ELEMENT']['PROPERTY_LEADER_NAME_VALUE'] ?></div>
                        <? endif; ?>
                        <? if (!empty($arResult['ELEMENT']['PROPERTY_POSITION_VALUE'])): ?>
                            <div class="lid"><?=$arResult['ELEMENT']['PROPERTY_POSITION_VALUE']?></div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        <? endif; ?>
        <? if(!empty($arResult['ELEMENT']['PROPERTY_CHARACTERISTICS_VALUE'])): ?>
            <div class="enterprise_specialization">
                <h6><?=GetMessage("specialty")?></h6>
                <p><?=$arResult['ELEMENT']['PROPERTY_CHARACTERISTICS_VALUE']?>.</p>
            </div>
        <? endif; ?>
        <? if(!empty($arResult['ELEMENT']['DETAIL_TEXT'])): ?>
            <div class="enterprise_description">
                <h6><?=GetMessage("about_company")?></h6>
                <div>
                    <!-- Описание предприятия -->
                    <?= $arResult['ELEMENT']['~DETAIL_TEXT'] ?>
                    <!--/-->
                </div>
            </div>
        <? endif; ?>
    </div>
</div>
<?$APPLICATION->IncludeComponent("osk:rs.products_list", "widget", array("ENTERPRISES" => $arResult['ELEMENT']['ID'], "DOP_PROJECT" => "Y", "TEXT_H3"=>GetMessage("projects_company")), false);?>