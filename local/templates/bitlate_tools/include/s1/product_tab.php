<?$arTabs = array(
    'recomend' => array(
        'FILTER_NAME' => 'arrRecomendFilter',
        'FILTER_VALUE' => array('!PROPERTY_RECOMEND' => false),
    ),
    'news' => array(
        'FILTER_NAME' => 'arrNewFilter',
        'FILTER_VALUE' => array('!PROPERTY_NEWPRODUCT' => false),

    ),
    'hits' => array(
        'FILTER_NAME' => 'arrHitFilter',
        'FILTER_VALUE' => array('!PROPERTY_SALELEADER' => false),

    ),
    'discount' => array(
        'FILTER_NAME' => 'arrDiscountFilter',
        'FILTER_VALUE' => array('!PROPERTY_DISCOUNT' => false),
    )
);
$arTab = $arTabs[$TYPE];
global ${$arTab['FILTER_NAME']};
${$arTab['FILTER_NAME']} = $arTab['FILTER_VALUE'];
$PAGE_ELEMENT_COUNT = COption::GetOptionString("bitlate.toolsshop", "NL_MAIN_TABS_PAGE_ELEMENT_COUNT", false, SITE_ID);
$APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "board",
    array(
        "CURRENCY_ID" => "RUB",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => '4',
        "ELEMENT_SORT_FIELD" => "sort",
        "ELEMENT_SORT_ORDER" => "asc",
        "ELEMENT_SORT_FIELD2" => "active_from",
        "ELEMENT_SORT_ORDER2" => "asc",
        "META_KEYWORDS" => "-",
        "META_DESCRIPTION" => "-",
        "BROWSER_TITLE" => "-",
        "INCLUDE_SUBSECTIONS" => "Y",
        "BASKET_URL" => "/personal/cart/",
        "COMPARE_PATH" => "/catalog/compare/",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "PRODUCT_QUANTITY_VARIABLE" => "",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "FILTER_NAME" => $arTab['FILTER_NAME'],
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "SET_TITLE" => "N",
        "SET_STATUS_404" => "N",
        "PAGE_ELEMENT_COUNT" => $PAGE_ELEMENT_COUNT,
        "LINE_ELEMENT_COUNT" => "",
        "PRICE_CODE" => array(
			0 => "BASE",
		),
        "DISPLAY_COMPARE" => "Y",
        "USE_ELEMENT_COUNTER" => "Y",
        "USE_FILTER" => "Y",
        "USE_MAIN_ELEMENT_SECTION" => "Y",
        "USE_MIN_AMOUNT" => "Y",
        "USE_PRICE_COUNT" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "USE_PRODUCT_QUANTITY" => "Y",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "PARTIAL_PRODUCT_PROPERTIES" => "Y",
        "PRODUCT_PROPERTIES" => array(
			0 => " ",
		),
        "DISPLAY_TOP_PAGER" => "Y",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_TITLE" => "",
        "PAGER_SHOW_ALWAYS" => "Y",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "",
        "PAGER_SHOW_ALL" => "N",
        "OFFERS_CART_PROPERTIES" => array(
			0 => "ARTNUMBER",
			1 => "COLOR_REF",
			2 => "SIZES_SHOES",
			3 => "SIZES_CLOTHES",
		),
        "OFFERS_FIELD_CODE" => array(
            0 => "",
        ),
        "OFFERS_PROPERTY_CODE" => array(
			0 => "ARTNUMBER",
			1 => "COLOR_REF",
			2 => "SIZES_SHOES",
			3 => "SIZES_CLOTHES",
		),
        "OFFERS_SORT_FIELD" => "sort",
        "OFFERS_SORT_FIELD2" => "name",
        "OFFERS_SORT_ORDER" => "asc",
        "OFFERS_SORT_ORDER2" => "asc",
        "OFFERS_LIMIT" => "0",
        "SECTION_ID" => "",
        "SECTION_CODE" => "",
        "SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
        "DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
        "CONVERT_CURRENCY" => "Y",
        "HIDE_NOT_AVAILABLE" => "N",
        "LABEL_PROP" => "SALELEADER",
        "ADD_PICT_PROP" => "MORE_PHOTO",
        "PRODUCT_DISPLAY_MODE" => "Y",
        "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
        "OFFER_TREE_PROPS" => array(
			0 => "ARTNUMBER",
			1 => "COLOR_REF",
			2 => "SIZES_SHOES",
			3 => "SIZES_CLOTHES",
		),
        "PRODUCT_SUBSCRIPTION" => "N",
        "SHOW_DISCOUNT_PERCENT" => "Y",
        "SHOW_OLD_PRICE" => "Y",
        "MESS_BTN_BUY" => "",
        'MESS_BTN_ADD_TO_BASKET' => "",
        "MESS_BTN_SUBSCRIBE" => "",
        "MESS_BTN_DETAIL" => "",
        "MESS_NOT_AVAILABLE" => "",
        "TEMPLATE_THEME" => "",
        "ADD_SECTIONS_CHAIN" => "N",
        "SECTION_USER_FIELDS" => array(
            0 => "",
            1 => "",
        ),
        "SHOW_ALL_WO_SECTION" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "TAB_TYPE" => $TYPE,
        "REQUEST_LOAD" => ($_REQUEST['load'] == "Y") ? "Y" : "N",
    ),
    false
);?>