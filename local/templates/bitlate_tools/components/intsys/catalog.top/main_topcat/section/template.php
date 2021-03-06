<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @var string $strElementEdit */
/** @var string $strElementDelete */
/** @var array $arElementDeleteParams */
/** @var array $arSkuTemplate */
/** @var array $templateData */
//error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
//ini_set("display_errors", 1);


//test_dump($arResult["ITEMS"]);
//foreach ($arResult["ITEMS"] as $item) {
//  test_dump($item["IBLOCK_SECTION_ID"]);
//}

global $APPLICATION;
$Fav = new wfHighLoadBlock(3);
$favList = $Fav->elemGet();
$favIds = array();
foreach($favList as $fv){
  $favIds[$fv["ID"]] = $fv["UF_FAV_ID"];
}
$arResult["FAVS"] = array_flip($favIds);
?>
<ul class="tab-list">
  <li><a href="javascript:void(0);"  class="active" data-selector="wf-hit"><span class="icon40px icon-hits"></span><strong><?=GetMessage("WF_HIT_WARES")?></strong></a></li>
  <li><a href="javascript:void(0);"  data-selector="wf-new"><span class="icon40px icon-new"></span><strong><?=GetMessage("WF_NEW_WARES")?></strong></a></li>
  <li><a href="javascript:void(0);" data-selector="wf-sale"><span class="icon40px icon-sale"></span><strong><?=GetMessage("WF_SALE_WARES")?></strong></a></li>
