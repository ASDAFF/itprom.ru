<?
######################################################
# Name: kreattika.shopvk                             #
# (c) 2011-2014 Kreattika, Sedov S.Y.                #
# Dual licensed under the MIT and GPL                #
# http://kreattika.ru/                               #
# mailto:info@kreattika.ru                           #
######################################################
?>
<?
IncludeModuleLangFile(__FILE__);
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/options.php");

if(!$USER->IsAdmin()) return;

	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/kreattika.shopvk/classes/general/autotest.php");

	$module_id = "kreattika.shopvk";
	$strWarning = "";

	$vk_app_id = COption::GetOptionString($module_id, "shop_vk_app_id", "N");

	$all_lib_installed = false;
	$not_installed_lib_name = '';
	if ($curl_lib_installed = ShopVKTEST::_iscurlinstalled()):
	else:
		$not_installed_lib_name .= ' curl';
	endif;
	if ($iconv_lib_installed = ShopVKTEST::_isiconvinstalled()):
	else:
		$not_installed_lib_name .= ' iconv';
	endif;
	if( $curl_lib_installed && $iconv_lib_installed ):
		$all_lib_installed = true;
	else:
		$all_lib_installed = false;
	endif;

	$IBList = array();
	if(CModule::IncludeModule("iblock")):
		$resIB = CIBlock::GetList(Array(), Array('ACTIVE'=>'Y'), false);
		while($arIB = $resIB->Fetch()):
			$IBList[$arIB['ID']] = '[ '.$arIB['ID'].' ] '.$arIB['NAME'];
		endwhile;
	endif;

	$FieldIBList = array();
	$FieldIBList['NAME'] = '[ NAME ] '.GetMessage("KREATTIKA_SHOP_VK_FIELD_NAME_TITLE");
	$FieldIBList['LINK'] = '[ LINK ] '.GetMessage("KREATTIKA_SHOP_VK_LINK_TITLE");
	$FieldIBList['PREVIEW_OR_DETAIL_PICTURE'] = '[ PREVIEW_OR_DETAIL_PICTURE ] '.GetMessage("KREATTIKA_SHOP_VK_FIELD_PREVIEW_OR_DETAIL_PICTURE_TITLE");
	$FieldIBList['PREVIEW_OR_DETAIL_TEXT'] = '[ PREVIEW_OR_DETAIL_TEXT ] '.GetMessage("KREATTIKA_SHOP_VK_FIELD_PREVIEW_OR_DETAIL_TEXT_TITLE");
	$FieldIBList['PREVIEW_PICTURE'] = '[ PREVIEW_PICTURE ] '.GetMessage("KREATTIKA_SHOP_VK_FIELD_PREVIEW_PICTURE_TITLE");
	$FieldIBList['PREVIEW_TEXT'] = '[ PREVIEW_TEXT ] '.GetMessage("KREATTIKA_SHOP_VK_FIELD_PREVIEW_TEXT_TITLE");
	$FieldIBList['DETAIL_PICTURE'] = '[ DETAIL_PICTURE ] '.GetMessage("KREATTIKA_SHOP_VK_FIELD_DETAIL_PICTURE_TITLE");
	$FieldIBList['DETAIL_TEXT'] = '[ DETAIL_TEXT ] '.GetMessage("KREATTIKA_SHOP_VK_FIELD_DETAIL_TEXT_TITLE");

	$PropIBList = array();
	$arPostVKIBList = explode(',', COption::GetOptionString($module_id, "shop_vk_ib", "N"));
	foreach($arPostVKIBList as $IBItemID):
		$IBProperties = CIBlockProperty::GetList(Array("id"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$IBItemID));
		while ($IBPropFields = $IBProperties->GetNext())
		{
			if ( $IBPropFields['PROPERTY_TYPE']=="S" || $IBPropFields['PROPERTY_TYPE']=="N" ):
				$PropIBListPropID = $IBPropFields['ID'];
				$PropIBListPropName = 'PROPERTY_'.$IBPropFields['ID'].'_NAME, PROPERTY_'.$IBPropFields['ID'].'_VALUE';
				$PropIBList[$PropIBListPropID] = '[ '.$PropIBListPropName.' ] '.$IBPropFields['CODE'].' - '.$IBPropFields['NAME'];
			endif;
		}
	endforeach;

	$PropIBListAlbum = array();
	$arAlbumVKIBList = explode(',', COption::GetOptionString($module_id, "shop_vk_album_ib", "N"));
	foreach($arAlbumVKIBList as $IBItemID):
		$IBPropertiesAlbum = CIBlockProperty::GetList(Array("id"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$IBItemID));
		while ($IBPropFields = $IBPropertiesAlbum->GetNext())
		{
			if ( $IBPropFields['PROPERTY_TYPE']=="S" || $IBPropFields['PROPERTY_TYPE']=="N" ):
				$PropIBListPropID = $IBPropFields['ID'];
				$PropIBListPropName = 'PROPERTY_'.$IBPropFields['ID'].'_NAME, PROPERTY_'.$IBPropFields['ID'].'_VALUE';
				$PropIBListAlbum[$PropIBListPropID] = '[ '.$PropIBListPropName.' ] '.$IBPropFields['CODE'].' - '.$IBPropFields['NAME'];
			endif;
		}
	endforeach;

	$boolCatalog = CModule::IncludeModule("catalog");

	$arPricePost = array();
	$rsPricePost=CCatalogGroup::GetList($v1="sort", $v2="asc");
	while($arrPost=$rsPricePost->Fetch()) $arPricePost[$arrPost["ID"]] = "[PRICE_".$arrPost["ID"].'_NAME, PRICE_'.$arrPost["ID"]."_VALUE] ".$arrPost["NAME"]." - ".$arrPost["NAME_LANG"];

	$arPriceAlbum=array();
	$rsPriceAlbum=CCatalogGroup::GetList($v1="sort", $v2="asc");
	while($arrAlbum=$rsPriceAlbum->Fetch()) $arPriceAlbum[$arrAlbum["ID"]] = "[PRICE_".$arrAlbum["ID"].'_NAME, PRICE_'.$arrAlbum["ID"]."_VALUE] ".$arrAlbum["NAME"]." - ".$arrAlbum["NAME_LANG"];

	$tpl = '#NAME#
