<?php
use Illuminate\Support\Collection;

class SaranaController extends \CoreController {

	public function __construct()
	{
		$this->sarana = new MasterSarana();
		$this->delete_sarana = "'".route('admin.upt.sarana.deleteSarana', 'id_pv_sarana=')."'";
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

	public function getDataSaranaCurrentUPT()
	{
		if(Lib::uRole() == null){
			$id = $this->decrypt(Request::get('id_upt'));
			$src = 'id_upt';
		}else{
			$id =  $this->decrypt(Lib::getIdSatuan());
			$src = Lib::sId();
		}

		$data = DB::table('tb_pivot_sarana')
									->join('tb_master_sarana', 'tb_pivot_sarana.id_sarana', '=', 'tb_master_sarana.id_sarana')
									->select('id_pv_sarana', 'nama_sarana', 'jumlah_sarana', 'kondisi')->where($src, '=', $id)->get();

		return Datatable::collection(new Collection($data))
        ->showColumns('nama_sarana', 'jumlah_sarana', 'kondisi')
        ->addColumn('id_sarana', function($md){
        	$id = "'".$this->encrypt($md->id_pv_sarana)."'";
        	return '<button href="'.route('admin.upt.sarana.edit', 'id_pv_sarana='.$this->encrypt($md->id_pv_sarana)).'" type="button" style="margin-right:0px;" class="btn btn-xs blue ubah-sarana">
							<i class="fa fa-edit"></i> Edit
					</button>
        			<button onclick="hapus('.$id.','.$this->confirm_delete.', '.$this->delete_sarana.')" type="button" style="margin-right:0px;" class="btn btn-xs red">
							<i class="fa fa-trash"></i> Hapus
					</button>';

        })
        ->searchColumns('nama_sarana')
        ->orderColumns('nama_sarana')
        ->make();

        // $id = $this->decrypt(Request::get('id_upt'));
		// $data = UPTModel::with('sarana')->where('id_upt', '=', $id)->get();
		// if(!empty($data)){
		// 	// foreach($data as $key => $value){
		// 	// 	foreach ($value->sarana as $key2 => $value2) {
		// 	// 		$d[] = ['nama_sarana' => $value2->nama_sarana, 'jumlah_sarana' => $value2->pivot->jumlah_sarana, 'kondisi' => $value2->pivot->kondisi];
		// 	// 	}
		// 	// }
		// }else{
		// 		$d = [];
		// }

	}

	public function pgUPTSarana()
	{
		return View::make('page.admin.sarana.addon.data_table');
	}

	public function inputSarana()
	{
		if(Request::ajax()){
			return View::make('page.admin.sarana.addon.input');
		}
	}

	public function saveSarana()
	{
		if(Request::ajax()){

			$input = Input::all();
			if(Lib::uRole() == null){
				$id = $this->decrypt($input['id_upt']);
			}else{
				$id = $this->decrypt(Lib::getIdSatuan());
			}

			$d[$id] = ['id_sarana' => $input['nama_sarana'], 'jumlah_sarana' => $input['jumlah_sarana'], 'kondisi' => $input['kondisi_sarana']];
			
			if(Lib::uRole() == 'upt'){
				$att = UPTModel::find($id);
			}elseif(Lib::uRole() == 'pos'){
				$att = PosModel::find($id);
			}elseif(Lib::uRole() == 'satker'){
				$att = SatkerModel::find($id);
			}else{
				$att = UPTModel::find($id);
			}

			$att->sarana()->attach($d);

			$respon = ['status' => true, 'msg' => $this->input_success];
			return Response::json($respon);

		}
	}

	public function editSarana()
	{
		if(Request::ajax()){
			$data = DB::table('tb_pivot_sarana')
									->join('tb_master_sarana', 'tb_pivot_sarana.id_sarana', '=', 'tb_master_sarana.id_sarana')
									->select('id_pv_sarana', 'tb_pivot_sarana.id_sarana', 'jumlah_sarana', 'id_upt', 'kondisi')->where('id_pv_sarana', '=', $this->decrypt(Request::get('id_pv_sarana')))->get();
			return View::make('page.admin.sarana.addon.edit')->with(['data' => $data]);
		}
	}

	public function updateSarana()
	{
		if(Request::ajax()){

			$input = Input::all();
			$id = $this->decrypt($input['id_pv_sarana']);

			// $att = UPTModel::find($id)->sarana;

			// foreach($att as $upd){

			// 	$upd->pivot->jumlah_sarana = $input['jumlah_sarana'];
			// 	$upd->pivot->save();

			// }		

			DB::table('tb_pivot_sarana')->where('id_pv_sarana', $id)
										->update(['id_sarana' => $input['nama_sarana'], 'jumlah_sarana' => $input['jumlah_sarana'], 'kondisi' => $input['kondisi_sarana']]);

			$respon = ['status' => true, 'msg' => $this->input_success];
			return Response::json($respon);

		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sarana/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sarana
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /sarana/{id}
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
	 * GET /sarana/{id}/edit
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
	 * PUT /sarana/{id}
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
	 * DELETE /sarana/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){

			DB::table('tb_pivot_sarana')->where('id_pv_sarana','=',$this->decrypt(Request::get('id_pv_sarana')))->delete();

			$respon = ['status' => true, 'msg' => $this->delete_message];

			return Response::json($respon);

		}
	}

}