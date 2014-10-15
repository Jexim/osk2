<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->SetAdditionalCSS('/f/1/widget/state_company.css');
?>

<!-- блок госпредприятий -->
<div class="state_company_block">
    <div class="state_company_block_in">
        <? foreach ($arResult['ITEM'] as $value): ?>
            <div class="state_company_block_one">
                <a href="<?= $value['PROPERTY_URL_VALUE']?>" class="state_ico">
                    <img class="active" src="<?= CFile::GetPath($value['PREVIEW_PICTURE']) ?>">
                    <img src="<?= CFile::GetPath($value['DETAIL_PICTURE']) ?>">
                    <span></span>
                </a>
                <div class="state_link">
                    <div>
                        <a href="<?= $value['PROPERTY_URL_VALUE']?>"><?= $value['NAME']?></a>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>