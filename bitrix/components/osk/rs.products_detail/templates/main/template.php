<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/products/detail.js');
$APPLICATION->SetAdditionalCSS('/f/1/products/detail.css');
$APPLICATION->SetTitle($arResult['ELEMENT']['ITEM']['NAME'] . '. ' . $arResult['ELEMENT']['PROP']['SHORT_TEXT']['VALUE']);
?>




<?
/*
** Определяем какую старницу показывать (упрощенная или обычная, по умолчанию - обычная):
*/

if(
    !empty($arResult['ELEMENT']['PROP']['SIMPLE_VIEW']['VALUE']) ||
    empty($arResult['ELEMENT']['PROP']['TOP_IMAGES']['VALUE']) 
)
    $productClass='product_item__simple';
?>

<div class="one_item_wrapper product_item <?=$productClass;?>">

<?
/*
** Определяем выравнивание заголовков (по левому краю или по центру, по умолчанию - по центру):
*/

if(
    empty($arResult['ELEMENT']['PROP']['NAME_UPPER_PICTURE']['VALUE']) ||
    !empty($arResult['ELEMENT']['PROP']['SIMPLE_VIEW']['VALUE']) ||
    empty($arResult['ELEMENT']['PROP']['TOP_IMAGES']['VALUE'])
)
    $headerClass = 'incut_product_top__left';
