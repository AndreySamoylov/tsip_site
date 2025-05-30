<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");
$USER->Authorize(1);

use Bitrix\Main\Context;

$context = Context::getCurrent();
$request = $context->getRequest();

if ($request->get('q') !== null) {
    $searchElements = $APPLICATION->IncludeComponent(
        "bitrix:search.page",
        "empty",
        array(
            "TAGS_SORT" => "NAME",
            "TAGS_PAGE_ELEMENTS" => "150",
            "TAGS_PERIOD" => "30",
            "TAGS_URL_SEARCH" => "/index.php",
            "TAGS_INHERIT" => "Y",
            "FONT_MAX" => "50",
            "FONT_MIN" => "10",
            "COLOR_NEW" => "000000",
            "COLOR_OLD" => "C8C8C8",
            "PERIOD_NEW_TAGS" => "",
            "SHOW_CHAIN" => "Y",
            "COLOR_TYPE" => "Y",
            "WIDTH" => "100%",
            "USE_SUGGEST" => "Y",
            "SHOW_RATING" => "Y",
            "PATH_TO_USER_PROFILE" => "",
            "AJAX_MODE" => "N",
            "RESTART" => "Y",
            "NO_WORD_LOGIC" => "N",
            "USE_LANGUAGE_GUESS" => "N",
            "CHECK_DATES" => "Y",
            "USE_TITLE_RANK" => "Y",
            "DEFAULT_SORT" => "rank",
            "FILTER_NAME" => "",
            "SHOW_WHERE" => "N",
            "arrWHERE" => "",
            "SHOW_WHEN" => "Y",
            "PAGE_RESULT_COUNT" => "9999",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "DISPLAY_TOP_PAGER" => "Y",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "PAGER_TITLE" => "Результаты поиска",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "AJAX_OPTION_SHADOW" => "Y",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "COMPONENT_TEMPLATE" => "empty",
            "arrFILTER" => array(
                0 => "iblock_films",
            ),
            "arrFILTER_iblock_content" => array(
                0 => FILMS_IBLOCK_ID,
            ),
        ),
        false
    );
    if (!empty($searchElements)) {
        $arSelect = Array("ID", "NAME", "IBLOCK_ID");
        $arFilter = Array("ID"=> $searchElements, "IBLOCK_ID" => FILMS_IBLOCK_ID ,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $result = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        $searchElements = [];
        while($item = $result->Fetch())
        {
            $searchElements[] = $item;
        }
        $filmsId = array_column($searchElements, 'ID');
    }
}

if (!empty($filmsId)) {
    $GLOBALS['filmsFilter'] = array('ID' => $filmsId);
}
$APPLICATION->IncludeComponent(
	"bitrix:news", 
	".default", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "films",
		"IBLOCK_ID" => FILMS_IBLOCK_ID,
		"NEWS_COUNT" => "3",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "Y",
		"USE_CATEGORIES" => "Y",
		"USE_REVIEW" => "Y",
		"USE_FILTER" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "RELEASE_DATE",
			2 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_SET_CANONICAL_URL" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Фильм",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"STRICT_SECTION_CHECK" => "Y",
		"SET_TITLE" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"SET_LAST_MODIFIED" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK" => "",
		"PAGER_PARAMS_NAME" => "arrPager",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"USE_PERMISSIONS" => "Y",
		"GROUP_PERMISSIONS" => array(
			0 => "1",
		),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"FILTER_NAME" => "filmsFilter",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"NUM_NEWS" => "20",
		"NUM_DAYS" => "30",
		"YANDEX" => "Y",
		"MAX_VOTE" => "5",
		"VOTE_NAMES" => array(
			0 => "0",
			1 => "1",
			2 => "2",
			3 => "3",
			4 => "4",
			5 => "",
		),
		"CATEGORY_IBLOCK" => array(
		),
		"CATEGORY_CODE" => "CATEGORY",
		"CATEGORY_ITEMS_COUNT" => "5",
		"MESSAGES_PER_PAGE" => "10",
		"USE_CAPTCHA" => "Y",
		"REVIEW_AJAX_POST" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "Y",
		"POST_FIRST_MESSAGE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"USE_SHARE" => "Y",
		"SHARE_HIDE" => "Y",
		"SHARE_TEMPLATE" => "",
		"SHARE_HANDLERS" => array(
			0 => "delicious",
			1 => "lj",
			2 => "twitter",
		),
		"SHARE_SHORTEN_URL_LOGIN" => "",
		"SHARE_SHORTEN_URL_KEY" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"AJAX_OPTION_ADDITIONAL" => "",
		"DISPLAY_AS_RATING" => "rating",
		"FILE_404" => "",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_ID#/",
		)
	),
	false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
