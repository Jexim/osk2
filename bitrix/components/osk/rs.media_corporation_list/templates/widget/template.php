<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="block wide">
    <table class="about_in_smi">
        <tbody>
            <tr>
                <? $i=1 ?>
                <? foreach ($arResult['ITEM'] as $value): ?>
                    <? if($i%4==0): ?></tr><tr><? endif; ?>
                    <td>
                        <div class="name h4"><a href="<?=$value['DETAIL_PAGE_URL']?>"><?=$value['NAME']?></a></div>
                        <div class="text"><p><?=$value['~PREVIEW_TEXT']?></p></div>
                        <div class="date"><?=$value['DATE']?></div>
                        <div class="source"><a href="<?=$value['PROPERTY_LINK_PUBLICATION_VALUE']?>"><?=$value['PROPERTY_NAME_PUBLICATION_VALUE']?></a></div>
                    </td>
                    <? $i++ ?>
                <? endforeach; ?> 
            </tr>
        </tbody>
    </table>
    <?=$arResult['PAGINATION']?>
</div>
