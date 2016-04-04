<?php

class KapalpengawasController extends \CoreController {

	public function __construct()
	{
		$this->kapalpengawas = new KapalPengawasModel();
		$this->delete_kapal_pengawas = "'".route('admin.upt.kapal_pengawas.deleteKapalPengawas', 'id_kapal_pengawas=')."'";
	}

	/**
	 * Display a listing of the resource.
	 * GET /kapalpengawas
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function getDataKapalPengawasCurrentUPT()
	{

		if(Lib::uRole() == null){
			$id = $this->decrypt(Request::get('id_upt'));
			$src = 'id_upt';
		}else{
			$id =  $this->decrypt(Lib::getIdSatuan());
			$src = Lib::sId();
		}

		return Datatable::collection(KapalPengawasModel::with('material')->where($src, '=', $id)->get(['id_kapal_pengawas', 'nama_kapal_pengawas', 'id_material', 'spesifikasi']))
        ->showColumns('nama_kapal_pengawas', 'spesifikasi')
        ->addColumn('material', function($md){
        	return $md->material->nama_material;
        })
        ->addColumn('personil', function($md2){
        	return '<li>1 Orang Pengawas Perikanan </li>
        			<li>2 Orang Awak Kapal Pengawas Perikanan </li>
        			<li>3 Orang Polisi Khusus Pengawas Pesisir & Pulau kecil </li>
        			';
        })
        ->addColumn('id_kapal_pengawas', function($md3){
        	$id = "'".$this->encrypt($md3->id_kapal_pengawas)."'";
        	return '<button href="'.route('admin.upt.kapal_pengawas.edit', 'id_kapal_pengawas='.$id).'" type="button" style="margin-right:0px;" class="btn btn-xs cst-transparent tt-edit">
							<i class="fa fa-edit"></i>
					</button>
        			<button onclick="hapus('.$id.','.$this->confirm_delete.', '.$this->delete_kapal_pengawas.')" type="button" style="margin-right:0px;" class="btn btn-xs cst-transparent tt-hapus">
							<i class="fa fa-trash"></i>
					</button>';
        })
        ->searchColumns('nama_kapal_pengawas')
        ->orderColumns('nama_kapal_pengawas')
        ->make();

	}

	public function pgUPTKapalPengawas()
	{
		return View::make('page.admin.kapal_pengawas.addon.data_table');
	}

	public function inputKapalPengawas()
	{
		if(Request::ajax()){
			return View::make('page.admin.kapal_pengawas.addon.input');
		}
	}

	public function saveKapalPengawas()
	{
		if(Request::ajax()){

			$input = Input::all();

			$input = Input::all();
			if(Lib::uRole() == null){
				$this->kapalpengawas->id_upt 			= (isset($input['id_upt'])) ? $this->decrypt($input['id_upt']) : null;
				$this->kapalpengawas->id_satker 		= (isset($input['id_satker'])) ? $this->decrypt($input['id_satker']) : null;
				$this->kapalpengawas->id_pos 			= (isset($input['id_pos'])) ? $this->decrypt($input['id_pos']) : null;
			}else{
				if(Lib::uRole() == 'upt'){
					$this->kapalpengawas->id_upt 			= $this->decrypt(Lib::getIdSatuan());
				}
				if(Lib::uRole() == 'satker'){
					$this->kapalpengawas->id_satker 		= $this->decrypt(Lib::getIdSatuan());
				}
				if(Lib::uRole() == 'pos'){
					$this->kapalpengawas->id_pos 			= $this->decrypt(Lib::getIdSatuan());
				}
			}
			
			$this->kapalpengawas->nama_kapal_pengawas 	= $input['nama_kapal_pengawas'];
			$this->kapalpengawas->id_material 			= $input['id_material'];
			$this->kapalpengawas->spesifikasi 			= $input['spesifikasi'];
			$this->kapalpengawas->image 				= $this->createImage($input['gambar_kapal_pengawas']);
			$this->kapalpengawas->save();	

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	public function editKapalPengawas()
	{
		if(Request::ajax()){
			$data = $this->kapalpengawas->where('id_kapal_pengawas','=', $this->decrypt(Request::get('id_kapal_pengawas')))->get();
			return View::make('page.admin.kapal_pengawas.addon.edit')->with(['data' => $data]);
		}
	}

	public function updateKapalPengawas()
	{
		if(Request::ajax()){

			$input = Input::all();
			$update = $this->kapalpengawas->find($this->decrypt($input['id_kapal_pengawas']));
			
			$update->nama_kapal_pengawas 	= $input['nama_kapal_pengawas'];
			$update->id_material 			= $input['id_material'];
			$update->spesifikasi 			= $input['spesifikasi'];

			if(isset($input['gambar_kapal_pengawas'])){
				$update->image 				= $this->createImage($input['gambar_kapal_pengawas']);
			}
			$update->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /kapalpengawas/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /kapalpengawas
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /kapalpengawas/{id}
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
	 * GET /kapalpengawas/{id}/edit
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
	 * PUT /kapalpengawas/{id}
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
	 * DELETE /kapalpengawas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){

			$delete = $this->kapalpengawas->find($this->decrypt(Request::get('id_kapal_pengawas')));
			$delete->delete();

			$respon = ['status' => true, 'msg' => $this->delete_message];

			return Response::json($respon);

		}
	}

}