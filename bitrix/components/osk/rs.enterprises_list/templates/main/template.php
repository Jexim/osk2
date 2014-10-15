<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/enterprises/index.js');
$APPLICATION->SetAdditionalCSS('/f/1/enterprises/index.css');
?>

<input type="hidden" name="leng" value="<?=SITE_ID?>">
<div class="enterprises_search_block">
    <? if(!empty($arResult['ARR_CHARACTERISTICS'])): ?>
        <div class="sub_filter sub_filter_enterprises">
            <div class="item"><span class="item_category"><?=GetMessage("specialty")?>:</span></div>
            <div class="item switcher_item for_jn_view selected characteristics_all" characteristics="all"><span class="pseudo"><?=GetMessage("all")?></span></div>
            <? foreach ($arResult['ARR_CHARACTERISTICS'] as $value): ?>
                <div class="item switcher_item for_fb_view" characteristics="<?= $value['ID'] ?>" ><span class="pseudo"><?= $value['NAME'] ?></span></div>
            <? endforeach; ?>
        </div>
    <? endif; ?>

    <!-- <div class="list_search_block"> -->

    <!-- </div> -->

    <div class="search_field_enterprises">
        <div class="form_validate field" data-id="field">
            <form action="<?=GetMessage("action_form")?>">
                <input type="hidden" value="companies_list" name="TYPE" />
                <input type="text" data-xp="required: true" name="SEARCH_TEXT" placeholder="<?=GetMessage("site_search")?>" value="<?=$_REQUEST['SEARCH_TEXT']?>" /><button data-xp="enabled_on_completed: true" class="small"><?=GetMessage("find")?></button>
            </form>
        </div>
    </div>
    <div class="select_field_enterprises">
        <select class="pretty_select" name="city">           
            <option class="select_city_00" value="00"><?=GetMessage("all_cities")?></option>
            <? foreach ($arResult['ARR_CITY'] as $key => $value): ?>
                <?if(!empty($value)){?>
                    <option class="select_city_<?= $key ?>" value="<?= $key ?>" <? if ($key == $_REQUEST['city']): ?><? endif; ?>><?= $value['NAME'] ?></option>
                <?}?>
            <? endforeach; ?>     
        </select>
    </div>
    <div class="clear"></div>
</div>

<div class="switch_enterprises">
    <div class="switch_enterprises__name">
        <div class="switch_block">
            <span class="gray-link"><?=GetMessage("name")?></span>
        </div>
    </div>
    <div class="switch_enterprises__city">
        <div class="switch_block switch_block_current_down">
            <span class="gray-link"><?=GetMessage("city")?></span>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>

<div class="list_enterprises list_by_name">
    <div class="clear"></div>
    <? foreach ($arResult['ITEM'] as $value): ?>
        <div class="item enterprises city_<?= $value['PROPERTY_CITY_VALUE'] ?> <? foreach ($value['PROPERTY_CHARACTERISTICS_VALUE'] as $characteristics): ?>characteristics_<?= $characteristics ?> <? endforeach; ?>">
            <div class="item__name">
                <div class="title">
                    <a href="<?= $value["DETAIL_PAGE_URL"] ?>"><?= $value['NAME'] ?></a>
                </div>
                <? if(!empty($value["CHARACTERISTICS"])): ?>
                    <div class="category">
                        <span><?=$value["CHARACTERISTICS"]?>.</span>  
                    </div>
                <? endif; ?>
            </div>
            <div class="item__city" city="<?=$value["PROPERTY_CITY_VALUE"]?>">
                <span class="gray-link"><?= $arResult['CITY'][$value["PROPERTY_CITY_VALUE"]]['NAME'] ?></span>
            </div>
        </div>
    <? endforeach; ?>
</div>
<div class="list_by_city">
    <div class="list_enterprises list_by_city_desk">
        <div class="clear"></div>
        <? foreach ($arResult['ITEM_BY_CITY_DESK'] as $city): ?>
            <? foreach ($city as $value): ?>
                <div class="item enterprises city_<?= $value['PROPERTY_CITY_VALUE'] ?> <? foreach ($value['PROPERTY_CHARACTERISTICS_VALUE'] as $characteristics): ?>characteristics_<?= $characteristics ?> <? endforeach; ?>">
                    <div class="item__name">
                        <div class="title">
                            <a href="<?= $value["DETAIL_PAGE_URL"] ?>"><?= $value['NAME'] ?></a>
                        </div>
                        <? if(!empty($value["CHARACTERISTICS"])): ?>
                            <div class="category">
                                <span><?=$value["CHARACTERISTICS"]?>.</span>  
                            </div>
                        <? endif; ?>
                    </div>
                    <div class="item__city" city="<?=$value["PROPERTY_CITY_VALUE"]?>">
                        <span class="gray-link"><?= $arResult['CITY'][$value["PROPERTY_CITY_VALUE"]]['NAME'] ?></span>
                    </div>
                </div>
            <? endforeach; ?>
        <? endforeach; ?>
    </div>
    <div class="list_enterprises list_by_city_asc">
        <div class="clear"></div>
        <? foreach ($arResult['ITEM_BY_CITY_ASC'] as $city): ?>
            <? foreach ($city as $value): ?>
                <div class="item enterprises city_<?= $value['PROPERTY_CITY_VALUE'] ?> <? foreach ($value['PROPERTY_CHARACTERISTICS_VALUE'] as $characteristics): ?>characteristics_<?= $characteristics ?> <? endforeach; ?>">
                    <div class="item__name">
                        <div class="title">
                            <a href="<?= $value["DETAIL_PAGE_URL"] ?>"><?= $value['NAME'] ?></a>
                        </div>
                        <? if(!empty($value["CHARACTERISTICS"])): ?>
                            <div class="category">
                                <span><?=$value["CHARACTERISTICS"]?>.</span>  
                            </div>
                        <? endif; ?>
                    </div>
                    <div class="item__city" city="<?=$value["PROPERTY_CITY_VALUE"]?>">
                        <span class="gray-link"><?= $arResult['CITY'][$value["PROPERTY_CITY_VALUE"]]['NAME'] ?></span>
                    </div>
                </div>
            <? endforeach; ?>
        <? endforeach; ?>
    </div>
</div>