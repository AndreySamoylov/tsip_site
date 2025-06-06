<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if (empty($arResult["ITEMS"])) {
    return;
}
?>

<div class="movie-list">
<?php foreach($arResult["ITEMS"] as $arItem) {
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="movie" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <h2><?= $arItem["NAME"] ?></h2>
        <img
                class="poster"
                src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
        <p>
            <?php foreach ($arItem['PROPERTIES'] as $property) { ?>
                <?= $property['NAME'] . ': ' . $property['VALUE']  ?> <br>
            <?php } ?>
        </p>
        <p>
            <?= $arItem["PREVIEW_TEXT"] ?>
        </p>
        <a class="" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
            <?= GetMessage('B_D_NNL_WATCH', array('#FILM_NAME#' => $arItem["NAME"])) ?>
        </a>
    </div>
<?php } ?>
</div>
<?php if($arParams["DISPLAY_BOTTOM_PAGER"]) { ?>
	<?=$arResult["NAV_STRING"]?>
<?php } ?>

