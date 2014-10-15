<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";
$arCount = count($arResult);
$strReturn = '<div class="breadcrumbs"><ul>';
$i=1;
foreach ($arResult as $value){	
    if($arCount!=$i)
        $strReturn .= '<li><a href="'.$value["LINK"].'" title="'. $value['TITLE'] .'">'. $value['TITLE'] .'</a>&nbsp;/&nbsp;</li>';
    else
        $strReturn .= '<li><a href="'.$value["LINK"].'" title="'. $value['TITLE'] .'">'. $value['TITLE'] .'</a></li>';
    $i++;
}

$strReturn .= '</ul></div>';

return $strReturn;
?>