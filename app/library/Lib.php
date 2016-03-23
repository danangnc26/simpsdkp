<?php

Class Lib{

	public static function getNamaProvinsi()
	{
		$provinsi = MasterProvinsi::all();
		return $provinsi;
	}

	public static function getNamaKota()
	{

	}

	public static function getListProvinsi($id_prov = '')
	{
		$d[''] = '';
		$provinsi = MasterProvinsi::all();
		foreach ($provinsi as $key => $value) {
			$d[$value->id_provinsi] = $value->nama_provinsi;
		}
		return $d;
	}

	public static function getListKota($id_kota = '')
	{

		$d[0] = '-- Pilih Kota --';
		if(isset($id_kota) && !empty($id_kota)){
			$kota = MasterKota::where('id_provinsi', '=', $id_kota)->get();
		}else{
			$kota = MasterKota::all();
		}
		foreach ($kota as $key => $value) {
			$d[$value->id_kota] = $value->nama_kota;
		}
		return $d;

	}

	public static function getListSarana($id_sarana = '')
	{
		$d[''] = '-- Pilih Sarana --';
		
		if(isset($id_sarana) && !empty($id_sarana)){
			$data= MasterSarana::where('id_sarana', '=', $id_sarana)->get();
		}else{
			$data = MasterSarana::all();
		}
		foreach ($data as $key => $value) {
			$d[$value->id_sarana] = $value->nama_sarana;
		}
		return $d;

	}

	public static function getListUPT($id_upt = '')
	{
		$d[''] = '-- Pilih UPT --';
		
		if(isset($id_upt) && !empty($id_upt)){
			$data= UPTModel::where('id_upt', '=', Crypt::decrypt($id_upt))->get();
		}else{
			$data = UPTModel::all();
		}
		foreach ($data as $key => $value) {
			$d[$value->id_upt] = $value->nama_upt;
		}
		return $d;

	}

	public static function getListMaterial($id_material = '')
	{

		$d[''] = '-- Pilih Material --';
		
		if(isset($id_material) && !empty($id_material)){
			$data= MasterMaterial::where('id_material', '=', $id_material)->get();
		}else{
			$data = MasterMaterial::all();
		}
		foreach ($data as $key => $value) {
			$d[$value->id_material] = $value->nama_material;
		}
		return $d;

	}

	public static function getListNegara($id_negara = '')
	{
		$d[''] = '-- Pilih Bendera Negara --';
		
		if(isset($id_negara) && !empty($id_negara)){
			$data= MasterNegara::where('id_negara', '=', $id_negara)->get();
		}else{
			$data = MasterNegara::all();
		}
		foreach ($data as $key => $value) {
			$d[$value->id_negara] = $value->nama_negara;
		}
		return $d;
	}

	public static function getListKapalPengawas($id_kapal = '')
	{
		$d[''] = '-- Pilih Kapal Pengawas --';
		
		if(isset($id_kapal) && !empty($id_kapal)){
			$data= KapalPengawasModel::where('id_kapal_pengawas', '=', $id_kapal)->get();
		}else{
			if(Lib::uRole() == null){

				$data = KapalPengawasModel::all();
				

			}else{

				$data = KapalPengawasModel::where(Lib::sId(), '=', Crypt::decrypt(Lib::getIdSatuan()))->get();
				
			}
		}
		foreach ($data as $key => $value) {
			$d[$value->id_kapal_pengawas] = $value->nama_kapal_pengawas;
		}
		return $d;
	}

	public static function getListAlatTangkap($id_alat = '')
	{
		$d[''] = '-- Pilih Alat Tangkap --';
		
		if(isset($id_alat) && !empty($id_alat)){
			$data= MasterAlatTangkap::where('id_alat_tangkap', '=', $id_alat)->get();
		}else{
			$data = MasterAlatTangkap::all();
		}
		foreach ($data as $key => $value) {
			$d[$value->id_alat_tangkap] = $value->nama_alat_tangkap;
		}
		return $d;
	}

	public static function getNamaPenempatanUser()
	{
		$a = new UsersController();
		$d[] = '';
		
		if($a->getUserRole() == null){

			$d['nama_tempat'] = '';

		}else{

			$b = $a->getUserPlaced();
			if($a->getUserRole() == 'upt'){
				foreach ($b as  $c) {
					foreach($c->upt as $d){
						$d['nama_tempat'] = $d->nama_upt;
					}
				}
			}elseif($a->getUserRole() == 'satker'){
				foreach ($b as  $c) {
					foreach($c->satker as $d){
						$d['nama_tempat'] = $d->nama_satker;
					}
				}
			}elseif($a->getUserRole() == 'pos'){
				foreach ($b as  $c) {
					foreach($c->pos as $d){
						$d['nama_tempat'] = $d->nama_pos;
					}
				}
			}

		}	

		return $d['nama_tempat'];
	}

	public static function uRole()
	{
		$a = new UsersController();
		return $a->getUserRole();
	}

	public static function sId()
	{
		$a = new UsersController();
		if($a->getUserRole() == null){
			$d = '';
		}else{
			if($a->getUserRole() == 'upt'){
				$d = 'id_'.$a->getUserRole();
			}elseif($a->getUserRole() == 'satker'){
				$d = 'id_'.$a->getUserRole();
			}elseif($a->getUserRole() == 'pos'){
				$d = 'id_'.$a->getUserRole();
			}
		}
		return $d;
	}

	public static function getIdSatuan()
	{

		$a = new UsersController();
		$d[] = '';

		if($a->getUserRole() == null){

			$d['id_sat'] = null;

		}else{

			$b = $a->getUserPlaced();
			if($a->getUserRole() == 'upt'){
				foreach ($b as  $c) {
					foreach($c->upt as $d){
						$d['id_sat'] = $d->id_upt;
					}
				}
			}elseif($a->getUserRole() == 'satker'){
				foreach ($b as  $c) {
					foreach($c->satker as $d){
						$d['id_sat'] = $d->id_satker;
					}
				}
			}elseif($a->getUserRole() == 'pos'){
				foreach ($b as  $c) {
					foreach($c->pos as $d){
						$d['id_sat'] = $d->id_pos;
					}
				}
			}

		}	

		return Crypt::encrypt($d['id_sat']);
	}

	public static function enDate($tanggal = '')
	{
		list($d, $m, $y) = explode('-', $tanggal);
		$dt = Carbon::create($y, $m, $d, 1, 1, 1);
		return $dt->format('Y-m-d');
	}

	public static function inDate($tanggal = '')
	{
		list($y, $m, $d) = explode('-', $tanggal);
		$dt = Carbon::create($y, $m, $d, 1, 1, 1);
		return $dt->format('d-m-Y');
	}

	public static function getJumlah($jml = '')
	{
		$d1 = KapalPengawasModel::all()->count();
		$d2 = SpeedboatModel::all()->count();
		$d3 = UPTModel::all()->count();
		$d4 = SatkerModel::all()->count();
		$d5 = PosModel::all()->count();

		switch ($jml) {
			case 'kapal_pengawas':
				$data1 = $d1;
				break;
			case 'speedboat':
				$data1 = $d2;
				break;
			case 'upt':
				$data1 = $d3;
				break;
			case 'satker':
				$data1 = $d4;
				break;
			case 'pos':
				$data1 = $d5;
				break;
			
			default:
				# code...
				break;
		}
		return $data1;
	}

	public static function listTahun()
	{
		$nw = Carbon::now();

		$t_awal = 2000;
		$t_akhir = $nw->year;
		$int = $t_akhir - $t_awal;
		for ($i=0; $i < $int+1; $i++) { 
			$d[$t_awal+$i] = $t_awal+$i;
		}
		return $d;
	}

	public static function version()
	{
		return 'V.0.5.10 Aplha';
	}


}