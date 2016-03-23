<?php

class OperasiController extends \CoreController {

	public function __construct()
	{
		$this->operasi = new OperasiModel();
	}

	/**
	 * Display a listing of the resource.
	 * GET /operasi
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout()->content = View::make('page.admin.operasi.index');
	}

	public function getDataOperasi()
	{
		if(Lib::uRole() == null){
			$data = $this->operasi->all();
		}else{
			$data = $this->operasi->where(Lib::sId(), '=', $this->decrypt(Lib::getIdSatuan()))->get();
		}

		return Datatable::collection($data)
        ->addColumn('tanggal', function($md5){
        	return Lib::inDate($md5->tanggal);
        })
        ->addColumn('kapalpengawas', function($md4){
        	return $md4->kapalpengawas->nama_kapal_pengawas;
        })
        ->addColumn('status', function($md1){
        	switch ($md1->status) {
        		case 'R':
        			$d1 = 'Riksa';
        			break;
        		case 'T':
        			$d1 = 'Tangkap';
        			break;
        		
        		default:
        			$d1 = '-';
        			break;
        	}
        	return $d1;
        })
        ->addColumn('tindakan', function($md2){
        	switch ($md2->tindakan) {
        		case 'AD':
        			$d2 = 'Adhock / Kawal';
        			break;
        		case 'TE':
        			$d2 = 'Tenggelam';
        			break;
        		case 'DI':
        			$d2 = 'Dipulangkan';
        			break;
        		
        		default:
        			$d2 = '-';
        			break;
        	}
        	return $d2;
        })
        ->addColumn('negara', function($md3){
        	return '<img src="'.$md3->negara->bendera_negara.'" /> '.$md3->negara->nama_negara;
        })
        ->searchColumns('tanggal')
        ->orderColumns('tanggal')
        ->make();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /operasi/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout()->content = View::make('page.admin.operasi.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /operasi
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax()){	

			$input = Input::all();

			$this->operasi->id_upt 				= (Lib::uRole() == 'upt') ? $this->decrypt(Lib::getIdSatuan()) : null;
			$this->operasi->id_satker 			= (Lib::uRole() == 'satker') ? $this->decrypt(Lib::getIdSatuan()) : null;
			$this->operasi->id_pos 				= (Lib::uRole() == 'pos') ? $this->decrypt(Lib::getIdSatuan()) : null;
			$this->operasi->id_kapal_pengawas 	= $input['kapal_pengawas'];
			$this->operasi->tanggal			  	= Lib::enDate($input['tanggal']);
			$this->operasi->status 				= $input['status'];
			$this->operasi->tindakan 		 	= $input['tindakan'];
			$this->operasi->id_negara 			= $input['bendera_negara'];
			$this->operasi->save();

			if($input['status'] == 'T'){
				$respon = ['status' => true, 'msg' => $this->input_success, 'url' => route('admin.operasi.index'), 'next' => true];	
			}else{
				$respon = ['status' => true, 'msg' => $this->input_success, 'url' => route('admin.operasi.index'), 'next' => false];	
			}

			return Response::json($respon);

		}
	}

	/**
	 * Display the specified resource.
	 * GET /operasi/{id}
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
	 * GET /operasi/{id}/edit
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
	 * PUT /operasi/{id}
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
	 * DELETE /operasi/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}