<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<ul class="list">
    <? foreach ($arResult as $value): ?>
    <li>
        <div class="foldable">
            <p><span class="foldable_control"><span class="pseudo i-link"><?= $value['NAME'] ?></span></span></p>
            <div class="foldable_content" style="display: none;">
                <p class="last_child"><?= $value['~DETAIL_TEXT'] ?></p>
            </div>
        </div>
    </li>
    <? endforeach; ?>
</ul>