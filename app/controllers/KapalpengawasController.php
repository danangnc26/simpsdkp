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
		$this->layout()->content = View::make('page.admin.kapal_pengawas.index');
	}

	public function statistik()
	{
		return View::make('page.admin.kapal_pengawas.pg.statistik')->with(['data' => $this->rekapKapal()]);
	}

	public function rekapKapal()
	{
		$data = MasterTypeKapal::with(['kapalpengawas' => function($q){
					$q->with('material');
				}])->get();
		return $data;
	}

	public function type()
	{
		$data = MasterTypeKapal::all();
		return View::make('page.admin.kapal_pengawas.pg.type')->with(['data' => $data]);
	}

	public function all()
	{
		return View::make('page.admin.kapal_pengawas.pg.all');
	}

	public function data_all()
	{
		return Datatable::collection(KapalPengawasModel::with('material')->get())
        ->showColumns('nama_kapal_pengawas')
        ->addColumn('gambar_kapal', function($gb){
        	return '<img src="'.asset('uploaded_images/kapal_pengawas/'.$gb->image).'" width="200">';
        })
        ->addColumn('spesifikasi', function($md){
        	$panjang_loa = ($md->panjang_loa != null) ? $md->panjang_loa.' m' : '-';
        	$panjang_lbp = ($md->panjang_lbp != null) ? $md->panjang_lbp.' m' : '-';
        	$lebar 		 = ($md->lebar != null) ? $md->lebar.' m' : '-';
        	$tinggi 	 = ($md->tinggi != null) ? $md->tinggi.' m' : '-';
        	$sarat 		 = ($md->sarat != null) ? $md->sarat.' m' : '-';
        	$kecepatan   = ($md->kecepatan_max != null) ? $md->kecepatan_max.' knot' : '-';
        	$abk   		 = ($md->jml_abk != null) ? $md->jml_abk.' Orang' : '-';
        	$material 	 = ($md->material->nama_material != null) ? $md->material->nama_material : '';
        	$mesin1 	 = ($md->daya_mesin_1 != null) ? $md->daya_mesin_1.' HP' : '-';
        	$mesin2 	 = ($md->daya_mesin_2 != null) ? $md->daya_mesin_2.' HP' : '-';

        	return '<ul style="padding-left:20px; font-size:0.9em">
        				<li>
        				Panjang (LOA) : '.$panjang_loa.'
        				</li>
        				<li>
        				Panjang antara (LBP) : '.$panjang_lbp.'
        				</li>
        				<li>
        				Lebar : '.$lebar.'
        				</li>
        				<li>
        				Tinggi : '.$tinggi.'
        				</li>
        				<li>
        				Sarat : '.$sarat.'
        				</li>
        				<li>
        				Kecepatan Maks : '.$kecepatan.'
        				</li>
        				<li>
        				Jumlah ABK : '.$abk.'
        				</li>
        				<li>
        				Material : '.$material.'
        				</li>
        				<li>
        				Daya Mesin :
	        				<ol style="padding-left:15px;">
								<li>
								Main Engine : '.$mesin1.'
								</li>
								<li>
								Auxelary Engine : '.$mesin2.'
								</li>
	        				</ol>
        				</li>
        			</ul>
        			';
        })
        ->addColumn('id_kapal_pengawas', function($md3){
        	$id = "'".$this->encrypt($md3->id_kapal_pengawas)."'";
        	return '<button href="'.route('admin.upt.kapal_pengawas.edit', 'id_kapal_pengawas='.$id).'" type="button" style="margin-right:0px;" class="btn btn-xs cst-transparent tt-edit ubah-kapal-pengawas">
							<i class="fa fa-edit"></i>
					</button>
        			<button onclick="hapus('.$id.','.$this->confirm_delete.', '.$this->delete_kapal_pengawas.')" type="button" style="margin-right:0px;" class="btn btn-xs cst-transparent tt-hapus">
							<i class="fa fa-trash"></i>
					</button>
					<button href="'.route('admin.kapal_pengawas.posisi', 'id_kapal='.$this->encrypt($md3->id_kapal_pengawas)).'" type="button" style="margin-right:0px; margin-top:5px; font-size:1.1em;" class="btn btn-xs cst-transparent tt-marker posisi-kapal-pengawas">
							<i class="fa fa-map-marker"></i>
					</button>
					';
        })
        ->searchColumns('nama_kapal_pengawas')
        ->orderColumns('nama_kapal_pengawas')
        ->make();
	}

	public function posisi()
	{
		$data = $this->kapalpengawas->where('id_kapal_pengawas', '=', $this->decrypt(Request::get('id_kapal')))->get();
		return View::make('page.admin.kapal_pengawas.addon.posisi')->with(['data' => $data]);
	}

	public function sv_posisi()
	{
		if(Request::ajax()){
			$input = Input::all();

			$posisi = $this->kapalpengawas->find($this->decrypt($input['id_kapal']));

			if($input['upt'] != null){
				$posisi->id_upt		= $input['upt'];
			}
			if($input['satker'] != null){
				$posisi->id_satker	= $input['satker'];
			}
			if($input['pos'] != null){
				$posisi->id_pos		= $input['pos'];
			}

			$posisi->id_kota 		= $input['kota'];
			$posisi->nama_posisi 	= $input['nama_posisi'];
			$posisi->latlng 		= $input['latitude'].','.$input['longitude'];
			$posisi->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);
		}
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

		return Datatable::collection(KapalPengawasModel::with('material')->where($src, '=', $id)->get())
        ->showColumns('nama_kapal_pengawas')
        ->addColumn('gambar_kapal', function($gb){
        	return '<img src="'.asset('uploaded_images/kapal_pengawas/'.$gb->image).'" width="200">';
        })
        ->addColumn('spesifikasi', function($md){
        	$panjang_loa = ($md->panjang_loa != null) ? $md->panjang_loa.' m' : '-';
        	$panjang_lbp = ($md->panjang_lbp != null) ? $md->panjang_lbp.' m' : '-';
        	$lebar 		 = ($md->lebar != null) ? $md->lebar.' m' : '-';
        	$tinggi 	 = ($md->tinggi != null) ? $md->tinggi.' m' : '-';
        	$kecepatan   = ($md->kecepatan_max != null) ? $md->kecepatan_max.' knot' : '-';
        	$abk   		 = ($md->jml_abk != null) ? $md->jml_abk.' Orang' : '-';
        	$material 	 = ($md->material->nama_material != null) ? $md->material->nama_material : '';
        	$mesin1 	 = ($md->daya_mesin_1 != null) ? $md->daya_mesin_1.' HP' : '-';
        	$mesin2 	 = ($md->daya_mesin_2 != null) ? $md->daya_mesin_2.' HP' : '-';

        	return '<ul style="padding-left:20px; font-size:0.9em">
        				<li>
        				Panjang (LOA) : '.$panjang_loa.'
        				</li>
        				<li>
        				Panjang antara (LBP) : '.$panjang_lbp.'
        				</li>
        				<li>
        				Lebar : '.$lebar.'
        				</li>
        				<li>
        				Tinggi : '.$tinggi.'
        				</li>
        				<li>
        				Kecepatan Maks : '.$kecepatan.'
        				</li>
        				<li>
        				Jumlah ABK : '.$abk.'
        				</li>
        				<li>
        				Material : '.$material.'
        				</li>
        				<li>
        				Daya Mesin :
	        				<ol style="padding-left:15px;">
								<li>
								Main Engine : '.$mesin1.'
								</li>
								<li>
								Auxelary Engine : '.$mesin2.'
								</li>
	        				</ol>
        				</li>
        			</ul>
        			';
        })
        // ->addColumn('material', function($md){
        // 	return $md->material->nama_material;
        // })
        // ->addColumn('personil', function($md2){
        // 	return '<li>1 Orang Pengawas Perikanan </li>
        // 			<li>2 Orang Awak Kapal Pengawas Perikanan </li>
        // 			<li>3 Orang Polisi Khusus Pengawas Pesisir & Pulau kecil </li>
        // 			';
        // })
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
			if((isset($input['id_upt']) && $input['id_upt'] != null) || (isset($input['id_pos']) && $input['id_pos'] != null) || (isset($input['id_satker']) && $input['id_satker'] != null)){
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
			}
			
			$this->kapalpengawas->nama_kapal_pengawas 	= $input['nama_kapal_pengawas'];			
			// $this->kapalpengawas->spesifikasi 			= $input['spesifikasi'];
			$this->kapalpengawas->image 				= $this->createImage($input['gambar_kapal_pengawas'], false, 'kapal_pengawas', 1000);
			$this->kapalpengawas->id_material 			= $input['id_material'];
			$this->kapalpengawas->panjang_loa			= $input['panjang_loa'];
			$this->kapalpengawas->panjang_lbp			= $input['panjang_lbp'];
			$this->kapalpengawas->lebar 				= $input['lebar'];
			$this->kapalpengawas->tinggi 				= $input['tinggi'];
			$this->kapalpengawas->sarat 				= $input['sarat'];
			$this->kapalpengawas->kecepatan_max			= $input['kecepatan_max'];
			$this->kapalpengawas->jml_abk				= $input['jml_abk'];
			$this->kapalpengawas->daya_mesin_1			= $input['daya_mesin_1'];
			$this->kapalpengawas->daya_mesin_2			= $input['daya_mesin_2'];
			$this->kapalpengawas->id_type_kapal			= $input['id_type_kapal'];
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