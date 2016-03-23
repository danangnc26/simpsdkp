<?php

class UPTController extends \CoreController {


	public function __construct()
	{
		$this->upt = new UPTModel();
		$this->edit_upt = "'".route('admin.upt.edit', 'id_upt=')."'";
		$this->delete_upt = "'".route('admin.upt.delete', 'id_upt=')."'";
		$this->confirm_delete_upt = "'Jika anda menghapus UPT ini, semua data yang berada dibawah UPT ini juga akan ikut terhapus. Lanjutkan ?'";
	}

	/**
	 * Display a listing of the resource.
	 * GET /upt
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout()->content = View::make('page.admin.UPT.index');
	}

	public function getDataListUPT()
	{

		return Datatable::collection(UPTModel::all(['id_upt', 'nama_upt', 'alamat', 'kepala_pangkalan', 'id_kota']))
        ->showColumns('nama_upt', 'alamat', 'kepala_pangkalan')
        ->addColumn('id_kota', function($md2){
        	return $md2->kotaUPT->nama_kota;
        })
        ->addColumn('id_kota2', function($md3){
        	return $md3->kotaUPT->kotaProvinsi->nama_provinsi;
        })
        ->addColumn('id_upt2', function($md4){
     //    	return '<div class="btn-group btn-group-xs">
					// 	<button onclick="edit('.$md4->id_upt.','.$this->edit_upt.')" type="button" style="margin-right:0px;" class="btn btn-default tes">
					// 		<i class="fa fa-edit"></i>
					// 	</button>
					// 	<button onclick="hapus('.$md4->id_upt.','.$this->confirm_delete_upt.', '.$this->delete_upt.')" type="button" style="margin-right:0px;" class="btn btn-default">
					// 		<i class="fa fa-trash"></i>
					// 	</button>
					// 	<a href="'.route('admin.upt.manage', 'id_upt='.$this->encrypt($md4->id_upt)).'">
					// 		<button type="button" style="margin-right:0px;" class="btn btn-default"><i class="fa fa-eye"></i></button>
					// 	</a>
					// </div>';
        	return '<a href="'.route('admin.upt.manage', 'id_upt='.$this->encrypt($md4->id_upt)).'">
							<button type="button" style="margin-right:0px;" class="btn btn-xs blue"><i class="fa fa-eye"></i> Kelola</button>
					</a>
					<button onclick="hapus('.$md4->id_upt.','.$this->confirm_delete_upt.', '.$this->delete_upt.')" type="button" style="margin-right:0px;" class="btn btn-xs red">
							<i class="fa fa-trash"></i> Hapus
					</button>
					';

        })
        ->searchColumns('nama_upt', 'alamat', 'kepala_pangkalan')
        ->orderColumns('nama_upt')
        ->make();

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /upt/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout()->content = View::make('page.admin.UPT.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /upt
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax()){

			$input = Input::all();
			$this->upt->nama_upt 			= $input['nama_upt'];
			$this->upt->email 				= $input['email_upt'];
			$this->upt->no_telp				= $input['no_telp_upt'];
			$this->upt->kepala_pangkalan 	= $input['kepala_upt'];
			$this->upt->alamat 				= $input['alamat_upt'];
			$this->upt->id_kota 			= $input['kota_upt'];
			// $this->upt->image 				= Image::make($input['gambar_upt']->getRealPath())->encode('data-url');
			$this->upt->image 				= $this->createImage($input['gambar_upt']);
			$this->upt->save();

			$respon = ['status' => true, 'msg' => $this->input_success, 'url' => route('admin.upt.index')];

			return Response::json($respon);

		}
	}

	/**
	 * Display the specified resource.
	 * GET /upt/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		if(Lib::uRole() != null){
			$data = $this->upt->where(Lib::sId(), '=', $this->decrypt(Lib::getIdSatuan()))->get();
		}else{
			$id = $this->decrypt(Request::get('id_upt'));
			$data = $this->upt->where('id_upt', '=', $id)->get();
		}
		$this->layout()->content = View::make('page.admin.UPT.manage')->with(['data' => $data]);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /upt/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
			if(Lib::uRole() == null){
				$id = $this->decrypt(Request::get('id_upt'));
				$src = 'id_upt';
			}else{
				$id =  $this->decrypt(Lib::getIdSatuan());
				$src = Lib::sId();
			}

			$data = $this->upt->where($src, '=', $id)->get();
			$this->layout()->content = View::make('page.admin.UPT.edit')->with(['data' => $data]);

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /upt/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		if(Request::ajax()){

			$input = Input::all();
			$update = $this->upt->find($input['id_upt']);

			$update->nama_upt 			= $input['nama_upt'];
			$update->email 				= $input['email_upt'];
			$update->no_telp			= $input['no_telp_upt'];
			$update->kepala_pangkalan 	= $input['kepala_upt'];
			$update->alamat 			= $input['alamat_upt'];
			$update->id_kota 			= $input['kota_upt'];
			if(isset($input['gambar_upt'])){
				$update->image 				= $this->createImage($input['gambar_upt']);
			}
			$update->save();

			$respon = ['status' => true, 'msg' => $this->input_success, 'url' => route('admin.upt.manage')];

			return Response::json($respon);

		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /upt/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){

			$delete = $this->upt->find(Request::get('id_upt'));
			$delete->delete();

			$respon = ['status' => true, 'msg' => $this->delete_message];

			return Response::json($respon);

		}
	}

}