<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?php
    if (CModule::IncludeModule("iblock")) {
        $arSelect = Array("*");
        $arFilter = Array();
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            $arProps = $ob->GetProperties();
            $arResult[$arFields['ID']]['ITEM'] = $arFields;
            $arResult[$arFields['ID']]['PROP'] = $arProps;
        }
    }

    foreach($arResult as $value){
        $el = new CIBlockElement;
        $PRODUCT_ID = $value['ITEM']['ID'];

        $PROP = array();
        foreach($value['PROP'] as $key=>$prop){
                if(!empty($prop['VALUE'])){
                    if($prop['PROPERTY_TYPE']=='S'){
                        if($prop['VALUE']['TYPE']=='html' || $prop['VALUE']['TYPE']=='text'){
                            //$PROP[$key]['VALUE']['TEXT'] = SALTypograf::Format($prop['VALUE']['TEXT']);
                            $arText['VALUE'] = array(
                                'TEXT' => SALTypograf::Format($prop['~VALUE']['TEXT']),
                                'TYPE' => $prop['VALUE']['TYPE'],
                            );
                            $PROPERTY_CODE = $prop['CODE'];  // код свойства
                            $PROPERTY_VALUE = $arText;  // значение свойства
                            CIBlockElement::SetPropertyValuesEx($PRODUCT_ID, false, array($PROPERTY_CODE => $PROPERTY_VALUE));
                        } else {
                            $PROPERTY_CODE = $prop['CODE'];  // код свойства
                            $PROPERTY_VALUE = $prop['~VALUE'];  // значение свойства
                            CIBlockElement::SetPropertyValuesEx($PRODUCT_ID, false, array($PROPERTY_CODE => $PROPERTY_VALUE));
                        }
                    }
                }
        }

        $arLoadProductArray = Array(
            "PREVIEW_TEXT"   => SALTypograf::Format($value['ITEM']['PREVIEW_TEXT']),
            "DETAIL_TEXT"    => SALTypograf::Format($value['ITEM']['DETAIL_TEXT']),
        );

        $res = $el->Update($PRODUCT_ID, $arLoadProductArray);

    }

?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>