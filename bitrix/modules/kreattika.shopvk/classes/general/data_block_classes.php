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
class CSVKDataBlock {

	public function Add($TableName, $arFields)
	{
		global $DB;
		global $APPLICATION;
		if ( empty($TableName) || !is_array($arFields) || count($arFields) <= 0 ):
			return false;
		endif;
		$arInsert = $DB->PrepareInsert($TableName, $arFields);
		$strSql = "INSERT INTO ".$TableName." (".$arInsert[0].") VALUES (".$arInsert[1].")";
		$DB->Query($strSql, false);
		return intval($DB->LastID());
	}

	public function Update($TableName, $arFields, $ID)
	{
		global $DB;
		global $APPLICATION;
		$ID = intval($ID);
		if ( empty($TableName) || !is_array($arFields) || count($arFields) <= 0 || empty($ID) ):
			return false;
		endif;
		$strUpdate = $DB->PrepareUpdate($TableName, $arFields);
		$strSql = "UPDATE ".$TableName." SET ".$strUpdate." WHERE ID=".$DB->ForSql($ID);
		#$strSql = "UPDATE ".$TableName." SET ".$strUpdate." WHERE ID=".$ID;
		$DB->Query($strSql, false);
	}

	public function GetList($TableName, $arFilter=array())
	{
		global $DB;
		global $APPLICATION;
		if ( empty($TableName) || !is_array($arFilter) ):
			return false;
		endif;
		$strSql = "SELECT * FROM ".$TableName;
		if ( is_array($arFilter) && count($arFilter) > 0):
			$strSql .= " WHERE";
			$countFilterItem = 0;
			foreach ($arFilter as $key=>$value):
				$countFilterItem++;
				#$strSql .= " ".$DB->ForSql($key)."=".$DB->ForSql($value);
				$strSql .= " ".$key."=".$value;
				if ( $countFilterItem < count($arFilter) ):
					$strSql .= " AND";
				endif;
			endforeach;
		endif;
		$res = $DB->Query($strSql, false);
		return $res;
	}

}
?>