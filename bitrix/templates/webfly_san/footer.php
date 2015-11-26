
<?IncludeTemplateLangFile(__FILE__);?>
<!--    Bottom info here -->
<div class="wrapper info-wrapper">
    <div class="information-block"  itemscope itemtype="http://schema.org/Organization">
        <div class="col-left">
            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer/site.php"));?>
            <p style="margin-top: 25px;"><a href="http://seocontext.su" target="_blank"><?=GetMessage("WF_DEVELOPMENT")?></a>:<br/>
                SeoContext.su</p>
        </div>
        <div class="contacts">
            <div class="col20">
                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer/social.php"));?>
            </div>
            <div class="col20">
                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer/paytext.php"));?>
            </div>
            <div class="col20">
                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer/callblock.php"));?>
                <p><span class="small-text"><noindex><a rel="nofollow" href="#"><?=GetMessage("WF_FOOTER_CALL_ME");?></a></noindex></span></p>
            </div>
        </div>
        <div class="text">
            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer/disclaimer.php"));?>
        </div>
    </div>
    <div class="google">
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-45630528-7', 'auto');
            ga('send', 'pageview');

        </script>
    </div>
    <div class="yandex">
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
            try {
            w.yaCounter32630115 = new Ya.Metrika({id:32630115,
            webvisor:true,
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true});
            } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="//mc.yandex.ru/watch/32630115" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    </div>
</div>
<!-- Footer fixed -->
<div class="footer-row">

    <div class="footer-center">
        <div id="footer-feedback-container"  class="block-feedback">
            <?
            $frame = new \Bitrix\Main\Page\FrameBuffered("footer-feedback-container", false);
            $frame->begin('');
            ?>
            <a href="#" class="link-feedback"><span><?=GetMessage("WF_FOOTER_FEEDBACK");?></span></a>
            <div class="popup-feedback" mode="" mode-mess="">
                <?$APPLICATION->IncludeComponent(
                    "webfly:message.add",
                    "main_feed",
                    array(
                        "OK_TEXT" => GetMessage("WF_OK_TEXT"),
                        "EMAIL_TO" => "",
                        "IBLOCK_TYPE" => "feedback",
                        "IBLOCK_ID" => "8",
                        "EVENT_MESSAGE_ID" => array(
                            0 => "38",
                        ),
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "SET_TITLE" => "N"
                    ),
                    false
                );?>


            </div>
            <?
            $frame->end();
            ?>
        </div>
        <div id="bx-composite-banner" style="float: left"></div>
        <div id="footer-right-container">
        <?
        $frame = new \Bitrix\Main\Page\FrameStatic("footer-dynamic");
        $frame->setAnimation(true);
        $frame->setStub("");
        $frame->setContainerId("footer-right-container");
        $frame->startDynamicArea();
        ?>
        <span class="link-top-hold">
          <a href="#" class="link-top"> </a>
          <span class="arrow-grey"> </span>
        </span>
        <?$APPLICATION->IncludeComponent(
            "bitrix:sale.basket.basket.line",
            "footer",
            Array(
                "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
                "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                "SHOW_PERSONAL_LINK" => "N",
                "SHOW_NUM_PRODUCTS" => "Y",
                "SHOW_TOTAL_PRICE" => "Y",
                "SHOW_EMPTY_VALUES" => "N",
                "SHOW_PRODUCTS" => "N",
                "POSITION_FIXED" => "N",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",

            )
        );?>
        <ul class="info">
            <?
            $ant = $APPLICATION->GetCurDir();
            if(substr_count($ant,"/catalog/")>0) $showCompare = true;
            else $showCompare = false;
            $Fav = new wfHighLoadBlock("3");
            $favList = $Fav->elemGet();
            $favCount = count($favList);
            ?>
            <li <?=($showCompare?'':'style="border-right: 1px solid #c2c2c2"')?>>
                <a href="<?=SITE_DIR?>favorites/"><?=GetMessage("WF_FAVORITES")?>:</a>
                <?if($favCount > 0):?>
                    <span class="favCount favCount--active"><?=$favCount?></span>
                <?else:?>
                    <span class="favCount">0</span>
                <?endif;?>
                <span id="fav" class="add-block new"> <?=GetMessage("WF_FAVORITES_ADDED")?> </span>
            </li>
            <?if($showCompare){
                $APPLICATION->ShowViewContent("wf_compare_list");
            }
            ?>
        </ul>
            <?
            $frame->finishDynamicArea();
            ?>
        </div>
    </div>
</div>

<!-- Other -->
<div class="bg"> </div>
<div class="bg2"> </div>
<div id="virtual" class="link-basket"></div>
<div id="virt_checked"></div>
<div class="loader_bg">
    <div class="loader" title="7">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="60px" height="40px" viewBox="0 0 60 40" style="enable-background:new 0 0 50 50;" xml:space="preserve">
        <rect x="0" y="40" width="6" height="15" fill="#333" opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.75s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="15; 30; 15" begin="0s" dur="0.75s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 10; 10" begin="0s" dur="0.75s" repeatCount="indefinite" />
        </rect>
            <rect x="12" y="40" width="6" height="15" fill="#333"  opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.75s" repeatCount="indefinite" />
                <animate attributeName="height" attributeType="XML" values="15; 30; 15" begin="0.15s" dur="0.75s" repeatCount="indefinite" />
                <animate attributeName="y" attributeType="XML" values="10; 10; 10" begin="0.15s" dur="0.75s" repeatCount="indefinite" />
            </rect>
            <rect x="24" y="40" width="6" height="15" fill="#333"  opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.75s" repeatCount="indefinite" />
                <animate attributeName="height" attributeType="XML" values="15; 30; 15" begin="0.3s" dur="0.75s" repeatCount="indefinite" />
                <animate attributeName="y" attributeType="XML" values="10; 10; 10" begin="0.3s" dur="0.75s" repeatCount="indefinite" />
            </rect>
            <rect x="36" y="40" width="6" height="15" fill="#333"  opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.45s" dur="0.75s" repeatCount="indefinite" />
                <animate attributeName="height" attributeType="XML" values="15; 30; 15" begin="0.45s" dur="0.75s" repeatCount="indefinite" />
                <animate attributeName="y" attributeType="XML" values="10; 10; 10" begin="0.45s" dur="0.75s" repeatCount="indefinite" />
            </rect>
            <rect x="48" y="40" width="6" height="15" fill="#333"  opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.6s" dur="0.75s" repeatCount="indefinite" />
                <animate attributeName="height" attributeType="XML" values="15; 30; 15" begin="0.6s" dur="0.75s" repeatCount="indefinite" />
                <animate attributeName="y" attributeType="XML" values="10; 10; 10" begin="0.6s" dur="0.75s" repeatCount="indefinite" />
            </rect>
      </svg>
    </div>
</div>
</body>
</html>