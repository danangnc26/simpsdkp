<?php

class SpeedboatController extends \CoreController {

	public function __construct()
	{
		$this->speedboat = new SpeedboatModel();
		$this->delete_speedboat = "'".route('admin.upt.speedboat.deleteSpeedboat', 'id_speedboat=')."'";
	}

	/**
	 * Display a listing of the resource.
	 * GET /speedboat
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function getDataSpeedboatCurrentUPT()
	{
		if(Lib::uRole() == null){
			$id = $this->decrypt(Request::get('id_upt'));
			$src = 'id_upt';
		}else{
			$id =  $this->decrypt(Lib::getIdSatuan());
			$src = Lib::sId();
		}

		
		return Datatable::collection(SpeedboatModel::with('material')->where($src, '=', $id)->get(['id_speedboat', 'nama_speedboat', 'id_material', 'ukuran_speedboat']))
        ->showColumns('nama_speedboat', 'ukuran_speedboat')
        ->addColumn('material', function($md){
        	return $md->material->nama_material;
        })
        ->addColumn('id_speedboat', function($md2){
        	$id = "'".$this->encrypt($md2->id_speedboat)."'";
        	return '<button href="'.route('admin.upt.speedboat.edit', 'id_speedboat='.$id).'" type="button" style="margin-right:0px;" class="btn btn-xs blue ubah-speedboat">
							<i class="fa fa-edit"></i> Edit
					</button>
        			<button onclick="hapus('.$id.','.$this->confirm_delete.', '.$this->delete_speedboat.')" type="button" style="margin-right:0px;" class="btn btn-xs red">
							<i class="fa fa-trash"></i> Hapus
					</button>';
        })
        ->searchColumns('nama_speedboat')
        ->orderColumns('nama_speedboat')
        ->make();

	}

	public function pgUPTSpeedboat()
	{
		return View::make('page.admin.speedboat.addon.data_table');
	}

	public function inputSpeedboat()
	{
		if(Request::ajax()){
			return View::make('page.admin.speedboat.addon.input');
		}
	}

	public function saveSpeedboat()
	{
		if(Request::ajax()){

			$input = Input::all();
			if(Lib::uRole() == null){
				$this->speedboat->id_upt 			= (isset($input['id_upt'])) ? $this->decrypt($input['id_upt']) : null;
				$this->speedboat->id_satker 		= (isset($input['id_satker'])) ? $this->decrypt($input['id_satker']) : null;
				$this->speedboat->id_pos 			= (isset($input['id_pos'])) ? $this->decrypt($input['id_pos']) : null;
			}else{
				if(Lib::uRole() == 'upt'){
					$this->speedboat->id_upt 			= $this->decrypt(Lib::getIdSatuan());
				}
				if(Lib::uRole() == 'satker'){
					$this->speedboat->id_satker 		= $this->decrypt(Lib::getIdSatuan());
				}
				if(Lib::uRole() == 'pos'){
					$this->speedboat->id_pos 			= $this->decrypt(Lib::getIdSatuan());
				}
			}
			
			
			$this->speedboat->nama_speedboat 	= $input['nama_speedboat'];
			$this->speedboat->id_material 		= $input['id_material'];
			$this->speedboat->ukuran_speedboat 	= $input['ukuran_speedboat'];
			$this->speedboat->image 			= $this->createImage($input['gambar_speedboat']);
			$this->speedboat->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	public function editSpeedboat()
	{
		// $data = $this->speedboat->where($used_id,'=', $this->decrypt(Request::get($this->qId())))->get();
		if(Request::ajax()){
			$data = $this->speedboat->where('id_speedboat','=', $this->decrypt(Request::get('id_speedboat')))->get();
			return View::make('page.admin.speedboat.addon.edit')->with(['data' => $data]);
		}
	}

	public function updateSpeedboat()
	{
		if(Request::ajax()){

			$input = Input::all();
			$update = $this->speedboat->find($this->decrypt($input['id_speedboat']));
			
			$update->nama_speedboat 	= $input['nama_speedboat'];
			$update->id_material 		= $input['id_material'];
			$update->ukuran_speedboat 	= $input['ukuran_speedboat'];

			if(isset($input['gambar_speedboat'])){
				$update->image 				= $this->createImage($input['gambar_speedboat'])	;
			}
			$update->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /speedboat/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /speedboat
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /speedboat/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /speedboat/{id}/edit
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
	 * PUT /speedboat/{id}
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
	 * DELETE /speedboat/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){

			$delete = $this->speedboat->find($this->decrypt(Request::get('id_speedboat')));
			$delete->delete();

			$respon = ['status' => true, 'msg' => $this->delete_message];

			return Response::json($respon);

		}
	}

}