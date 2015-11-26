<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "термошкаф, термошкаф электрический, термошкафы для оборудования, термошкаф купить, термошкафы для оборудования связи, термошкаф балконный, термошкаф настенный, термошкаф лабораторный, термошкаф купить в москве, всепогодный термошкаф, вакуумный термошкаф");
$APPLICATION->SetPageProperty("title", "Термошкафы ITProm");
$APPLICATION->SetPageProperty("description", "Купить термошкафы ITProm по лучшей цене с доставкой по Москве и в регионы. Огромный каталог термошкафов ITProm от производителя.");
$APPLICATION->SetTitle("Термошкафы ITProm");
?><div class="wrapper">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main_slider",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "Y",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"NEWS_COUNT" => "1",
		"PAGER_DESC_NUMBERING" => "Y",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"STATIC",1=>"SLIDES",2=>"LINKS",3=>"LINKS_PIC"),
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC"
	)
);?>
</div>
 <!--  Special block -->
<div class="wrapper">
	<div class="promo">
		<div class="row">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_DIR."include/top_categories.php"
	)
);?>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="main-holder">
		<div class="container">
			<div class="container-hold container-hold-index">
				 <!--    Left column starts here -->
				<div class="blog-col">
					 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main_blog",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "main_blog",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "2",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
					<div class="block-type02">
						 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main_news",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"NEWS_COUNT" => "2",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
					</div>
				</div>
				 <!--   MainContent (tabs) starts here -->
				<div class="tabset">
					 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top",
	"main_topcat",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"BASKET_URL" => "/personal/cart/",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"DETAIL_URL" => "",
		"DISPLAY_COMPARE" => "N",
		"ELEMENT_COUNT" => "150",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "name",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "catalog",
		"LABEL_PROP" => "-",
		"LINE_ELEMENT_COUNT" => "3",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Ожидается",
		"OFFERS_CART_PROPERTIES" => array(),
		"OFFERS_FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"NAME",3=>"SORT",4=>"",),
		"OFFERS_LIMIT" => "0",
		"OFFERS_PROPERTY_CODE" => array(0=>"ARTNUMBER",1=>"MORE_PHOTO",2=>"SIZE_GENERAL",3=>"",),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "timestamp_x",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(0=>"BASE",),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PROPERTY_CODE" => array(0=>"NEWPRODUCT",1=>"SALELEADER",2=>"SPECIALOFFER",3=>"",),
		"ROTATE_TIMER" => "30",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PAGINATION" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "site",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"VIEW_MODE" => "SECTION"
	)
);?> <!-- SEO-article goes here --> <style>
				.text-description-content {
					overflow: hidden;
					position: relative;
					text-align: justify;
					padding:45px 35px 0px 35px;
					color:#787878;
					font: 15px/20px 'ubunturegular', Arial, Helvetica, sans-serif;
				}
				.box-hide {
					max-height: 135px;
				}
				.text-description-more {
					text-align: right;
					font: 16px/20px 'ubunturegular', Arial, Helvetica, sans-serif;
					padding:20px 35px 45px 0px;
				}

			</style> <script type="text/javascript">
				function seoshowmore() {
					$("#short_text").switchClass("box-hide", "box-show");
				}
			</script>
					<div id="text-description-page" class="text-description-page">
						<div id="short_text" class="text-description-content box-hide">
							<h1>Термошкафы ITProm</h1>
							<p>
								 Для размещения электронного и других видов оборудования вне помещений используется <strong>термошкаф</strong>, который предназначается для защиты содержимого от разнообразных климатических условий.
							</p>
							<p>
								 Для того чтобы измерительное, контрольное или управляющее оборудование могло долго и надежно работать, ему необходимо создать определенные условия функционирования. К сожалению, климатические и погодные особенности большей части нашей страны не могут характеризоваться как оптимальные. Длительные и сильные морозы, частые дожди и снегопады, пыльные бури, высокие летние температуры и прочие природные испытания могут отрицательно отразиться на точности аппаратуры и сроках ее эксплуатации. В связи с этим большинство оборудования, которое работает под открытым небом, нуждается в дополнительной защите и для этого используются <strong>термошкафы для оборудования ITProm</strong>. Компания ITProm считается одним из лучших российских поставщиков промышленного оборудования, в том числе термошкафов. Компания реализует&nbsp;<a title="шкаф всепогодный" href="https://itprom.ru/catalog/termoshkafi/">шкаф всепогодный</a> различных серий в зависимости от целей использования.
							</p>
							<h2>Назначение защитного оборудования</h2>
							<p>
								 Термошкафы применяются для защиты электронного оборудования, работающего в системах контроля, видеонаблюдения, Wi-Fi, охраны периметра, оптоволоконных линий связи, телекоммуникационного сообщения, автоматизации и аналогичных приборов.
							</p>
							<p>
								 Основное назначение термошкафов – это защита оборудования от различных факторов:
							</p>
							<ul>
								<li>В зимнее время термошкаф электрический обеспечивает обогрев размещенных в них приборов естественным путем или с помощью электрических нагревательных приборов;</li>
								<li>Благодаря надежным герметичным корпусам термошкафы защищают приборы от попадания влаги, пыли и посторонних приборов внутрь действующих конструкций приборов;</li>
								<li> Для климатических зон с жарким и продолжительным летом, рекомендуется <strong>термошкаф купить</strong>, оснащенный кондиционерами для принудительного снижения температуры внутри шкафа, где работает оборудование;</li>
								<li>От физического воздействия или хищения помогают термошкафы с антивандальными корпусами, <a title="взрывозащищенный шкаф" href="https://itprom.ru/catalog/termoshkafi_antivandalniye/">взрывозащищенный шкаф</a> обладает&nbsp;повышенной прочностью, значительным весом, усиленными скрытыми дверными петлями и специальными сейфовыми замками.</li>
								<li> Надежные металлические корпуса служат эффективной защитой от ультрафиолетового излучения, которое может негативно отразиться на точности работы оборудования;</li>
								<li>Взрывобезопасные термошкафы, которые разрешено устанавливать на производствах, обладающих повышенными рисками в отношение взрывоопасности;</li>
								<li> Термочехлы, которые отличаются использованием мягких материалов и плотным прилеганием чехла к помещенному внутрь оборудованию.</li>
								<li>MINI шкафы для компактных приборов, размеры которых не превышают 28 см в ширину.</li>
							</ul>
							<h2>Ассортимент термошкафов</h2>
							<p>
								 Выпускается более тысячи различных модификаций термошкафов ITProm, которые отличаются по своим размерам, конструкционным особенностям и комплектации.
							</p>
							<p>
								 Все модели можно распределить в несколько основных групп, которые отличаются по сложности и наличии дополнительных возможностей.
							</p>
							<ul>
								<li> В первую группу входят простейшие термошкафы, которые состоят их металлического корпуса и не обладают дополнительным оборудованием. Такие шкафы относятся к категории эконом оборудования и могут использоваться в наиболее стабильных климатических условиях с умеренными температурами. </li>
								<li>Следующая группа оснащена простейшими система обогрева. Такой <strong>термошкаф электрический</strong> способен поддерживать стабильную температуру внутри и размещенное в нем оборудование может работать при температурах до -60 оС. В таких шкафах размещают оборудование, которое в процессе работы не выделяет тепла и нуждается в постороннем обогреве. </li>
								<li> Более совершенной группой являются термошкафы для оборудования, оснащенные системами электрического нагрева и естественной вентиляцией. <a title="шкаф телекоммуникационный" href="https://itprom.ru/catalog/termoshkafi_19/">Шкаф телекоммуникационный</a> обладает особенностями, а именно, они обеспечивают охлаждение только в условиях, когда внешняя температура ниже, чем внутри шкафа. </li>
								<li> Наиболее удобная и функциональная группа – это термошкафы, в которых установлены системы кондиционирования. Такие устройства включаются на обогрев при низких температурах и на охлаждение, если температура внутри шкафа превышает оптимальные значения. Недостатком этого оборудования является более высокая энергоемкость и стоимость, но благодаря им значительно увеличиваются сроки работы помещенных приборов и эффективность их функционирования. Данная группа классифицируется как группа «Стандарт» В отношении влажности и пыли термошкафы имеют классы защиты IP66-69 и IP54, в зависимости от наличия вентиляционного оборудования. </li>
							</ul>
							<p>
								 Различные габариты шкафов выпускаются в следующих диапазонах:
							</p>
							<ul>
								<li>Высота - от 30 до 220 см</li>
								<li> Ширина - от 20 до 160 см</li>
								<li> Глубина – от 15 до 100 см</li>
							</ul>
							<h2>Преимущества продукции ITProm</h2>
							<p>
								 Все оборудование от производителя ITProm имеет сертификаты соответствия на каждое наименование продукции.
							</p>
							<p>
								 В зависимости от комплектации термошкафы могут обеспечивать работу оборудования в температурных режимах от -50<sup>о</sup> до +60<sup>о</sup>&nbsp;С и при влажности до 95%, при этом в для разных видов шкафов&nbsp;необходимо разное <a title="комплектующие для телекоммуникационных шкафов" href="https://itprom.ru/catalog/aksessuary-dlya-termoshkafov/">комплектующие для телекоммуникационных шкафов</a>.
							</p>
							<p>
								 В зависимости от формы и размеров <strong>термошкафы для оборудования</strong> могут располагаться на монтажных панелях, шасси, выступать как подвесные конструкции или в виде 19'' формата. Их можно крепить к любой горизонтальной или вертикальной поверхности, включая стены, полы и мачты. Устанавливаются термошкафы как под открытым небом, так и в неотапливаемых помещениях.
							</p>
							<p>
								 Для комплектации шкафов используются детали и комплектующие от известных производителей, в том числе таких марок как LS, ILLCA, Stego, Rittal, Moeller.
							</p>
							 Компания предлагает услуги по индивидуальному изготовлению термошкафов по проектам и технологическим условиям заказчика. Такие модели можно заказывать как мелкими партиями, так и в единичных экземплярах.
							<p>
							</p>
							<p>
								 Любой термошкаф купить можно по вполне доступной цене, широко используются системы скидок при оптовых покупках и для постоянных покупателей.
							</p>
						</div>
						<div class="text-description-more">
 <a onclick="seoshowmore()" rel="nofollow" href="#text-description-page" id="short_text_show_link" class="novisited arrow-link text-description-more-link"> <span class="xhr arrow-link-inner">Читать полностью</span>&nbsp;→ </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>