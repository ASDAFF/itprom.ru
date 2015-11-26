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
class ShopVKTEST {
	function _AllLibInstalled() {
			if  ( ShopVKTEST::_iscurlinstalled() && ShopVKTEST::_isiconvinstalled() ) {
					return true;
			}
			else{
					return false;
			}
	}
	function _iscurlinstalled() {
			if  (in_array  ('curl', get_loaded_extensions())) {
					return true;
			}
			else{
					return false;
			}
	}
	function _isiconvinstalled() {
			if  (in_array  ('iconv', get_loaded_extensions())) {
					return true;
			}
			else{
					return false;
			}
	}
}
?>