#LINK#
#PREVIEW_OR_DETAIL_PICTURE#
#PREVIEW_OR_DETAIL_TEXT#';
	$tplalbum = '#NAME#
#LINK#
#PREVIEW_OR_DETAIL_PICTURE#
#PREVIEW_OR_DETAIL_TEXT#';
/////////////////////////////////////////////////////////////////////////////////////////
//* типы значений полей настроек: text, checkbox, selectbox, multiselectbox, textarea *//
/////////////////////////////////////////////////////////////////////////////////////////
	$arAllOptions = array(
        "main" => Array(
		Array("svk_on", GetMessage("KREATTIKA_SVK_ON"), "N", Array("checkbox")),
        ),
        "vkgroup" => Array(
		Array("shop_vk_app_id", GetMessage("KREATTIKA_SHOP_VK_APP_ID"), "", Array("text")),
		Array("shop_vk_owner_id", GetMessage("KREATTIKA_SHOP_VK_OWNER_ID"), "", Array("text")),
		Array("shop_vk_is_group", GetMessage("KREATTIKA_SHOP_VK_IS_GROUP"), "Y", Array("checkbox")),
		Array("shop_vk_post_from_user", GetMessage("KREATTIKA_SHOP_VK_POST_FROM_USER"), "N", Array("checkbox")),
		Array("shop_vk_token", GetMessage("KREATTIKA_SHOP_VK_TOKEN"), "", Array("text", 100)),
		Array("note"=>GetMessage("KREATTIKA_SHOP_VK_NOTE", Array ("#APPID#" => $vk_app_id))),
        ),
        "vk" => Array(
		Array("shop_vk_on", GetMessage("KREATTIKA_SHOP_VK_ON"), "N", Array("checkbox")),
		Array("shop_vk_active_auto_post", GetMessage("KREATTIKA_SHOP_VK_ACTIVE_AUTO_POST"), "Y", Array("checkbox")),
		Array("shop_vk_delete_post", GetMessage("KREATTIKA_SHOP_VK_DELETE_POST"), "N", Array("checkbox")),
		Array("shop_vk_event_log", GetMessage("KREATTIKA_SHOP_VK_EVENT_LOG"), "N", Array("checkbox")),
		Array("shop_vk_ib", GetMessage("KREATTIKA_SHOP_VK_IB"), "", Array("multiselectbox", $IBList)),
		Array("shop_vk_ib_fields", GetMessage("KREATTIKA_SHOP_VK_IB_FIELDS"), "", Array("multiselectbox", $FieldIBList)),
		Array("shop_vk_ib_properties", GetMessage("KREATTIKA_SHOP_VK_IB_PROPERTIES"), "", Array("multiselectbox", $PropIBList)),
		Array("shop_vk_ib_prices", GetMessage("KREATTIKA_SHOP_VK_IB_PRICES"), "", Array("multiselectbox", $arPricePost)),
		Array("shop_vk_tpl", GetMessage("KREATTIKA_SHOP_VK_TPL"), $tpl, Array("textarea", 5, 30)),
        ),
        "vkalbum" => Array(
		Array("shop_vk_album_on", GetMessage("KREATTIKA_SHOP_VK_ALBUM_ON"), "N", Array("checkbox")),
		Array("shop_vk_album_active_auto_post", GetMessage("KREATTIKA_SHOP_VK_ALBUM_ACTIVE_AUTO_POST"), "Y", Array("checkbox")),
		Array("shop_vk_album_delete_album", GetMessage("KREATTIKA_SHOP_VK_ALBUM_DELETE_ALBUM"), "N", Array("checkbox")),
		Array("shop_vk_album_delete_photo", GetMessage("KREATTIKA_SHOP_VK_ALBUM_DELETE_PHOTO"), "N", Array("checkbox")),
		Array("shop_vk_album_event_log", GetMessage("KREATTIKA_SHOP_VK_ALBUM_EVENT_LOG"), "N", Array("checkbox")),
		Array("shop_vk_album_ib", GetMessage("KREATTIKA_SHOP_VK_ALBUM_IB"), "", Array("multiselectbox", $IBList)),
		Array("shop_vk_album_ib_fields", GetMessage("KREATTIKA_SHOP_VK_ALBUM_IB_FIELDS"), "", Array("multiselectbox", $FieldIBList)),
		Array("shop_vk_album_ib_properties", GetMessage("KREATTIKA_SHOP_VK_ALBUM_IB_PROPERTIES"), "", Array("multiselectbox", $PropIBListAlbum)),
		Array("shop_vk_album_ib_prices", GetMessage("KREATTIKA_SHOP_VK_ALBUM_IB_PRICES"), "", Array("multiselectbox", $arPriceAlbum)),
		Array("shop_vk_album_tpl", GetMessage("KREATTIKA_SHOP_VK_ALBUM_TPL"), $tplalbum, Array("textarea", 5, 30)),
        ),
);

	if (!$all_lib_installed):
		$arAllOptions['main'][] = Array("note"=>GetMessage("KREATTIKA_SHOP_VK_LIB_NOTE", Array ("#LIB_NAME#" => $not_installed_lib_name)));
	endif;

	$aTabs = array(
		array("DIV" => "edit1", "TAB" => GetMessage("MAIN_TAB_SET"), "TITLE" => GetMessage("MAIN_TAB_TITLE_SET")),
		array("DIV" => "edit2", "TAB" => GetMessage("MAIN_TAB_RIGHTS"), "ICON" => "kreattika_comments_settings", "TITLE" => GetMessage("MAIN_TAB_TITLE_RIGHTS")),
	);

