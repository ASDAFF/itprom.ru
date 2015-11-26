<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$this->setFrameMode(true);
//////////////////
// Fancy Boxing //
$APPLICATION->AddHeadScript('http://code.jquery.com/jquery-latest.min.js');
$fancypath = '/bitrix/templates/webfly_san/js/fancybox/';

$APPLICATION->AddHeadScript($fancypath."lib/jquery.mousewheel-3.0.6.pack.js");
$APPLICATION->AddHeadScript($fancypath.'source/jquery.fancybox.pack.js?v=2.1.5');
$APPLICATION->SetAdditionalCSS($fancypath.'source/jquery.fancybox.css?v=2.1.5');
//helpers etc
$APPLICATION->SetAdditionalCSS($fancypath.'source/helpers/jquery.fancybox-buttons.css?v=1.0.5');
$APPLICATION->AddHeadScript($fancypath."source/helpers/jquery.fancybox-buttons.js?v=1.0.5");
$APPLICATION->AddHeadScript($fancypath."source/helpers/jquery.fancybox-media.js?v=1.0.6");

$APPLICATION->SetAdditionalCSS($fancypath.'source/helpers/jquery.fancybox-thumbs.css?v=1.0.7');
$APPLICATION->AddHeadScript($fancypath."source/helpers/jquery.fancybox-thumbs.js?v=1.0.7");

?>


<?if ($arResult == null):?>
<div id="content">
  <div class="c1">
    <div class="content-text-inner">
		<h1 style="color:red; font-weight:bold; margin-bottom: 20px; width:100%; text-align:center;">
			Извините! Данный раздел временно недоступен!
		</h1>
    </div>
  </div>
</div>
<?else:?>
<div id="content">
  <div class="c1">
    <div class="content-text-inner">
		<!--<h2 style="margin-bottom: 20px;width:100%;text-align:right;;"><?//=$arResult["PROPERTIES"]["SECTION"]["VALUE"]?></h2>-->
   		<h1><?=$arResult["NAME"]?></h1>
      <?=$arResult["PREVIEW_TEXT"]?>
    </div>
  </div>
</div>
<div id="sidebar">
  <ul class="side-menu">
    <?
    $cat = $prevCat = "";
    foreach($arResult["SIDEBAR"] as $sidebar):
      $cat = $sidebar["SECTION"];
      if($cat != $prevCat):
        if($prevCat != ""):?>
            </ul>
          </li>
        <?endif?>
        <li>
          <h3><?=$cat?></h3>
          <ul>
      <?endif?>
          <?
          $link = "";
          switch (strtoupper($sidebar["NAME"])) {
            case "СОТРУДНИКИ":
             $link = "/about/staff/";
            break;
            case "ГАЛЕРЕЯ РАБОТ":
             $link = "/about/gallery/";
            break;
          }
          ?>

          <?if ($link != ""):?>
            <li><a href="<?=$link?>"><?=$sidebar["NAME"];?></a></li>
          <?elseif (strtoupper($sidebar["NAME"]) == strtoupper($arResult["NAME"])):?>
            <li><p><?=$sidebar["NAME"]?></p></li>
          <?else:?>
            <li><a href="<?=$sidebar["URL"]?>/"><?=$sidebar["NAME"]?></a></li>
          <?endif?>

      <?$prevCat = $cat;?>
    <?endforeach;?>
  </ul>
</div>
<?endif?>