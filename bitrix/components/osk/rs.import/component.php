<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

$this->IncludeComponentTemplate();

if (CModule::IncludeModule("iblock")) {    
    if (!empty($_FILES['i_file'])) {
        //Работа с файлом импорта
        $stValue = file_get_contents($_FILES['i_file']['tmp_name']);
        $arStValue = preg_split('/\\r\\n?|\\n/', $stValue);
        //$stValue = substr($stValue,1,-1);
        //$arStValue = preg_split('/"\n"/', $stValue);
        foreach ($arStValue as $value) {
            $arStResult[] = explode(',', $value);
        }
//Новости        
//        foreach ($arStResult as $value) {
//            if ($value[0] != null) {
//                $el = new CIBlockElement;
//                $arDate = explode('-', $value[0]);
//                $date = $arDate[2] . '.' . $arDate[1] . '.' . $arDate[0] .' 00:00:00';
//                $arLoadProductArray = Array(
//                    "IBLOCK_ID" => 18,
//                    "NAME" => $value[1],
//                    "ACTIVE" => "Y",
//                    "DATE_ACTIVE_FROM" =>  $date,
//                    "DETAIL_TEXT" => substr($value[2],0, -1),
//                    "DETAIL_TEXT_TYPE" => 'html'
//                );      
//               
//                if($PRODUCT_ID = $el->Add($arLoadProductArray))
//                    echo "New ID: ".$PRODUCT_ID."<br>";
//                else
//                    echo "Error: ".$el->LAST_ERROR."<br>";
//            }
//        }      
//Совет директоров
//        foreach ($arStResult as $value) {
//            if ($value[0] != null) {
//
//                $el = new CIBlockElement;
//                $PROP = array();
//                $PROP['NAME_EN'] = $value[1];
//                $PROP['PLACE_WORK_EN'] = $value[3];               
//                $PROP['PLACE_WORK'] = $value[4];
//                $PROP['POSITION_EN'] = $value[5];
//                $PROP['POSITION'] = $value[2];
//
//                $arLoadProductArray = Array(
//                    "IBLOCK_ID" => 15,
//                    "PROPERTY_VALUES" => $PROP,
//                    "NAME" => $value[0],
//                    "ACTIVE" => "Y",
//                    "IBLOCK_SECTION_ID" => 17,
//                );
//                if($PRODUCT_ID = $el->Add($arLoadProductArray))
//                    echo "New ID: ".$PRODUCT_ID."<br>";
//                else
//                    echo "Error: ".$el->LAST_ERROR."<br>";
//            }
//        }        
//Предприятия, города        
//        $arSelect = Array("ID", "NAME");
//        $arFilter = Array("IBLOCK_CODE"=>"companies_list", "ACTIVE"=>"Y");
//        $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
//        while($ob = $res->GetNext()){
//            $arResult['CHARACTERISTICS'][$ob['NAME']] = $ob['ID'];
//        }
//
//        $arSelect = Array("ID", "NAME");
//        $arFilter = Array("IBLOCK_CODE"=>"city", "ACTIVE"=>"Y");
//        $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
//        while($ob = $res->GetNext()){
//            $arResult['CITY'][$ob['NAME']] = $ob['ID'];
//        }
//
//        foreach ($arStResult as $value) {
//            if (!empty($arResult['CHARACTERISTICS'][$value[0]])) {
//                $arStRegionCord = array();
//                $el = new CIBlockElement;
//                $PROP = array();
//                $PROP['ADDRESS'] = array('value'=>array('TEXT'=>$value[3], 'TYPE'=>'text'));
//                $xml = simplexml_load_file('http://geocode-maps.yandex.ru/1.x/?geocode=' . $value[3]);
//                            $arCityResult = str_replace(' ', ',', (string) $xml->GeoObjectCollection->featureMember->GeoObject->Point->pos);
//                            $arStRegionCord[] = explode(',', $arCityResult);
//
//                $PROP['COORDINATES'] = $arStRegionCord[0][1] . ', ' . $arStRegionCord[0][0];
//                $PROP['CITY'] = $arResult['CITY'][$value[2]];
//                $PROP['PHONE'] = $value[4];
//                $PROP['FAX'] = $value[5];
//                $PROP['URL'] = $value[6];
//                $PROP['EMAIL'] = $value[7];
//                $PROP['FULL_NAME'] = $value[1];
//                $arLoadProductArray = Array(
//                    "IBLOCK_ID" => 6,
//                    "PROPERTY_VALUES" => $PROP,
//                    "ACTIVE" => "Y",
//                );
//                //print_r($arLoadProductArray);
//                $res = $el->Update($arResult['CHARACTERISTICS'][$value[0]], $arLoadProductArray);
//                echo 'TRUE ' . $PROP['COORDINATES'] . '<br>';
//            } else {
//                echo $value[0] . '<br>';
//            }
//        }
        
//Продукция/Проэкты
//        foreach ($arStResult as $value) {
//            if ($value[0] != null) {
//
//                $el = new CIBlockElement;
//                $PROP = array();
//                $PROP['SHORT_TEXT'] = $value[3];
//                $PROP['NAME_EN'] = $value[4];
//                $PROP['SHORT_TEXT_EN'] = $value[5];
//
//                $arLoadProductArray = Array(
//                    "IBLOCK_ID" => 5,
//                    "PROPERTY_VALUES" => $PROP,
//                    "NAME" => $value[2],
//                    "ACTIVE" => "Y",
//                    "IBLOCK_SECTION_ID" => $value[1],
//                );
//                if($PRODUCT_ID = $el->Add($arLoadProductArray))
//                    echo "New ID: ".$PRODUCT_ID."<br>";
//                else
//                    echo "Error: ".$el->LAST_ERROR."<br>";
//            }
//        }
//Импорт фото в англ. версию
//        $arSelect = Array("*");
//        $arFilter = Array("IBLOCK_CODE"=>"products", "ACTIVE"=>"Y");
//        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
//        while($ob = $res->GetNextElement()){
//            $arProps = $ob->GetProperties();
//            $arFields = $ob->GetFields();
//            $arResult[$arFields['ID']]['ITEM'] = $arFields;
//            $arResult[$arFields['ID']]['PROP'] = $arProps;
//        }
//
//        foreach ($arStResult as $value) {
//            if ($value[0] != null) {
//
//                $el = new CIBlockElement;
//
//                $PROP = array();
//                $PROP["TOP_IMAGES"][] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . CFile::GetPath($arResult[$value[0]]['PROP']['TOP_IMAGES']['VALUE']));
//
//                foreach($arResult[$value[0]]['PROP']['MIDDLE_IMAGES']['VALUE'] as $file){
//                    $MIDDLE_IMAGES[] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . CFile::GetPath($file));
//                }
//                $PROP["MIDDLE_IMAGES"] = $MIDDLE_IMAGES;
//
//                foreach($arResult[$value[0]]['PROP']['BOTTOM_IMAGES']['VALUE'] as $file){
//                    $BOTTOM_IMAGES[] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . CFile::GetPath($file));
//                }
//                $PROP["BOTTOM_IMAGES"] = $BOTTOM_IMAGES;
//
//                $arLoadProductArray = Array(
//                    "PROPERTY_VALUES"=> $PROP,
//                );
//
//                if(!empty($arResult[$value[0]]) && !empty($value[1])){
//                    $PRODUCT_ID = $value[1];
//                    $result = $el->Update($PRODUCT_ID, $arLoadProductArray);
//                }
//                if($result)
//                    echo "TRUE " . $value[0] . " -> " . $value[1] . "<br>";
//                else
//                    echo "FALSE";
//                unset($PROP);
//                unset($BOTTOM_IMAGES);
//                unset($MIDDLE_IMAGES);
//            }
//        }
   }
    //Генерация CODE
//    $arSelect = Array("ID", "NAME");
//    $arFilter = Array("IBLOCK_CODE"=>"companies_list", "ACTIVE"=>"Y");
//    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
//    while($ob = $res->GetNext()){
//        $arResult[$ob['ID']] = CUtil::translit($ob['NAME'], "ru", array("replace_space"=>"-","replace_other"=>"-"));
//    }
//    print_r($arResult);
//    foreach ($arResult as $key=>$value){
//        $el = new CIBlockElement;
//        $arLoadProductArray = Array(
//            "CODE" => $value,
//        );
//        $res = $el->Update($key, $arLoadProductArray);
//    }
}
