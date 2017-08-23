<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");?>
<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.store",
    ".default",
    array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "COMPONENT_TEMPLATE" => ".default",
        "MAP_TYPE" => "0",
        "PHONE" => "Y",
        "SCHEDULE" => "Y",
        "SEF_FOLDER" => "/company/shops/",
        "SEF_MODE" => "Y",
        "SET_TITLE" => "Y",
        "TITLE" => "Наши магазины",
        "SEF_URL_TEMPLATES" => array(
            "liststores" => "index.php",
            "element" => "#store_id#.html",
        )
    ),
    false
);?>
	<!--<div class="inner-content-contact-right large-4 xxlarge-6 columns">
		 <?/*$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/contacts.php"
	)
);*/?>
		<div id="bx_main_feedback">
			 <?/*$frame = new \Bitrix\Main\Page\FrameHelper("bx_main_feedback", false);
            $frame->begin();*/?> <?/*$APPLICATION->IncludeComponent(
	"bitrix:main.feedback",
	".default",
	Array(
		"EMAIL_TO" => "office@webfly.pro",
		"EVENT_MESSAGE_ID" => array(),
		"OK_TEXT" => "Спасибо, ваш вопрос принят.",
		"REQUIRED_FIELDS" => array(0=>"NAME",1=>"EMAIL",2=>"MESSAGE",),
		"USE_CAPTCHA" => "Y"
	)
);*/?> <?/*$frame->beginStub();*/?> <?/*$frame->end();*/?>
		</div>
	</div>-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>