//Restore defaults
if ($USER->IsAdmin() && $_SERVER["REQUEST_METHOD"]=="GET" && strlen($RestoreDefaults)>0 && check_bitrix_sessid())
{
        COption::RemoveOption($module_id);
}
$tabControl = new CAdminTabControl("tabControl", $aTabs);

function ShowParamsHTMLByArray($module_id, $arParams)
{
        foreach($arParams as $Option)
        {
                 __AdmSettingsDrawRow($module_id, $Option);
        }
}

//Save options
if($REQUEST_METHOD=="POST" && strlen($Update.$Apply.$RestoreDefaults)>0 && check_bitrix_sessid())
{
        if(strlen($RestoreDefaults)>0)
        {
                COption::RemoveOption($module_id);
        }
        else
        {
                foreach($arAllOptions as $aOptGroup)
                {
                        foreach($aOptGroup as $option)
                        {
                                __AdmSettingsSaveOption($module_id, $option);
                        }
                }
        }
        if(strlen($Update)>0 && strlen($_REQUEST["back_url_settings"])>0)
                LocalRedirect($_REQUEST["back_url_settings"]);
        else
                LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".urlencode(LANGUAGE_ID)."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tabControl->ActiveTabParam());
}
?>

<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=htmlspecialchars($mid)?>&amp;lang=<?echo LANG?>">
<?
$tabControl->Begin();
$tabControl->BeginNextTab();
        ?>
	<tr><td colspan="2">
		<div style="padding: 0; border-top: 1px solid #8E8E8E; border-bottom: 1px solid #8E8E8E;  margin-bottom: 15px;">
			<div style="background-color: #fff; opacity: 0.9; height: 30px; padding: 7px; border: 1px solid #fff">
			        <!--<a href="http://kreattika.ru/sale/?solution=shopvk" target="_blank"><img src="/bitrix/modules/kreattika.shopvk/images/kreattika-logo.png" style="float: left; margin-right: 15px;" border="0" /></a>//-->
			        <div style="margin: 5px 0px 0px 0px">
			                <a href="http://kreattika.ru/sale/?solution=shopvk" target="_blank" style="color: #ff6600; font-size: 18px; text-decoration: none"><?=GetMessage("KREATTIKA_AGENSY")?></a>
			        </div>
			</div>
		</div>
	</td></tr>
	<?ShowParamsHTMLByArray($module_id, $arAllOptions["main"]);?>
	<tr class="heading">
		<td colspan="2"><?=GetMessage("KREATTIKA_SHOP_VK_GROUP_TITLE")?></td>
	</tr>
	<?ShowParamsHTMLByArray($module_id, $arAllOptions["vkgroup"]);?>
	<tr class="heading">
		<td colspan="2"><?=GetMessage("KREATTIKA_SHOP_VK_OPT_TITLE")?></td>
	</tr>
	<?ShowParamsHTMLByArray($module_id, $arAllOptions["vk"]);?>
	<tr class="heading">
		<td colspan="2"><?=GetMessage("KREATTIKA_SHOP_VK_ALBUM_TITLE")?></td>
	</tr>
	<?ShowParamsHTMLByArray($module_id, $arAllOptions["vkalbum"]);?>
<?$tabControl->BeginNextTab();?>
<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");?>
<?$tabControl->Buttons();?>
<script language="JavaScript">
function RestoreDefaults()
{
        if(confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>'))
                window.location = "<?echo $APPLICATION->GetCurPage()?>?RestoreDefaults=Y&lang=<?echo LANG?>&mid=<?echo urlencode($mid)?>&<?=bitrix_sessid_get()?>";
}
</script>
<div align="left">
        <input type="hidden" name="Update" value="Y">
        <input type="submit" <?if(!$USER->IsAdmin())echo " disabled ";?> name="Update" value="<?echo GetMessage("MAIN_SAVE")?>">
        <input type="reset" <?if(!$USER->IsAdmin())echo " disabled ";?> name="reset" value="<?echo GetMessage("MAIN_RESET")?>">
        <input type="button" <?if(!$USER->IsAdmin())echo " disabled ";?> title="<?echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" OnClick="RestoreDefaults();" value="<?echo GetMessage("MAIN_RESTORE_DEFAULTS")?>">
</div>
<?$tabControl->End();?>
<?=bitrix_sessid_post();?>
</form>
