<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (CModule::IncludeModule("iblock")) {
    //Получаем массив документов
    $arSelect = Array("*");
    $arFilter = Array("IBLOCK_CODE"=>"purchases_usc", "ACTIVE"=>"Y", "CODE"=>$_REQUEST['ELEMENT_CODE']);
    $res = CIBlockElement::GetList(Array('sort'=>'asc'), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();
        $arResult['ELEMENT']['PROP'] = $arProps;
        $arResult['ELEMENT']['ITEM'] = $arFields;
    }
    //Ошибка 404
    if(empty($arResult['ELEMENT'])){
        LocalRedirect("/404.php");
    }
}

$this->IncludeComponentTemplate();