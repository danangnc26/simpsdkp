<?php

class MasterAllController extends \CoreController {

	public function __construct()
	{

		$this->altang 			= new MasterAlatTangkap();
		$this->material 		= new MasterMaterial();
		$this->sarana 			= new MasterSarana();
		$this->negara 			= new MasterNegara();

		$this->delete_alat 		= "'".route('admin.master.alat_tangkap.delete', 'id=')."'";
		$this->delete_material 	= "'".route('admin.master.material.delete', 'id=')."'";
		$this->delete_sarana	= "'".route('admin.master.sarana.delete', 'id=')."'";
		$this->delete_negara 	= "'".route('admin.master.negara.delete', 'id=')."'";
	}

	public function index()
	{
		$this->layout()->content = View::make('page.admin.master.master_all');
	}

	# ///////////////////////////////////////// # ALAT TANGKAP # ///////////////////////////////////////// #

	public function getDataTableMasterAlatTangkap()
	{
		
		return Datatable::collection(MasterAlatTangkap::all(['id_alat_tangkap', 'nama_alat_tangkap']))
        ->showColumns('nama_alat_tangkap')
        ->addColumn('id_alat_tangkap', function($md){
        	return '<button type="button" href="'.route('admin.master.alat_tangkap.edit', 'id='.$md->id_alat_tangkap).'" class="btn btn-xs blue edit-alat-tangkap"><i class="fa fa-edit"></i> Edit</button>
        			<button type="button" onclick="hapus('.$md->id_alat_tangkap.','.$this->confirm_delete.', '.$this->delete_alat.')" class="btn btn-xs red"><i class="fa fa-trash"></i> Hapus</button>';
        })
        ->searchColumns('nama_alat_tangkap')
        ->orderColumns('nama_alat_tangkap')
        ->make();

	}


	public function createDataMasterAlatTangkap()
	{

		return View::make('page.admin.master.alat_tangkap.create');

	}

	public function saveDataMasterAlatTangkap()
	{

		if(Request::ajax()){

			$input = Input::all();
			$this->altang->nama_alat_tangkap = $input['nama_alat_tangkap'];
			$this->altang->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}

	}

	public function editDataMasterAlatTangkap()
	{
		if(Request::ajax()){

			$data = $this->altang->where('id_alat_tangkap', '=', Request::get('id'))->get();
			return View::make('page.admin.master.alat_tangkap.edit')->with(['data' => $data]);

		}

	}

	public function updateDataMasterAlatTangkap()
	{

		if(Request::ajax()){

			$input = Input::all();
			$update = $this->altang->find($input['id']);
			$update->nama_alat_tangkap = $input['nama_alat_tangkap'];
			$update->save();

			$respon = ['status' => true, 'msg' => $this->input_success];
			return Response::json($respon);

		}

	}

	public function deleteDataMasterAlatTangkap()
	{

		if(Request::ajax()){
			$id = Request::get('id');
			$delete = $this->altang->find($id);
			$delete->delete();
			return Response::json(['msg' => $this->delete_message]);
		}

	}

	# ///////////////////////////////////////// # MATERIAL # ///////////////////////////////////////// #

	public function getDataTableMasterMaterial()
	{

		return Datatable::collection(MasterMaterial::all(['id_material', 'nama_material']))
        ->showColumns('nama_material')
        ->addColumn('id_material', function($md){
        	return '<button type="button" href="'.route('admin.master.material.edit', 'id='.$md->id_material).'" class="btn btn-xs blue edit-material"><i class="fa fa-edit"></i> Edit</button>
        			<button type="button" onclick="hapus('.$md->id_material.','.$this->confirm_delete.', '.$this->delete_material.')" class="btn btn-xs red"><i class="fa fa-trash"></i> Hapus</button>';
        })
        ->searchColumns('nama_material')
        ->orderColumns('nama_material')
        ->make();

	}

	public function createDataMasterMaterial()
	{
		return View::make('page.admin.master.material.create');
	}

