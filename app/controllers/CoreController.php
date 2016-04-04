<?php

class CoreController extends \BaseController {

	protected $layout 	= 'layout.admin_layout';

	public $confirm_delete = "'Hapus Data Ini?'";

	public $delete_message = "Data berhasil dihapus.";
	
	public $input_success = "Data berhasil disimpan.";
	// protected $layout2 	= 'layout.visitor_layout';


	public function layout()
	{

		return $this->layout;

	}

	public function chiper()
	{
		return Crypt::setCipher('cast-128');
	}

	public function encrypt($str = '')
	{
		// $this->chiper();
		return Crypt::encrypt($str);
	}

	public function decrypt($enc = '')
	{
		return Crypt::decrypt($enc);
	}

	public function makeImage($image = '')
	{

		return Image::make($image);

	}

	public function createImage($image = '', $opt = false, $sb_dir = '', $rz = null)
	{
		if($rz == null){
			$img = $this->makeImage($image->getRealPath());
		}else{
			$img = $this->makeImage($image->getRealPath())->resize($rz, null, function($constraint){
				$constraint->aspectRatio();
			});
		}

		if(!empty($opt)){
			return $img->encode('data-url');
		}else{
			$main_dir = public_path()."/uploaded_images/";
			$sub_dir = $main_dir.$sb_dir;

			if(!file_exists($sub_dir)){
				mkdir($sub_dir);
			}

			$rand = str_random(10).'.jpg';
			$img->save($sub_dir."/".$rand, 75);
			return $rand;
		}
	}

	public function destroyImage($image = '', $sb_dir = '')
	{
		$main_dir = public_path()."/uploaded_images/";
		$sub_dir = $main_dir.$sb_dir;
		File::delete($sub_dir."/".$image);

	}

	public function resizeImages($image)
	{
		return $image->resize(1000, null, function($constraint){
			$constraint->aspectRatio();
		});
	}

	public function getImageBlob($image)
	{
		return $image->encode('data-url');
	}

	public function qId()
	{
			if(isset($_GET['id_upt'])){
				$used_id = 'id_upt';
				$id = Request::get('id_upt');
			}
			if(isset($_GET['id_satker'])){
				$used_id = 'id_satker';
				$id = Request::get('id_satker');
			}
			if(isset($_GET['id_pos'])){
				$used_id = 'id_pos';
				$id = Request::get('id_pos');
			}

			return $used_id;
	}

	// public function visitor_layout()
	// {

	// 	return $this->visitor_layout;

	// }

}