</ul>
<div class="tab-holder">
  <div class="scroll-pane">
    <span class="tab-shadow"> </span>
    <div class="tab active">
      <div class="product-catalog">
        <ul class="pCat">
          <?
          foreach ($arResult['ITEMS'] as $key => $arItem){
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
            $strMainID = $this->GetEditAreaId($arItem['ID']);
            $isNew = $arItem["PROPERTIES"]["NEWPRODUCT"]["VALUE"] == GetMessage("WF_DA");
            $isHit = $arItem["PROPERTIES"]["SALELEADER"]["VALUE"] == GetMessage("WF_DA");
            $isSale = $arItem["PROPERTIES"]["SPECIALOFFER"]["VALUE"] == GetMessage("WF_DA");
            if(!($isHit or $isNew or $isSale)){
              continue;
            }
            $isOffers = count($arItem["OFFERS"])>0;
            $arItemIDs = array(
              'ID' => $strMainID,
              'PICT' => $strMainID.'_pict',
              'SECOND_PICT' => $strMainID.'_secondpict',
              'MAIN_PROPS' => $strMainID.'_main_props',

              'QUANTITY' => $strMainID.'_quantity',
              'QUANTITY_DOWN' => $strMainID.'_quant_down',
              'QUANTITY_UP' => $strMainID.'_quant_up',
              'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
              'BUY_LINK' => $strMainID.'_buy_link',
              'SUBSCRIBE_LINK' => $strMainID.'_subscribe',

              'PRICE' => $strMainID.'_price',
              'DSC_PERC' => $strMainID.'_dsc_perc',
              'SECOND_DSC_PERC' => $strMainID.'_second_dsc_perc',

              'PROP_DIV' => $strMainID.'_sku_tree',
              'PROP' => $strMainID.'_prop_',
              'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
              'BASKET_PROP_DIV' => $strMainID.'_basket_prop'
            );

            $strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
            $strTitle = (
              isset($arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]) && '' != isset($arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"])
              ? $arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]
              : $arItem['NAME']
            );
            $classes = "";
            $style = "";
            if($isNew) $classes .= "wf-new ";
            if($isHit){
              $classes .= " wf-hit ";
              if(!$isNew) $classes .= " myHide ";
            }
            if($isSale){
              $classes .= " wf-sale ";
              if(!$isNew) $classes .= " myHide ";
            }

          ?>
            <li class="bx_catalog_item <?=$classes?>" id="<?= $strMainID?>">
              <div class="hold">
                <div class="visual">
                  <a href="<?= $arItem['DETAIL_PAGE_URL']?>">
                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']?>" width="235" height="194" alt="<?=$strTitle?>" id="<?= $arItemIDs['PICT']?>"/>
                    <div class="labels">
                    <?if($isNew):?><span class="new"><?=$arItem["PROPERTIES"]["NEWPRODUCT"]["NAME"]?></span><?endif;?>
                    <?if($isHit):?><span class="hit"><?=$arItem["PROPERTIES"]["SALELEADER"]["NAME"]?></span><?endif;?>
                    <?if($isSale):?><span class="sale"><?=$arItem["PROPERTIES"]["SPECIALOFFER"]["NAME"]?></span><?endif;?>
                    </div>
                  </a>
                </div>
                <div class="block">
                  <div class="description">
                    <a href="<?= $arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                  </div>
                  <div class="box">
                    <div class="col-left">
                      <?
                      $discPrice = ceil($arItem['MIN_PRICE']['DISCOUNT_VALUE']);
                      $minPrice = ceil($arItem['MIN_PRICE']['VALUE']);
                      if($minPrice > $discPrice):?> 
                      <span class="price" id="<?=$arItemIDs['PRICE']?>"><span class="my-digit"><?=$discPrice?></span> <span class="rouble">⃏</span>
                        <noindex><span class="oldPrice"><?=$minPrice?> </span></noindex>
                      </span>
                      <?else:?>
                        <span class="price" id="<?=$arItemIDs['PRICE']?>"><span class="my-digit"><?=$minPrice?></span> <span class="rouble">⃏</span></span>
                      <?endif;?>
                      <?if ($arItem["CAN_BUY"]):?>
                        <span class="available"></span>
                        </div>
                        <a href="javascript:void(0);" id="<?= $arItemIDs['BUY_LINK']; ?>" 
                           class="link-basket<?if($isOffers):?> no-animation<?endif?>" data-wareid="<?=$arItem["ID"]?>"
                           rel="nofollow"><?=$arParams["MESS_BTN_BUY"]?></a>
                      <?else:?>
                        <span class="expected"><?=$arParams["MESS_NOT_AVAILABLE"]?></span>
                        </div>
                        <a href="javascript:void(0);" class="link-question" rel="nofollow">?</a>
                      <?endif;?>
                  </div>
                  <form class="dop_options" method="post" action="">
                    <?
                    if($USER->IsAuthorized()){
                      $disabled = "";
                    }else{
                      $disabled = "disabled";
                    }
                    if(in_array($arItem["ID"],array_flip($arResult["FAVS"]))){
                      $checked = "checked";
                      $favVal = $arResult["FAVS"][$arItem["ID"]];
                    }else{
                      $checked = "";
                      $favVal = $arItem["ID"];
                    }
                    ?>
                    <input type="checkbox" id="ch2<?=$key?>" class="fav checkbox" name="my_fav[]" data-count="favCount" value="<?=$favVal?>" elem-val="<?=$arItem["ID"]?>" <?=$checked?> <?=$disabled?>/>
                    <label for="ch2<?=$key?>" class="myChb" hitro-label><?=GetMessage("WF_FAVORITES")?></label>
                  </form>
                </div>
              </div>
            </li>
            <?
            $emptyProductProperties = empty($arItem['PRODUCT_PROPERTIES']);
            ?>
          <?}?>
        </ul>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $(".link-basket").on("click",function(){
      <?if($isOffers):?>
        location.href = "<?=$arItem["DETAIL_PAGE_URL"]?>";
      <?else:?>
        var wareId = $(this).data("wareid");
        if(!wareId) return false;
        $.post("<?=$APPLICATION->GetCurDir()?>",{"action":"ADD2BASKET", "id":wareId, "ajax_basket": "Y"},function(data){
          BX.onCustomEvent('OnBasketChange');
        });
      <?endif?>
    });
    $("body").on("change",".fav",function(){
      var url = "<?=SITE_TEMPLATE_PATH?>/ajax/favorites.php";
      var requestData = {};
      var elem = $(this).val();
      var elemVal = $(this).attr("elem-val");
      var that = $(this);
      if($(this).is(":checked")){
        requestData = {elemId:elem, action:"add"};
        $.post(url,requestData,function(d){
          that.val(d);
        });
      }else{
        requestData = {elemId:elem, action:"delete"};
        $.post(url,requestData,function(d){
          that.val(elemVal);
          subsFav();
        });
      }
    });
    $("body").on("click",".dop_options .myChb",function(){
      var fora = $(this).attr("for");
      if($("#"+fora).is(":disabled")) alert("<?=GetMessage("WF_AUTHORIZE")?>");
    });
  });
</script>