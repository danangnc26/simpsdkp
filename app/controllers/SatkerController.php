<?php

class SatkerController extends \CoreController {

	public function __construct()
	{
		$this->satker = new SatkerModel();
		$this->delete_satker = "'".route('admin.upt.satker.deleteSatker', 'id_satker=')."'";
	}

	/**
	 * Display a listing of the resource.
	 * GET /satker
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function getDataSatkerCurrentUPT()
	{
		if(Lib::uRole() == null){
			$id = $this->decrypt(Request::get('id_upt'));
			$src = 'id_upt';
		}else{
			$id =  $this->decrypt(Lib::getIdSatuan());
			$src = Lib::sId();
		}
		return Datatable::collection($this->satker->where($src, '=', $id)->get(['id_satker', 'nama_satker', 'alamat_satker', 'kepala_satker', 'id_upt']))
        ->showColumns('nama_satker', 'alamat_satker', 'kepala_satker')
        ->addColumn('id_satker', function($md){
        	$id = "'".$this->encrypt($md->id_satker)."'";
        	return '
        			<button href="'.route('admin.upt.satker.edit', 'id_satker='.$this->encrypt($md->id_satker)).'" type="button" style="margin-right:0px;" class="btn btn-xs blue ubah-satker">
							<i class="fa fa-edit"></i> Edit
					</button>
        			<button onclick="hapus('.$id.','.$this->confirm_delete.', '.$this->delete_satker.')" type="button" style="margin-right:0px;" class="btn btn-xs red">
							<i class="fa fa-trash"></i> Hapus
					</button>
					';

        })
        ->searchColumns('nama_satker', 'alamat_satker', 'kepala_satker')
        ->orderColumns('nama_satker')
        ->make();
	}

	public function pgUPTSatker()
	{
		return View::make('page.admin.satker.addon.data_table');
	}

	public function inputSatker()
	{
		if(Request::ajax()){
			return View::make('page.admin.satker.addon.input');
		}
	}

	public function saveSatker()
	{
		if(Request::ajax()){

			$input = Input::all();

			if(Lib::uRole() == null){
				$id = $this->decrypt($input['id_upt']);
			}else{
				$id = $this->decrypt(Lib::getIdSatuan());
			}
			
			
			$this->satker->nama_satker		= $input['nama_satker'];
			$this->satker->alamat_satker	= $input['alamat_satker'];
			$this->satker->no_telp_satker	= $input['no_telp_satker'];
			$this->satker->email_satker		= $input['email_satker'];
			$this->satker->kepala_satker 	= $input['kepala_satker'];
			$this->satker->id_upt 			= $id;
			$this->satker->image 			= $this->createImage($input['gambar_satker']);
			$this->satker->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	public function editSatker()
	{
		if(Request::ajax()){
			if(Lib::uRole() == null || Lib::uRole() == 'upt'){
				$id = $this->decrypt(Request::get('id_satker'));
				$src = 'id_satker';
			}else{
				$id =  $this->decrypt(Lib::getIdSatuan());
				$src = Lib::sId();
			}
			$data = $this->satker->where($src,'=', $id)->get();
			return View::make('page.admin.satker.addon.edit')->with(['data' => $data]);
		}
	}

	public function updateSatker()
	{
		if(Request::ajax()){

			$input = Input::all();
			$update = $this->satker->find($this->decrypt($input['id_satker']));
			
			$update->nama_satker		= $input['nama_satker'];
			$update->alamat_satker		= $input['alamat_satker'];
			$update->no_telp_satker		= $input['no_telp_satker'];
			$update->email_satker		= $input['email_satker'];
			$update->kepala_satker 		= $input['kepala_satker'];
			$update->id_upt 			= $input['id_upt'];
			if(isset($input['gambar_satker'])){
				$update->image 				= $this->createImage($input['gambar_satker']);	
			}
			$update->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /satker/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /satker
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /satker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		if(Lib::uRole() != null){
			$data = $this->satker->where(Lib::sId(), '=', $this->decrypt(Lib::getIdSatuan()))->get();
		}else{
			$id = $this->decrypt(Request::get('id_upt'));
			$data = $this->satker->where('id_upt', '=', $id)->get();
		}
		$this->layout()->content = View::make('page.admin.UPT.manage')->with(['data' => $data]);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /satker/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /satker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /satker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){

			$delete = $this->satker->find($this->decrypt(Request::get('id_satker')));
			$delete->delete();

			$respon = ['status' => true, 'msg' => $this->delete_message];

			return Response::json($respon);

		}
	}

}