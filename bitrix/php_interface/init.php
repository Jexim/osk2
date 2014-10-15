<?php
session_start();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/typograf.php");

/*
 * Геопозиционирование
 */
//if(!empty($_REQUEST['LANG'])){
//    $_SESSION['LANG'] = $_REQUEST['LANG'];
//}
if($_SERVER['SCRIPT_URL']=='/en/'){
    $_SESSION['LANG'] = 'en';
}
if($_SERVER['SCRIPT_URL']=='/'){
    $_SESSION['LANG'] = 'ru';
}
if(empty($_SESSION['LANG'])){
    if(($_SERVER['GEOIP_COUNTRY_CODE']!='UA' && $_SERVER['GEOIP_COUNTRY_CODE']!='RU'
        && $_SERVER['GEOIP_COUNTRY_CODE']!='AZ' && $_SERVER['GEOIP_COUNTRY_CODE']!='AM'
        && $_SERVER['GEOIP_COUNTRY_CODE']!='BY' && $_SERVER['GEOIP_COUNTRY_CODE']!='KZ'
        && $_SERVER['GEOIP_COUNTRY_CODE']!='KG' && $_SERVER['GEOIP_COUNTRY_CODE']!='MD'
        && $_SERVER['GEOIP_COUNTRY_CODE']!='TJ' && $_SERVER['GEOIP_COUNTRY_CODE']!='TM'
        && $_SERVER['GEOIP_COUNTRY_CODE']!='UZ')){
        $_SESSION['LANG'] = 'en';
        LocalRedirect('/en/');
    } else {
        $_SESSION['LANG'] = 'ru';
        LocalRedirect('/');
    }
} else {
    if(LANGUAGE_ID != $_SESSION['LANG'] && $_SERVER['SCRIPT_NAME']!='/404.php'
        && $_SERVER['SCRIPT_NAME']!='/500.php' && strpos($_SERVER['REQUEST_URI'], "ajax")!=1){
        if($_SESSION['LANG']=='ru'){
            LocalRedirect('/');
        } else {
            LocalRedirect('/' . $_SESSION['LANG'] . '/');
        }
        unset($_SESSION['LANG']);
    }
}
/*
 * Геопозиционирование конец
 */

//закроем сайт для не авторизованных пользователей
//AddEventHandler("main", "OnProlog", "CloseAccessForGroup");
//function CloseAccessForGroup(){
//    global $USER, $APPLICATION;
//    $mas = $USER->GetUserGroupArray();
//    if (count($mas) == 1 && in_array(2, $mas) && (strpos($APPLICATION->GetCurPage(),'/bitrix/admin/'))===false){
//        header("Location: /bitrix/admin/");
//        die();
//    }
//}
function getParent($id){ 
    $tt = CIBlockSection::GetList(array(), array('ID'=>$id)); 
    $as=$tt->GetNext(); 
    static $a; 
    if($as['DEPTH_LEVEL']==1){ 
        $a = $as['ID'];        
    }else{ 
        getParent($as['IBLOCK_SECTION_ID']); 
    } 
    return $a; 
}