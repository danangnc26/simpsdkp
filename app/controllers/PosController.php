<?php

class PosController extends \CoreController {


	public function __construct()
	{
		$this->pos = new PosModel();
		$this->delete_pos = "'".route('admin.upt.pos.deletePos', 'id_pos=')."'";
	}
	/**
	 * Display a listing of the resource.
	 * GET /pos
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function getDataPosCurrentUPT()
	{
		if(Lib::uRole() == null){
			$id = $this->decrypt(Request::get('id_upt'));
			$src = 'id_upt';
		}else{
			$id =  $this->decrypt(Lib::getIdSatuan());
			$src = Lib::sId();
		}
		return Datatable::collection($this->pos->where($src, '=', $id)->get(['id_pos', 'nama_pos', 'alamat_pos', 'no_telp_pos', 'id_upt']))
        ->showColumns('nama_pos', 'alamat_pos', 'no_telp_pos')
        ->addColumn('id_pos', function($md){
        	$id = "'".$this->encrypt($md->id_pos)."'";
        	return '<button href="'.route('admin.upt.pos.edit', 'id_pos='.$id).'" type="button" style="margin-right:0px;" class="btn btn-xs blue ubah-pos">
							<i class="fa fa-edit"></i> Edit
					</button>
        			<button onclick="hapus('.$id.','.$this->confirm_delete.', '.$this->delete_pos.')" type="button" style="margin-right:0px;" class="btn btn-xs red">
							<i class="fa fa-trash"></i> Hapus
					</button>';

        })
        ->searchColumns('nama_pos', 'alamat_pos')
        ->orderColumns('nama_pos')
        ->make();
	}

	public function pgUPTPos()
	{
		return View::make('page.admin.pos.addon.data_table');
	}

	public function inputPos()
	{
		if(Request::ajax()){
			return View::make('page.admin.pos.addon.input');
		}
	}

	public function savePos()
	{
		if(Request::ajax()){

			$input = Input::all();
			
			$this->pos->nama_pos		= $input['nama_pos'];
			$this->pos->alamat_pos		= $input['alamat_pos'];
			$this->pos->no_telp_pos		= $input['no_telp_pos'];
			$this->pos->email_pos		= $input['email_pos'];
			$this->pos->id_upt 			= $this->decrypt($input['id_upt']);
			$this->pos->image 			= $this->createImage($input['gambar_pos']);
			$this->pos->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	public function editPos()
	{
		if(Request::ajax()){
			if(Lib::uRole() == null || Lib::uRole() == 'upt'){
				$id = $this->decrypt(Request::get('id_pos'));
				$src = 'id_pos';
			}else{
				$id =  $this->decrypt(Lib::getIdSatuan());
				$src = Lib::sId();
			}
			$data = $this->pos->where($src,'=', $id)->get();
			return View::make('page.admin.pos.addon.edit')->with(['data' => $data]);
		}
	}

	public function updatePos()
	{
		if(Request::ajax()){

			$input = Input::all();
			$update = $this->pos->find($this->decrypt($input['id_pos']));
			
			$update->nama_pos		= $input['nama_pos'];
			$update->alamat_pos		= $input['alamat_pos'];
			$update->no_telp_pos		= $input['no_telp_pos'];
			$update->email_pos		= $input['email_pos'];
			if(isset($input['gambar_pos'])){
				$update->image 				= $this->createImage($input['gambar_pos'])	;
			}
			$update->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pos/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pos
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /pos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		if(Lib::uRole() != null){
			$data = $this->pos->where(Lib::sId(), '=', $this->decrypt(Lib::getIdSatuan()))->get();
		}else{
			$id = $this->decrypt(Request::get('id_upt'));
			$data = $this->pos->where('id_upt', '=', $id)->get();
		}
		$this->layout()->content = View::make('page.admin.UPT.manage')->with(['data' => $data]);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pos/{id}/edit
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
	 * PUT /pos/{id}
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
	 * DELETE /pos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){

			$delete = $this->pos->find($this->decrypt(Request::get('id_pos')));
			$delete->delete();

			$respon = ['status' => true, 'msg' => $this->delete_message];

			return Response::json($respon);

		}
	}

}