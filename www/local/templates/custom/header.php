<?php
/**
 * "@global CMain $APPLICATION
*/
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die(); }

use \Bitrix\Main\Page\Asset;
use \Bitrix\Main\Application;
use \Bitrix\Main\Localization\Loc;
use Bitrix\Main\Context;

$context = Context::getCurrent();
$request = $context->getRequest();
$query = $request->get('q');

Loc::loadMessages(__FILE__);

// Подключение JS и css
$assets = Asset::getInstance();
$assets->addCss(SITE_TEMPLATE_PATH . "/frontend/css/style.css");
$assets->addJs(SITE_TEMPLATE_PATH . "/js/scripts.js");

$isMain = $APPLICATION->GetCurPage(false) === SITE_DIR;
$is404 = defined("ERROR_404") && (ERROR_404 == "Y");
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <?php $APPLICATION->ShowHead(); ?>
    <meta charSet="UTF-8" />
    <meta name="cmsmagazine" content="c225507764b7ae59094f40a840aa6a0f" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="format-detection" content="address=no" />
    <title><?php $APPLICATION->ShowTitle() ?></title>
    <meta property="og:site_name" content="<?= $APPLICATION->GetDirProperty('SITE_NAME') ?>"/>
    <meta property="og:title" content="<?php $APPLICATION->ShowTitle(); ?>"/>
    <meta property="og:type" content="<?php $APPLICATION->ShowProperty('og_type', "website")?>"/>
    <meta property="og:url" content="https://<?= SITE_SERVER_NAME . $APPLICATION->GetCurPage()?>"/>
    <meta property="og:description" content="<?php $APPLICATION->ShowProperty('description')?>"/>
    <meta property="og:image" content="<?php $APPLICATION->ShowProperty("og_image");?>"/>
</head>
<body>
<div class="bx_panel">
    <?php $APPLICATION->ShowPanel(); ?>
</div>
<header>
    <div class="logo">
        <img class="logo" src="<?= SITE_TEMPLATE_PATH ?>/frontend/images/logo.svg" width="100px" height="100px">
    </div>
    <?php if ($isMain && !$is404) { ?>
        <div class="search-form">
            <form action="" method="GET">
                <input id="q" name="q" value="<?= $query ?>" placeholder="<?= Loc::getMessage('C_H_SEARCH') ?>"/>
                <button type="submit" >
                    <?= Loc::getMessage('C_H_SEARCH_BUTTON') ?>
                </button>
            </form>
        </div>
    <?php } ?>
</header>
<main>
