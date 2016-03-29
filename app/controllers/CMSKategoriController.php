<?php

class CMSKategoriController extends \CoreController {

	public function __construct()
	{
		$this->kategori = new CMSKategoriModel();
		$this->delete_kategori	= "'".route('admin.cms.kategori.delete', 'id=')."'";
	}

	/**
	 * Display a listing of the resource.
	 * GET /cmskategori
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout()->content = View::make('page.cms.kategori.index');
	}

	public function getListKategori()
	{
		return Datatable::collection($this->kategori->all())
        ->showColumns('nama_kategori', 'deskripsi_kategori', 'ufl')
        ->addColumn('action', function($md){
        	$id = "'".$this->encrypt($md->id_kategori)."'";
        	return '<button type="button" onclick="ubah('.$id.')" class="btn btn-xs cst-transparent tt-edit"><i class="fa fa-edit"></i></button>
        			<button type="button" onclick="hapus('.$id.','.$this->confirm_delete.', '.$this->delete_kategori.')" class="btn btn-xs cst-transparent tt-hapus"><i class="fa fa-trash"></i></button>';
        })
        ->searchColumns('nama_kategori')
        ->orderColumns('nama_kategori')
        ->make();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /cmskategori/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('page.cms.kategori.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /cmskategori
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax()){

			$input = Input::all();

			$this->kategori->nama_kategori 			= $input['nama_kategori'];
			$this->kategori->deskripsi_kategori		= $input['deskripsi_kategori'];
			$this->kategori->ufl 					= $input['ufl'];
			$this->kategori->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	/**
	 * Display the specified resource.
	 * GET /cmskategori/{id}
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
	 * GET /cmskategori/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		if(Request::ajax()){

			$data = $this->kategori->where('id_kategori', '=', $this->decrypt(Request::get('id')))->get();
			return View::make('page.cms.kategori.edit')->with(['data' => $data]);
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /cmskategori/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		if(Request::ajax()){

			$input = Input::all();
			$update = $this->kategori->find($this->decrypt($input['id_kategori']));

			$update->nama_kategori 			= $input['nama_kategori'];
			$update->deskripsi_kategori		= $input['deskripsi_kategori'];
			$update->ufl 					= $input['ufl'];
			$update->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /cmskategori/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){
			$id = $this->decrypt(Request::get('id'));
			$delete = $this->kategori->find($id);
			$delete->delete();
			return Response::json(['msg' => $this->delete_message]);
		}
	}

}