	public function saveDataMasterMaterial()
	{
		if(Request::ajax()){

			$input = Input::all();
			$this->material->nama_material = $input['nama_material'];
			$this->material->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	public function editDataMasterMaterial()
	{

		if(Request::ajax()){

			$data = $this->material->where('id_material', '=', Request::get('id'))->get();
			return View::make('page.admin.master.material.edit')->with(['data' => $data]);

		}

	}

	public function updateDataMasterMaterial()
	{

		if(Request::ajax()){

			$input = Input::all();
			$update = $this->material->find($input['id']);
			$update->nama_material = $input['nama_material'];
			$update->save();

			$respon = ['status' => true, 'msg' => $this->input_success];
			return Response::json($respon);

		}

	}

	public function deleteDataMasterMaterial()
	{

		if(Request::ajax()){
			$id = Request::get('id');
			$delete = $this->material->find($id);
			$delete->delete();
			return Response::json(['msg' => $this->delete_message]);
		}

	}

	# ///////////////////////////////////////// # SARANA # ///////////////////////////////////////// #

	public function getDataTableMasterSarana()
	{

		return Datatable::collection(MasterSarana::all(['id_sarana', 'nama_sarana']))
        ->showColumns('nama_sarana')
        ->addColumn('id_sarana', function($md){
        	return '<button type="button" href="'.route('admin.master.sarana.edit', 'id='.$md->id_sarana).'" class="btn btn-xs blue edit-sarana"><i class="fa fa-edit"></i> Edit</button>
        			<button type="button" onclick="hapus('.$md->id_sarana.','.$this->confirm_delete.', '.$this->delete_sarana.')" class="btn btn-xs red"><i class="fa fa-trash"></i> Hapus</button>';
        })
        ->searchColumns('nama_sarana')
        ->orderColumns('nama_sarana')
        ->make();

	}

	public function createDataMasterSarana()
	{
		return View::make('page.admin.master.sarana.create');
	}

	public function saveDataMasterSarana()
	{
		if(Request::ajax()){

			$input = Input::all();
			$this->sarana->nama_sarana = $input['nama_sarana'];
			$this->sarana->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	public function editDataMasterSarana()
	{

		if(Request::ajax()){

			$data = $this->sarana->where('id_sarana', '=', Request::get('id'))->get();
			return View::make('page.admin.master.sarana.edit')->with(['data' => $data]);

		}

	}

	public function updateDataMasterSarana()
	{

		if(Request::ajax()){

			$input = Input::all();
			$update = $this->sarana->find($input['id']);
			$update->nama_sarana = $input['nama_sarana'];
			$update->save();

			$respon = ['status' => true, 'msg' => $this->input_success];
			return Response::json($respon);

		}

	}

	public function deleteDataMasterSarana()
	{

		if(Request::ajax()){
			$id = Request::get('id');
			$delete = $this->sarana->find($id);
			$delete->delete();
			return Response::json(['msg' => $this->delete_message]);
		}

	}

	# ///////////////////////////////////////// # NEGARA # ///////////////////////////////////////// #

	public function getDataTableMasterNegara()
	{

		return Datatable::collection(MasterNegara::all(['id_negara', 'nama_negara', 'bendera_negara']))
        ->addColumn('nama_negara', function($nm){
        	return '<img src="'.$nm->bendera_negara.'"> '.$nm->nama_negara;
        })
        ->addColumn('id_negara', function($md){
        	return '<button type="button" href="'.route('admin.master.negara.edit', 'id='.$md->id_negara).'" class="btn btn-xs blue edit-negara"><i class="fa fa-edit"></i> Edit</button>
        			<button type="button" onclick="hapus('.$md->id_negara.','.$this->confirm_delete.', '.$this->delete_negara.')" class="btn btn-xs red"><i class="fa fa-trash"></i> Hapus</button>';
        })
        ->searchColumns('nama_negara')
        ->orderColumns('nama_negara')
        ->make();

	}

	public function createDataMasterNegara()
	{
		return View::make('page.admin.master.negara.create');
	}

	public function saveDataMasterNegara()
	{
		if(Request::ajax()){

			$input = Input::all();
			$file = $input['bendera_negara']->getRealPath();
			$this->negara->nama_negara = $input['nama_negara'];
			$this->negara->bendera_negara = Image::make($file)->encode('data-url');
			$this->negara->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	public function editDataMasterNegara()
	{

		if(Request::ajax()){

			$data = $this->negara->where('id_negara', '=', Request::get('id'))->get();
			return View::make('page.admin.master.negara.edit')->with(['data' => $data]);

		}

	}

	public function updateDataMasterNegara()
	{

		if(Request::ajax()){

			$input = Input::all();
			$update = $this->negara->find($input['id']);
			$file = $input['bendera_negara']->getRealPath();
			$update->nama_negara = $input['nama_negara'];
			$update->bendera_negara = Image::make($file)->encode('data-url');
			$update->save();

			$respon = ['status' => true, 'msg' => $this->input_success];
			return Response::json($respon);

		}

	}

	public function deleteDataMasterNegara()
	{

		if(Request::ajax()){
			$id = Request::get('id');
			$delete = $this->negara->find($id);
			$delete->delete();
			return Response::json(['msg' => $this->delete_message]);
		}

	}


	

}