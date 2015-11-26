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
class ShopVK {

	//постинг на стену группы
	public function wall_post( $desc, $photo, $link, $flGroup='Y', $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		global $APPLICATION;
		$MODULE_ID = "kreattika.shopvk";

		$desc = iconv(SITE_CHARSET, "UTF-8//TRANSLIT", $desc);
		$token = COption::GetOptionString($MODULE_ID, "shop_vk_token", "N");
		$group_id = COption::GetOptionString($MODULE_ID, "shop_vk_owner_id", "N");
		$fl_is_group = COption::GetOptionString($MODULE_ID, "shop_vk_is_group", "Y");
		$fl_post_from_user = COption::GetOptionString($MODULE_ID, "shop_vk_post_from_user", "N");
		$post_from_user = 1;
		$post_from_signed = 0;

		if($flGroup=='Y' && $fl_is_group=='Y'):
			$owner_id = -$group_id;
			if($fl_post_from_user=='Y'):
				$post_from_user = 0;
				$post_from_signed = 1;
			else:
				$post_from_user = 1;
				$post_from_signed = 0;
			endif;
		else:
			$owner_id = $group_id;
		endif;

		if ( $token == 'N' || $group_id == 'N' ):
		else:

			#$attach = 'photo-' . $group_id . '_' . $photo . ',' . $link;
			$attach = '';

			if ( !empty($photo) ):
				$photo_id = ShopVK::upload_wall_photo($photo, '', '', 'N');
				$attach = $photo_id;
				#$photo_id = ShopVK::upload_photo($photo, '', '');
				#$attach = 'photo-' . $group_id . '_' . $photo_id;
			endif;

			$data = json_decode(
						ShopVK::execute(
							'wall.post',
							array(
								'access_token' => $token,
								'owner_id' => $owner_id,
								'from_group' => $post_from_user,
								'signed' => $post_from_signed,
								'message' => $desc,
								'attachments' => $attach
							),
							'N'
						)
					);

			if( isset( $data->error ) ) {
				return ShopVK::error( $data );
			}
			return $data->response->post_id;
		endif;

	}

	//изменение поста на стене группы
	public function wall_edit_post( $post_id, $desc, $photo, $link, $flGroup='Y', $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		global $APPLICATION;
		$MODULE_ID = "kreattika.shopvk";

		$desc = iconv(SITE_CHARSET, "UTF-8//TRANSLIT", $desc);
		$token = COption::GetOptionString($MODULE_ID, "shop_vk_token", "N");
		$group_id = COption::GetOptionString($MODULE_ID, "shop_vk_owner_id", "N");
		$fl_is_group = COption::GetOptionString($MODULE_ID, "shop_vk_is_group", "Y");
		$fl_post_from_user = COption::GetOptionString($MODULE_ID, "shop_vk_post_from_user", "N");
		$post_from_user = 1;
		$post_from_signed = 0;

		if($flGroup=='Y' && $fl_is_group=='Y'):
			$owner_id = -$group_id;
			if($fl_post_from_user=='Y'):
				$post_from_user = 0;
				$post_from_signed = 1;
			else:
				$post_from_user = 1;
				$post_from_signed = 0;
			endif;
		else:
			$owner_id = $group_id;
		endif;

		if ( $token == 'N' || $group_id == 'N' ):
		else:

			#$attach = 'photo-' . $group_id . '_' . $photo . ',' . $link;
			$attach = '';

			if ( !empty($photo) ):
				$photo_id = ShopVK::upload_wall_photo($photo, '', '', 'N');
				$attach = $photo_id;
				#$photo_id = ShopVK::upload_photo($photo, '', '');
				#$attach = 'photo-' . $group_id . '_' . $photo_id;
			endif;

			$data = json_decode(
						ShopVK::execute(
							'wall.edit',
							array(
								//'access_token' => $token,
								'post_id' => $post_id,
								'owner_id' => $owner_id,
								'signed' => $post_from_signed,
								'message' => $desc,
								'attachments' => $attach
							),
							'N'
						)
					);

			if( isset( $data->error ) ) {
				return ShopVK::error( $data );
			}
			return $data->response;
		endif;

	}

	//удаление записи на стене
	public function wall_delete_post( $id, $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		global $APPLICATION;
		$MODULE_ID = "kreattika.shopvk";
		$token = COption::GetOptionString($MODULE_ID, "shop_vk_token", "N");
		$group_id = COption::GetOptionString($MODULE_ID, "shop_vk_owner_id", "N");
		$fl_is_group = COption::GetOptionString($MODULE_ID, "shop_vk_is_group", "Y");

		if($fl_is_group=='Y'):
			$owner_id = -$group_id;
		else:
			$owner_id = $group_id;
		endif;

		$data = json_decode(
					ShopVK::execute(
						'wall.delete',
						array(
							'access_token' => $token,
							'owner_id' => $owner_id,
							'post_id' => $id
						),
						'N'
					)
				);
		if( isset( $data->error ) ) {
			return ShopVK::error( $data );
		}
		return $data->response;
	}

