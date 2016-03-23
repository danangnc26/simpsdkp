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

	public function createImage($image = '')
	{
		return Image::make($image->getRealPath())->resize(1000, null, function($constraint){
			$constraint->aspectRatio();
		})->encode('data-url');
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