?>

    <div class="incut incut_product_top <?=$headerClass;?>">
        <div class="<? if($arResult['ELEMENT']['PROP']['NAME_UPPER_PICTURE']['VALUE']): ?>item_one_title<? else: ?>item_one_title_min<? endif; ?>">
            <? if($arResult['SECTION'][$arResult['ELEMENT']['ITEM']['IBLOCK_SECTION_ID']]['IBLOCK_SECTION_ID'] == 6 || $arResult['SECTION'][$arResult['ELEMENT']['ITEM']['IBLOCK_SECTION_ID']]['IBLOCK_SECTION_ID'] == 51): ?>
                <a href="<?= GetMessage("catalogLink") ?>civil/"><?= $arResult['SECTION'][$arResult['SECTION'][$arResult['ELEMENT']['ITEM']['IBLOCK_SECTION_ID']]['IBLOCK_SECTION_ID']]['NAME'] ?></a>
                <span>/</span>
            <a href="<?= GetMessage("catalogLink") ?>civil/?section=<?=$arResult['ELEMENT']['ITEM']['IBLOCK_SECTION_ID']?>"><?=$arResult['SECTION'][$arResult['ELEMENT']['ITEM']['IBLOCK_SECTION_ID']]['NAME']?></a>
            <? else: ?>
                <a href="<?= GetMessage("catalogLink") ?>"><?= $arResult['SECTION'][$arResult['SECTION'][$arResult['ELEMENT']['ITEM']['IBLOCK_SECTION_ID']]['IBLOCK_SECTION_ID']]['NAME'] ?></a>
                <span>/</span>
            <a href="<?= GetMessage("catalogLink") ?>?section=<?=$arResult['ELEMENT']['ITEM']['IBLOCK_SECTION_ID']?>"><?=$arResult['SECTION'][$arResult['ELEMENT']['ITEM']['IBLOCK_SECTION_ID']]['NAME']?></a>
            <? endif; ?>

            <h1><?= $arResult['ELEMENT']['ITEM']['NAME'] ?></h1>
            <? if(!empty($arResult['ELEMENT']['PROP']['SHORT_TEXT']['VALUE'])): ?>
                <p><?= $arResult['ELEMENT']['PROP']['SHORT_TEXT']['VALUE'] ?></p>
            <? endif; ?>
            <? if($arResult['NEWS'] || $arResult['PRESS_RELEASES'] || $arResult['PURCHASES_USC']): ?>
                <div class="item_one_submenu type_menu" product_id="<?= $arResult['ELEMENT']['ITEM']['ID'] ?>">
                    <a type="all" class="selected"><?= GetMessage("description") ?></a>
                    <? if($arResult['NEWS']): ?><a type="news"><?= GetMessage("news") ?></a><? endif; ?>
                    <? if($arResult['PRESS_RELEASES']): ?><a type="press-releases"><?= GetMessage("press_releases") ?></a><? endif; ?>
                    <? if($arResult['PURCHASES_USC']): ?><a type="purchases"><?= GetMessage("purchases") ?></a><? endif; ?>
                </div>
            <? endif; ?>
        </div>


        <?if(!empty($arResult['ELEMENT']['PROP']['TOP_IMAGES']['VALUE']) && empty($arResult['ELEMENT']['PROP']['SIMPLE_VIEW']['VALUE'])):?>
            <div class="product_wraper_main">
                <? if(!empty($arResult['ELEMENT']['PROP']['TOP_IMAGES']['VALUE'])): ?>
                    <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['TOP_IMAGES']['VALUE'], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                    <img src="<?= $pach['src'] ?>" />
                <? endif; ?>
            </div>
        <?endif;?>

    </div>

    <div class="product_wraper_main">  

        <?if(!empty($arResult['ELEMENT']['PROP']['SIMPLE_VIEW']['VALUE']) || empty($arResult['ELEMENT']['PROP']['TOP_IMAGES']['VALUE'])):?>

        <?
        /*
        ** Упрощенная старница:
        */
        ?>

            <div class="simple_upper_block">

                    <?if(
                        !empty($arResult['ELEMENT']['PROP']['SCHEME']['VALUE']) ||
                        !empty($arResult['ELEMENT']['PROP']['DEVELOPER']['VALUE']) ||
                        !empty($arResult['ELEMENT']['PROP']['BUILDER']['VALUE'])
                    ):?>
                        <div class="lp_block">
                            <? if(!empty($arResult['ELEMENT']['PROP']['SCHEME']['VALUE'])): ?>
                                <div class="lp_block__image">
                                    <img src="<?= CFile::GetPath($arResult['ELEMENT']['PROP']['SCHEME']['VALUE']) ?>" />
                                </div>
                            <? endif; ?>
                            <? if(!empty($arResult['ELEMENT']['PROP']['DEVELOPER']['VALUE'])): ?>
                                <div class="item_one_developer_in">
                                    <span><?= GetMessage("developer") ?></span>
                                    <div style="margin-top: 2px; clear: both;"></div>
                                    <? foreach ($arResult['ELEMENT']['PROP']['DEVELOPER']['VALUE'] as $value): ?>
                                        <a href="<?= $arResult['COMPANIES'][$value]['DETAIL_PAGE_URL'] ?>"><?= $arResult['COMPANIES'][$value]['NAME'] ?></a>
                                    <? endforeach; ?>
                                </div>
                            <? endif; ?>
                            <? if(!empty($arResult['ELEMENT']['PROP']['BUILDER']['VALUE'])): ?>
                                <div class="item_one_developer_in">
                                    <span><?= GetMessage("builder") ?></span>
                                    <div style="margin-top: 2px; clear: both;"></div>
                                    <? foreach ($arResult['ELEMENT']['PROP']['BUILDER']['VALUE'] as $value): ?>
                                        <a href="<?= $arResult['COMPANIES'][$value]['DETAIL_PAGE_URL'] ?>"><?= $arResult['COMPANIES'][$value]['NAME'] ?></a>
                                    <? endforeach; ?>
                                </div>
                            <? endif; ?>
                        </div>
                    <?endif;?>

                <? if(!empty($arResult['ELEMENT']['PROP']['APPOINTMENT']['VALUE'])): ?>
                    <div class="rp_block">
                        <h3><?= GetMessage("appointment") ?></h3>
                        <div class="product_appointment_simple">
                            <?= $arResult['ELEMENT']['PROP']['APPOINTMENT']['~VALUE']['TEXT'] ?>
                        </div>
                    </div>
                <? endif; ?>

            </div>

            <? if(!empty($arResult['ELEMENT']['ITEM']['DETAIL_TEXT'])): ?>
                <div class="block clear block_product_description">
                    <h3><?= GetMessage("description") ?></h3>
                    <?= $arResult['ELEMENT']['ITEM']['DETAIL_TEXT'] ?>
                </div>
            <? endif; ?>

        <?else:?>

        <?
        /*
        ** Обычная страница:
        */
        ?>

            <? if(!empty($arResult['ELEMENT']['PROP']['APPOINTMENT']['VALUE'])): ?>
                <div class="block clear block_product_description product_appointment_lead">
                    <?= $arResult['ELEMENT']['PROP']['APPOINTMENT']['~VALUE']['TEXT'] ?>
                </div>        
            <?endif;?>

            <div class="block clear block_product_description">
                <? if(!empty($arResult['ELEMENT']['ITEM']['DETAIL_TEXT'])): ?>
                    <?= $arResult['ELEMENT']['ITEM']['DETAIL_TEXT'] ?>
                <? endif; ?>

                <? if(!empty($arResult['ELEMENT']['PROP']['DEVELOPER']['VALUE']) || !empty($arResult['ELEMENT']['PROP']['BUILDER']['VALUE'])): ?>
                    <div class="item_one_developer">
                        <? if(!empty($arResult['ELEMENT']['PROP']['DEVELOPER']['VALUE'])): ?>
                            <div class="item_one_developer_in">
                                <span><?= GetMessage("developer") ?></span><br/>
                                <? foreach ($arResult['ELEMENT']['PROP']['DEVELOPER']['VALUE'] as $value): ?>
                                    <a href="<?= $arResult['COMPANIES'][$value]['DETAIL_PAGE_URL'] ?>"><?= $arResult['COMPANIES'][$value]['NAME'] ?></a>
                                <? endforeach; ?>
                            </div>
                        <? endif; ?>
                        <? if(!empty($arResult['ELEMENT']['PROP']['BUILDER']['VALUE'])): ?>
                            <div class="item_one_developer_in">
                                <span><?= GetMessage("builder") ?></span><br/>
                                <? foreach ($arResult['ELEMENT']['PROP']['BUILDER']['VALUE'] as $value): ?>
                                    <a href="<?= $arResult['COMPANIES'][$value]['DETAIL_PAGE_URL'] ?>"><?= $arResult['COMPANIES'][$value]['NAME'] ?></a>
                                <? endforeach; ?>
                            </div>
                        <? endif; ?>
                    </div>
                <? endif; ?>
            </div>

        <?endif;?>

        <? if(!empty($arResult['ELEMENT']['PROP']['MIDDLE_IMAGES']['VALUE'])): ?>
            <? if(count($arResult['ELEMENT']['PROP']['MIDDLE_IMAGES']['VALUE'])==2): ?>
                <div class="incut_tween incut_product_middle">
                    <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['MIDDLE_IMAGES']['VALUE'][0], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                    <img src="<?= $pach['src'] ?>" />
                    <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['MIDDLE_IMAGES']['VALUE'][1], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                    <img src="<?= $pach['src'] ?>" />
                    <div class="clear_both"></div>
                </div>
            <? else: ?>
                <? for($i=0; $i<count($arResult['ELEMENT']['PROP']['MIDDLE_IMAGES']['VALUE']); $i++): ?>
                    <? if($i % 3 == 0 || $i==0): ?>
                        <div class="incut incut_product_middle">
                            <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['MIDDLE_IMAGES']['VALUE'][$i], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                            <img src="<?= $pach['src'] ?>" />
                        </div>
                    <? else: ?>
                        <div class="incut_tween">
                            <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['MIDDLE_IMAGES']['VALUE'][$i], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                            <img src="<?= $pach['src'] ?>" />
                            <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['MIDDLE_IMAGES']['VALUE'][++$i], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                            <img src="<?= $pach['src'] ?>" />
                            <div class="clear_both"></div>
                        </div>
                    <? endif; ?>
                <? endfor; ?>
            <? endif; ?>
        <? endif; ?>
        <? if(!empty($arResult['ELEMENT']['PROP']['CLASSIFICATION']['VALUE'])): ?>
            <div class="block clear block_characteristics">
                <h3><?= GetMessage("class_vessel") ?></h3>
                <p><?= $arResult['ELEMENT']['PROP']['CLASSIFICATION']['~VALUE']['TEXT'] ?></p>
            </div>
        <? endif; ?>
        <? if(!empty($arResult['ELEMENT']['PROP']['TACTICAL_CHARACTERISTICS_TABLE']['VALUE'])): ?>
            <div class="block clear block_characteristics">
                <h3><?= GetMessage("specifications") ?></h3>
                <?= $arResult['ELEMENT']['PROP']['TACTICAL_CHARACTERISTICS_TABLE']['~VALUE']['TEXT'] ?>
            </div>
        <? endif; ?>
        <? if(!empty($arResult['ELEMENT']['PROP']['MAIN_PROPULSION_PLAN']['VALUE'])): ?>
            <div class="block clear block_characteristics">
                <h3><?= GetMessage("main_propulsion") ?></h3>
                <?= $arResult['ELEMENT']['PROP']['MAIN_PROPULSION_PLAN']['~VALUE']['TEXT'] ?>  
            </div>
        <? endif; ?>

        <? if(!empty($arResult['ELEMENT']['PROP']['ARMAMENT_TABLE']['VALUE'])): ?>
            <div class="block clear block_characteristics">
                <h3><?= GetMessage("armament") ?></h3>
                <?= $arResult['ELEMENT']['PROP']['ARMAMENT_TABLE']['~VALUE']['TEXT'] ?>
            </div>
        <? endif; ?>

        <? if(!empty($arResult['ELEMENT']['PROP']['BLACK_BLOCK_TEXT']['VALUE'])): ?>
            <div class="important important_product">
                <p><?= $arResult['ELEMENT']['PROP']['BLACK_BLOCK_TEXT']['~VALUE']['TEXT'] ?></p>
            </div>
        <? endif; ?>

        <? if(!empty($arResult['ELEMENT']['PROP']['BOTTOM_IMAGES']['VALUE'])): ?>
            <div class="bottom_img">
                <? if(count($arResult['ELEMENT']['PROP']['BOTTOM_IMAGES']['VALUE'])==2): ?>
                    <div class="incut_tween">
                        <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['BOTTOM_IMAGES']['VALUE'][0], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                        <img src="<?= $pach['src'] ?>" />
                        <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['BOTTOM_IMAGES']['VALUE'][1], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                        <img src="<?= $pach['src'] ?>" />
                        <div class="clear_both"></div>
                    </div>
                <? else: ?>
                    <? for($i=0; $i<count($arResult['ELEMENT']['PROP']['BOTTOM_IMAGES']['VALUE']); $i++): ?>
                        <? if($i % 3 == 0 || $i==0): ?>
                            <div class="incut">
                                <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['BOTTOM_IMAGES']['VALUE'][$i], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                                <img src="<?= $pach['src'] ?>" />
                            </div>
                        <? else: ?>
                            <div class="incut_tween">
                                <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['BOTTOM_IMAGES']['VALUE'][$i], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                                <img src="<?= $pach['src'] ?>" />
                                <? $pach = CFile::ResizeImageGet($arResult['ELEMENT']['PROP']['BOTTOM_IMAGES']['VALUE'][++$i], array('width'=>1240, 'height'=>1240), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);   ?>
                                <img src="<?= $pach['src'] ?>" />
                                <div class="clear_both"></div>
                            </div>
                        <? endif; ?>
                    <? endfor; ?>
                <? endif; ?>
            </div>
        <? endif; ?>


        <?$APPLICATION->IncludeComponent("osk:rs.products_list", "widget", array('SECTION_ID'=>$arResult['ELEMENT']['ITEM']['IBLOCK_SECTION_ID'], "DOP_PROJECT"=>"Y", "PRODUCT_H3"=>TRUE, "CURRENT_PROJECT_ID" => $arResult['ELEMENT']['ITEM']['ID']), false);?>

    </div>
    <div class="product_wraper"></div>
</div>