	//создание альбома
	public function create_album( $name, $desc, $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		global $APPLICATION;
		$MODULE_ID = "kreattika.shopvk";

		$name = iconv(SITE_CHARSET, "UTF-8//TRANSLIT", $name);
		$desc = iconv(SITE_CHARSET, "UTF-8//TRANSLIT", $desc);
		$group_id = COption::GetOptionString($MODULE_ID, "shop_vk_owner_id", "N");
		$fl_is_group = COption::GetOptionString($MODULE_ID, "shop_vk_is_group", "Y");

		$data = json_decode(
					ShopVK::execute(
						'photos.createAlbum',
						array(
							'title' => $name,
							'gid' => $group_id,
							'description' => $desc,
							'comment_privacy' => 1,
							'privacy' => 1
						),
						'N'
					)
				);
		if( isset( $data->error ) ) {
			return ShopVK::error( $data );
		}
		return $data->response->aid;
	}

	//удаление фотографии
	public function delete_album( $album_id, $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		global $APPLICATION;
		$MODULE_ID = "kreattika.shopvk";

		$group_id = COption::GetOptionString($MODULE_ID, "shop_vk_owner_id", "N");
		$fl_is_group = COption::GetOptionString($MODULE_ID, "shop_vk_is_group", "Y");
		$token = COption::GetOptionString($MODULE_ID, "shop_vk_token", "N");

		/*
		if($fl_is_group=='Y'):
			$owner_id = -$group_id;
		else:
			$owner_id = $group_id;
		endif;
		*/
		$owner_id = $group_id;

		if ( $token == 'N' || $group_id == 'N' ):
		else:
			$data = json_decode(
						ShopVK::execute(
							'photos.deleteAlbum',
							array(
								'group_id' => $owner_id,
								'album_id' => $album_id
							),
							'N'
						)
					);
			if( isset( $data->error ) ) {
				return ShopVK::error( $data );
			}

			return $data->response;
		endif;
	}

	//получение кол-ва фотографий в альбоме
	public function get_album_size( $id, $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		global $APPLICATION;
		$MODULE_ID = "kreattika.shopvk";

		$group_id = COption::GetOptionString($MODULE_ID, "shop_vk_owner_id", "N");
		$fl_is_group = COption::GetOptionString($MODULE_ID, "shop_vk_is_group", "Y");

		if($fl_is_group=='Y'):
			$owner_id = -$group_id;
		else:
			$owner_id = $group_id;
		endif;

		$data = json_decode(
					ShopVK::execute(
						'photos.getAlbums',
						array(
							'oid' => $owner_id,
							'aids' => $id
						),
						'N'
					)
				);
		if( isset( $data->error ) ) {
			return ShopVK::error( $data );
		}
		return $data->response['0']->size;
	}

	//поиск альбома shop_upload, создание при его отсутствии
	public function get_shop_vk_album( $id, $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		global $APPLICATION;
		$MODULE_ID = "kreattika.shopvk";

		$group_id = COption::GetOptionString($MODULE_ID, "shop_vk_owner_id", "N");
		$fl_is_group = COption::GetOptionString($MODULE_ID, "shop_vk_is_group", "Y");

		if($fl_is_group=='Y'):
			$owner_id = -$group_id;
		else:
			$owner_id = $group_id;
		endif;

		$data = json_decode(
					ShopVK::execute(
						'photos.getAlbums',
						array(
							'oid' => $owner_id,
							'aids' => $id
						),
						'N'
					)
				);
		if( isset( $data->error ) ) {
			return ShopVK::error( $data );
		}

		$find_shop_vk_album = false;
		if ( is_object($data) ):
			$arData = get_object_vars($data);
			if ( is_array($arData['response']) ):
				foreach($arData['response'] as $DataItem):
					if ( is_object($DataItem) ):
						$arDataItemFields = get_object_vars($DataItem);
						if ($arDataItemFields['title'] == 'shop'):
							$find_shop_vk_album = $arDataItemFields['aid'];
							break;
						endif;
					endif;
				endforeach;
			endif;
		endif;

		if($find_shop_vk_album):
			return $find_shop_vk_album;
		else:
			return ShopVK::create_album('shop', '', 'N');
		endif;
	}

