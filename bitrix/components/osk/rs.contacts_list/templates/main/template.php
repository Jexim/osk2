<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->SetAdditionalCSS('/f/1/contacts/index.css');
?>

<?
if(SITE_ID=='en'){
    $lang_prifix = "en_US";
} else {
    $lang_prifix = "ru_RU";
}
?>
<script src="http://api-maps.yandex.ru/2.1/?lang=<?=$lang_prifix?>" type="text/javascript"></script>
<? foreach ($arResult as $value): ?>
    <table class="contact_table">
        <tr>
            <td class="left_contacts">
                <div class="address">
                    <div class="name"><?= $value['NAME'] ?></div>
                    <?= $value['~PROPERTY_ADDRESS_VALUE']['TEXT'] ?>
                    <div class="contact">
                        <? if(!empty($value['PROPERTY_PHONE_VALUE'])): ?><p><?if(!empty($value['PROPERTY_FAX_VALUE'])){?><em><?=GetMessage("PHONE")?>:</em> <?}?><nobr><?= $value['PROPERTY_PHONE_VALUE'] ?></nobr></p><? endif; ?>
                        <? if(!empty($value['PROPERTY_FAX_VALUE'])): ?><p><em><?=GetMessage("FAX")?>:</em> <nobr><?= $value['PROPERTY_FAX_VALUE'] ?></nobr></p><? endif; ?>
                        <? if(!empty($value['PROPERTY_EMAIL_VALUE'])): ?><p><a href="maito:<?= $value['PROPERTY_EMAIL_VALUE'] ?>"><?= $value['PROPERTY_EMAIL_VALUE'] ?></a></p><? endif; ?>
                    </div>
                </div>
            </td>
            <td>
                <? if(!empty($value['PROPERTY_COORDINATES_VALUE'])): ?>
                    <div id="map_<?= $value['ID'] ?>" style="width: 500px; height: 300px"></div>   
                <? endif; ?>
            </td>
        </tr>
    </table>
    <? if(!empty($value['PROPERTY_COORDINATES_VALUE'])): ?>
        <script type="text/javascript">
            ymaps.ready(init);
            var myMap;

            function init(){     
                myMap = new ymaps.Map("map_<?= $value['ID'] ?>", {
                    center: [<?= $value['PROPERTY_COORDINATES_VALUE'] ?>],
                    zoom: 10
                });

                myPlacemark = new ymaps.Placemark([<?= $value['PROPERTY_COORDINATES_VALUE'] ?>], {balloonContent: '<?= $value['NAME'] ?>'},
                    {
                        iconLayout: 'default#image',
                        iconImageHref: '/images/enterprises-map/placemark.png',
                        iconImageSize: [28, 36], // размеры картинки
                        iconImageOffset: [ - 14, - 28] // смещение картинки
                    });
                myMap.geoObjects.add(myPlacemark);
            }

        </script>
    <? endif; ?>
<? endforeach; ?>
