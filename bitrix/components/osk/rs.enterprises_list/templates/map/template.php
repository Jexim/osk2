<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->AddHeadScript('/f/1/enterprises/map.js');
$APPLICATION->SetAdditionalCSS('/f/1/enterprises/map.css');
?>

<input type="hidden" name="leng" value="<?=SITE_ID?>">
<div class="block second">
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
                <form action="/search/">
                    <input type="hidden" value="companies_list" name="TYPE" />
                    <input type="text" data-xp="required: true" name="SEARCH_TEXT" placeholder="<?=GetMessage("site_search")?>" value="" /><button data-xp="enabled_on_completed: true" class="small"><?=GetMessage("find")?></button>
                </form>
            </div>
        </div>
        <div class="select_field_enterprises">
            <form class="city_form">
                <select class="pretty_select" name="city">           
                    <option value=""><?=GetMessage("all_cities")?></option>
                    <? foreach ($arResult['CITY'] as $key => $value): ?>
                        <option value="<?= $key ?>" <? if ($key == $_REQUEST['city']): ?>selected=""<? endif; ?>><?= $value['NAME'] ?></option>
                    <? endforeach; ?>     
                </select>
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div id="map"></div>
<?
    if(SITE_ID=='en'){
        $lang_prifix = "en_US";
    } else {
        $lang_prifix = "ru_RU";
    }
?>
<script src="http://api-maps.yandex.ru/2.1/?lang=<?=$lang_prifix?>" type="text/javascript"></script>
<script type="text/javascript">
    ymaps.ready(init);
    var myMap;

    function init(){     
        myMap = new ymaps.Map("map", {
            center: [60.76, 87.64],
            zoom: 3,
            controls: ["zoomControl", "fullscreenControl", "typeSelector"]
        });

        /**
         * Создаем метки
         */

        var placemarks = [];

        <? foreach ($arResult['ITEM'] as $value): ?>            
            <? if(!empty($value['PROPERTY_COORDINATES_VALUE'])): ?>
        myPlacemark = new ymaps.Placemark(
            [<?=$value['PROPERTY_COORDINATES_VALUE']?>], 
            {
                balloonContent: '\
                <div class="enterprise_ballon">\
                    <div class="ballon__name">\
                        <a href="<?=$value['DETAIL_PAGE_URL']?>"><?=$value['NAME']?></a>\
                    </div>\
                    <div class="ballon__address">\
                        <span><?=str_replace("\n", "", $value['~PROPERTY_ADDRESS_VALUE']['TEXT'])?></span>\
                    </div>\
                    <div class="ballon__phone">\
                        <span><?=$value['PROPERTY_PHONE_VALUE']?></span>\
                    </div>\
                    <?if(!empty($value['PROPERTY_EMAIL_VALUE'])){?>
                    <div class="ballon__email">\
                        <span><a href="mailto:<?=$value['PROPERTY_EMAIL_VALUE']?>"><?=$value['PROPERTY_EMAIL_VALUE']?></a></span>\
                    </div>\
                    <?}?>
                    <?if(!empty($value['PROPERTY_URL_VALUE'])){?>
                        <div class="ballon__site">\
                            <span>\
                                <a class="external" href="http://<?=str_replace("http://","",$value['PROPERTY_URL_VALUE'])?>" target="_blank">\
                                    <span class="text"><?=$value['PROPERTY_URL_VALUE']?></span>\
                                    <span class="icons-external"></span>\
                                </a>\
                            </span>\
                        </div>\
                    <?}?>
                </div>\
                '
            }, 
            {
                iconLayout: 'default#image',
                iconImageHref: '/images/enterprises-map/placemark.png',
                iconImageSize: [28, 36], // размеры картинки
                iconImageOffset: [ - 14, - 28], // смещение картинки
            }
        );

            placemarks.push(myPlacemark);

            <? endif; ?>
        <? endforeach; ?>

        /**
         * Добаляем коллекцию предприятий на карту
         */
        // var enterpriseCollection = new ymaps.GeoObjectCollection(); 
        // myMap.geoObjects.add(enterpriseCollection);
        // for (var i = 0, l = placemarks.length; i < l; i++) {
        //     enterpriseCollection.add(placemarks[i]);
        // }


        // Переменная с описанием видов иконок кластеров
        var clusterIcons = [
            {
                href: '/images/enterprises-map/clusterer-5.png',
                size: [44, 49],
                offset: [-22, -35]
            },
            {
                href: '/images/enterprises-map/clusterer-10.png',
                size: [52, 60],
                offset: [-26, -50]
            },
            {
                href: '/images/enterprises-map/clusterer-15.png',
                size: [76, 88],
                offset: [-38, -81]
            }
        ];

        // При размере кластера до 100 будет использована картинка 'small.jpg'.
        // При размере кластера больше 100 будет использована 'big.png'.
        clusterNumbers = [5, 10, 15];

        /**
         * Содержимое кластера
         */
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div class="clustermark clustermark_{{properties.iconContentClass}}">{{ properties.geoObjects.length }}</div>'
        );
        /*clustermark_{% if properties.geoObjects.length < 5 %}small{% elseif properties.geoObjects.length < 5 %}medium{% else %}big*/

        /** 
         * Добаляем кластер предприятий на карту
         */
        var enterpriseClusterer = new ymaps.Clusterer({
            clusterIcons: clusterIcons,
            clusterNumbers: clusterNumbers,
            clusterIconContentLayout: MyIconContentLayout
        });

        enterpriseClusterer.createCluster = function (center, geoObjects) {
            // Создаем метку-кластер с помощью стандартной реализации метода.
            var clusterPlacemark = ymaps.Clusterer.prototype.createCluster.call(this, center, geoObjects),
                geoObjectsLength = clusterPlacemark.getGeoObjects().length,
                iconContentClass;
            if (geoObjectsLength < 5) {
                iconContentClass = 'small';
            } else if (geoObjectsLength < 10) {
                iconContentClass = 'medium';
            } else {
                iconContentClass = 'big';
            }
            clusterPlacemark.properties.set('iconContentClass', iconContentClass);
            return clusterPlacemark;
        };


        myMap.geoObjects.add(enterpriseClusterer);
        enterpriseClusterer.add(placemarks);
        
        /**
         * Спозиционируем карту так, чтобы на ней были видны все объекты.
         */
        // myMap.setBounds(enterpriseClusterer.getBounds(), {
        //     checkZoomRange: true
        // });

    }
</script>