	//загрузка фотографии
	public function upload_photo( $file, $album_id, $desc, $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		global $APPLICATION;
		$MODULE_ID = "kreattika.shopvk";

		if ( empty($album_id) ):
			$album_id = ShopVK::get_shop_vk_album('', 'N');
		endif;

		$desc = iconv(SITE_CHARSET, "UTF-8//TRANSLIT", $desc);
		$group_id = COption::GetOptionString($MODULE_ID, "shop_vk_owner_id", "N");
		$token = COption::GetOptionString($MODULE_ID, "shop_vk_token", "N");

		if ( $token == 'N' || $group_id == 'N' ):
		else:
			$data = json_decode(
						ShopVK::execute(
							'photos.getUploadServer',
							array(
								'aid' => $album_id,
								'gid' => $group_id,
								'save_big' => 1
							),
							'N'
						)
					);
			if( isset( $data->error ) ) {
				return ShopVK::error( $data );
			}
			$ch = curl_init( $data->response->upload_url );
			curl_setopt ( $ch, CURLOPT_HEADER, false );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt ( $ch, CURLOPT_POST, true );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, array( 'file1' => '@' . $file ) );
			$data = curl_exec($ch);
			curl_close($ch);
			$data = json_decode( $data );
			if( isset( $data->error ) ) {
				return ShopVK::error( $data );
			}
			$data = json_decode(
						ShopVK::execute(
							'photos.save',
							array(
								'aid' => $album_id,
								'gid' => $group_id,
								'server' => $data->server,
								'photos_list' => $data->photos_list,
								'hash' => $data->hash,
								'caption' => $desc
							),
							'N'
						)
					);

			if( isset( $data->error ) ) {
				return ShopVK::error( $data );
			}
			return $data->response['0']->pid;
		endif;
	}

	//удаление фотографии
	public function delete_photo( $photo_id, $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		global $APPLICATION;
		$MODULE_ID = "kreattika.shopvk";

		$group_id = COption::GetOptionString($MODULE_ID, "shop_vk_owner_id", "N");
		$fl_is_group = COption::GetOptionString($MODULE_ID, "shop_vk_is_group", "Y");
		$token = COption::GetOptionString($MODULE_ID, "shop_vk_token", "N");

		if($fl_is_group=='Y'):
			$owner_id = -$group_id;
		else:
			$owner_id = $group_id;
		endif;

		if ( $token == 'N' || $group_id == 'N' ):
		else:
			$data = json_decode(
						ShopVK::execute(
							'photos.delete',
							array(
								'owner_id' => $owner_id,
								'photo_id' => $photo_id
							),
							'N'
						)
					);
			if( isset( $data->error ) ) {
				return ShopVK::error( $data );
			}

			return $data->response;
		endif;
	}

	//загрузка фотографии на стену сообщества или пользователя
	public function upload_wall_photo( $file, $owner_id, $flGroup='Y', $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		global $APPLICATION;
		$MODULE_ID = "kreattika.shopvk";

		$desc = iconv(SITE_CHARSET, "UTF-8//TRANSLIT", $desc);
		$group_id = COption::GetOptionString($MODULE_ID, "shop_vk_owner_id", "N");
		$token = COption::GetOptionString($MODULE_ID, "shop_vk_token", "N");

		if ( $token == 'N' || $group_id == 'N' ):
		else:
			$data = json_decode(
						ShopVK::execute(
							'photos.getWallUploadServer',
							array(
								'gid' => $group_id,
								'save_big' => 1
							),
							'N'
						)
					);
			if( isset( $data->error ) ) {
				return ShopVK::error( $data );
			}
			$ch = curl_init( $data->response->upload_url );
			curl_setopt ( $ch, CURLOPT_HEADER, false );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt ( $ch, CURLOPT_POST, true );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, array( 'file1' => '@' . $file ) );
			$data = curl_exec($ch);
			curl_close($ch);
			$data = json_decode( $data );
			if( isset( $data->error ) ) {
				return ShopVK::error( $data );
			}
			$data = json_decode(
						ShopVK::execute(
							'photos.saveWallPhoto',
							array(
								'gid' => $group_id,
								'server' => $data->server,
								'photo' => $data->photo,
								'hash' => $data->hash
							),
							'N'
						)
					);

			if( isset( $data->error ) ) {
				return ShopVK::error( $data );
			}
			return $data->response['0']->id;
		endif;
	}

	private function execute( $method, $params, $flAutotest='Y' ) {

		if ( $flAutotest=='Y' ):
			if (!$all_lib_installed = ShopVKTEST::_AllLibInstalled()):
				return false;
			endif;
		endif;

		$MODULE_ID = "kreattika.shopvk";
		$token = COption::GetOptionString($MODULE_ID, "shop_vk_token", "N");
		if ( $token == 'N' ):
		else:
			$ch = curl_init( 'https://api.vk.com/method/' . $method . '?access_token=' . $token );
			curl_setopt ( $ch, CURLOPT_HEADER, false );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt ( $ch, CURLOPT_POST, true );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params );
			$data = curl_exec($ch);
			curl_close($ch);
#echo $data;
			return $data;
		endif;
	}
	private function error( $data ) {
		//обработка ошибок
		return false;
	}
}
?>