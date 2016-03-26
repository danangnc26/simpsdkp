<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login', ['as' => 'users.login', function(){
		return View::make('misc.users.login2');
}]);


Route::post('authenticate', ['as' => 'users.authenticate', 'uses' => 'UsersController@store']);
	
Route::group(['before' => 'auth'], function(){

	#----------------------------# ADMIN #----------------------------#

	#Dashboard
	Route::get('admin/dashboard', ['as' => 'admin.dashboard', 'uses' => 'AdminGlobalController@dashboard']);

	#UPT
	$upt = 'UPTController@';
	Route::get('admin/upt/api', ['as' => 'admin.upt.api', 'uses' => $upt.'getDataListUPT']);
	Route::get('admin/upt/index', ['as' => 'admin.upt.index', 'uses' => $upt.'index']);
	Route::get('admin/upt/create', ['as' => 'admin.upt.create', 'uses' => $upt.'create']);	
	Route::post('admin/upt/save', ['as' => 'admin.upt.save', 'uses' => $upt.'store']);
	Route::get('admin/upt/edit', ['as' => 'admin.upt.edit', 'uses' => $upt.'edit']);
	Route::post('admin/upt/update', ['as' => 'admin.upt.update', 'uses' => $upt.'update']);
	Route::get('admin/upt/delete', ['as' => 'admin.upt.delete', 'uses' => $upt.'destroy']);

	#Satker
	$satker = 'SatkerController@';
	Route::get('admin/upt/satker/api', ['as' => 'admin.upt.satker.api', 'uses' => $satker.'getDataSatkerCurrentUPT']);
	Route::get('admin/upt/satker/table', ['as' => 'admin.upt.satker.table', 'uses' => $satker.'pgUPTSatker']);
	Route::get('admin/upt/satker/input', ['as' => 'admin.upt.satker.input', 'uses' => $satker.'inputSatker']);
	Route::post('admin/upt/satker/saveSatker', ['as' => 'admin.upt.satker.saveSatker', 'uses' => $satker.'saveSatker']);
	Route::get('admin/upt/satker/edit', ['as' => 'admin.upt.satker.edit', 'uses' => $satker.'editSatker']);
	Route::post('admin/upt/satker/updateSatker', ['as' => 'admin.upt.satker.updateSatker', 'uses' => $satker.'updateSatker']);
	Route::get('admin/upt/satker/deleteSatker', ['as' => 'admin.upt.satker.deleteSatker', 'uses' => $satker.'destroy']);

	#Pos
	$pos = 'PosController@';
	Route::get('admin/upt/pos/api', ['as' => 'admin.upt.pos.api', 'uses' => $pos.'getDataPosCurrentUPT']);
	Route::get('admin/upt/pos/table', ['as' => 'admin.upt.pos.table', 'uses' => $pos.'pgUPTPos']);
	Route::get('admin/upt/pos/input', ['as' => 'admin.upt.pos.input', 'uses' => $pos.'inputPos']);
	Route::post('admin/upt/pos/savePos', ['as' => 'admin.upt.pos.savePos', 'uses' => $pos.'savePos']);
	Route::get('admin/upt/pos/edit', ['as' => 'admin.upt.pos.edit', 'uses' => $pos.'editPos']);
	Route::post('admin/upt/pos/updatePos', ['as' => 'admin.upt.pos.updatePos', 'uses' => $pos.'updatePos']);
	Route::get('admin/upt/pos/deletePos', ['as' => 'admin.upt.pos.deletePos', 'uses' => $pos.'destroy']);

	if(Lib::uRole() == 'upt'){
		Route::get('admin/upt/manageUPT', ['as' => 'admin.upt.manage', 'uses' => $upt.'show']);
	}elseif(Lib::uRole() == 'satker'){
		Route::get('admin/upt/manageUPT', ['as' => 'admin.upt.manage', 'uses' => $satker.'show']);
	}elseif(Lib::uRole() == 'pos'){
		Route::get('admin/upt/manageUPT', ['as' => 'admin.upt.manage', 'uses' => $pos.'show']);
	}else{
		Route::get('admin/upt/manageUPT', ['as' => 'admin.upt.manage', 'uses' => $upt.'show']);
	}

	#Sarana
	$sarana = 'SaranaController@';
	Route::get('admin/upt/sarana/api', ['as' => 'admin.upt.sarana.api', 'uses' => $sarana.'getDataSaranaCurrentUPT']);
	Route::get('admin/upt/sarana/table', ['as' => 'admin.upt.sarana.table', 'uses' => $sarana.'pgUPTSarana']);
	Route::get('admin/upt/sarana/input', ['as' => 'admin.upt.sarana.input', 'uses' => $sarana.'inputSarana']);
	Route::post('admin/upt/sarana/saveSarana', ['as' => 'admin.upt.sarana.saveSarana', 'uses' => $sarana.'saveSarana']);
	Route::get('admin/upt/sarana/edit', ['as' => 'admin.upt.sarana.edit', 'uses' => $sarana.'editSarana']);
	Route::post('admin/upt/sarana/updateSarana', ['as' => 'admin.upt.sarana.updateSarana', 'uses' => $sarana.'updateSarana']);
	Route::get('admin/upt/sarana/deleteSarana', ['as' => 'admin.upt.sarana.deleteSarana', 'uses' => $sarana.'destroy']);

	#Speedboat
	$speedboat = 'SpeedboatController@';
	Route::get('admin/upt/speedboat/api', ['as' => 'admin.upt.speedboat.api', 'uses' => $speedboat.'getDataSpeedboatCurrentUPT']);
	Route::get('admin/upt/speedboat/table', ['as' => 'admin.upt.speedboat.table', 'uses' => $speedboat.'pgUPTSpeedboat']);
	Route::get('admin/upt/speedboat/input', ['as' => 'admin.upt.speedboat.input', 'uses' => $speedboat.'inputSpeedboat']);
	Route::post('admin/upt/speedboat/saveSpeedboat', ['as' => 'admin.upt.speedboat.saveSpeedboat', 'uses' => $speedboat.'saveSpeedboat']);
	Route::get('admin/upt/speedboat/edit', ['as' => 'admin.upt.speedboat.edit', 'uses' => $speedboat.'editSpeedboat']);
	Route::post('admin/upt/speedboat/updateSpeedboat', ['as' => 'admin.upt.speedboat.updateSpeedboat', 'uses' => $speedboat.'updateSpeedboat']);
	Route::get('admin/upt/speedboat/deleteSpeedboat', ['as' => 'admin.upt.speedboat.deleteSpeedboat', 'uses' => $speedboat.'destroy']);

	#KapalPengawas
	$kapalpengawas = 'KapalPengawasController@';
	Route::get('admin/upt/kapal_pengawas/api', ['as' => 'admin.upt.kapal_pengawas.api', 'uses' => $kapalpengawas.'getDataKapalPengawasCurrentUPT']);
	Route::get('admin/upt/kapal_pengawas/table', ['as' => 'admin.upt.kapal_pengawas.table', 'uses' => $kapalpengawas.'pgUPTKapalPengawas']);
	Route::get('admin/upt/kapal_pengawas/input', ['as' => 'admin.upt.kapal_pengawas.input', 'uses' => $kapalpengawas.'inputKapalPengawas']);
	Route::post('admin/upt/kapal_pengawas/saveKapalPengawas', ['as' => 'admin.upt.kapal_pengawas.saveKapalPengawas', 'uses' => $kapalpengawas.'saveKapalPengawas']);
	Route::get('admin/upt/kapal_pengawas/edit', ['as' => 'admin.upt.kapal_pengawas.edit', 'uses' => $kapalpengawas.'editKapalPengawas']);
	Route::post('admin/upt/kapal_pengawas/updateKapalPengawas', ['as' => 'admin.upt.kapal_pengawas.updateKapalPengawas', 'uses' => $kapalpengawas.'updateKapalPengawas']);
	Route::get('admin/upt/kapal_pengawas/deleteKapalPengawas', ['as' => 'admin.upt.kapal_pengawas.deleteKapalPengawas', 'uses' => $kapalpengawas.'destroy']);


	#Master
	$masterall = 'MasterAllController@';

	#MasterAlatTangkap
	Route::get('admin/master/alat_tangkap/api', ['as' => 'api.admin.master.alat_tangkap', 'uses' => $masterall.'getDataTableMasterAlatTangkap']);
	Route::get('admin/master/alat_tangkap/create', ['as' => 'admin.master.alat_tangkap.create', 'uses' => $masterall.'createDataMasterAlatTangkap']);
	Route::post('admin/master/alat_tangkap/save', ['as' => 'admin.master.alat_tangkap.save', 'uses' => $masterall.'saveDataMasterAlatTangkap']);
	Route::get('admin/master/alat_tangkap/edit', ['as' => 'admin.master.alat_tangkap.edit', 'uses' => $masterall.'editDataMasterAlatTangkap']);
	Route::post('admin/master/alat_tangkap/update', ['as' => 'admin.master.alat_tangkap.update', 'uses' => $masterall.'updateDataMasterAlatTangkap']);
	Route::get('admin/master/alat_tangkap/delete', ['as' => 'admin.master.alat_tangkap.delete', 'uses' => $masterall.'deleteDataMasterAlatTangkap']);

	#Material
	Route::get('admin/master/material/api', ['as' => 'api.admin.master.material', 'uses' => $masterall.'getDataTableMasterMaterial']);
	Route::get('admin/master/material/create', ['as' => 'admin.master.material.create', 'uses' => $masterall.'createDataMasterMaterial']);
	Route::post('admin/master/material/save', ['as' => 'admin.master.material.save', 'uses' => $masterall.'saveDataMasterMaterial']);
	Route::get('admin/master/material/edit', ['as' => 'admin.master.material.edit', 'uses' => $masterall.'editDataMasterMaterial']);
	Route::post('admin/master/material/update', ['as' => 'admin.master.material.update', 'uses' => $masterall.'updateDataMasterMaterial']);
	Route::get('admin/master/material/delete', ['as' => 'admin.master.material.delete', 'uses' => $masterall.'deleteDataMasterMaterial']);

	#Sarana
	Route::get('admin/master/sarana/api', ['as' => 'api.admin.master.sarana', 'uses' => $masterall.'getDataTableMasterSarana']);
	Route::get('admin/master/sarana/create', ['as' => 'admin.master.sarana.create', 'uses' => $masterall.'createDataMasterSarana']);
	Route::post('admin/master/sarana/save', ['as' => 'admin.master.sarana.save', 'uses' => $masterall.'saveDataMasterSarana']);
	Route::get('admin/master/sarana/edit', ['as' => 'admin.master.sarana.edit', 'uses' => $masterall.'editDataMasterSarana']);
	Route::post('admin/master/sarana/update', ['as' => 'admin.master.sarana.update', 'uses' => $masterall.'updateDataMasterSarana']);
	Route::get('admin/master/sarana/delete', ['as' => 'admin.master.sarana.delete', 'uses' => $masterall.'deleteDataMasterSarana']);

	#Negara
	Route::get('admin/master/negara/api', ['as' => 'api.admin.master.negara', 'uses' => $masterall.'getDataTableMasterNegara']);
	Route::get('admin/master/negara/create', ['as' => 'admin.master.negara.create', 'uses' => $masterall.'createDataMasterNegara']);
	Route::post('admin/master/negara/save', ['as' => 'admin.master.negara.save', 'uses' => $masterall.'saveDataMasterNegara']);
	Route::get('admin/master/negara/edit', ['as' => 'admin.master.negara.edit', 'uses' => $masterall.'editDataMasterNegara']);
	Route::post('admin/master/negara/update', ['as' => 'admin.master.negara.update', 'uses' => $masterall.'updateDataMasterNegara']);
	Route::get('admin/master/negara/delete', ['as' => 'admin.master.negara.delete', 'uses' => $masterall.'deleteDataMasterNegara']);

	#Master All
	Route::get('admin/master/all/index', ['as' => 'master.all.index', 'uses' => $masterall.'index']);

	#Operasi
	$operasi = 'OperasiController@';
	Route::get('admin/operasi/index', ['as' => 'admin.operasi.index', 'uses' => $operasi.'index']);
	Route::get('admin/operasi/data/api', ['as' => 'admin.operasi.data.api', 'uses' => $operasi.'getDataOperasi']);
	Route::get('admin/operasi/create', ['as' => 'admin.operasi.create', 'uses' => $operasi.'create']);
	Route::post('admin/operasi/save', ['as' => 'admin.operasi.save', 'uses' => $operasi.'store']);

	#Grafik
	Route::get('admin/grafik/bar', ['as' => 'admin.grafik.bar', 'uses' => 'AdminGlobalController@viewBar']);
	Route::get('admin/grafik/bar/data/api', ['as' => 'admin.grafik.bar.api', 'uses' => 'AdminGlobalController@apiBar']);
	Route::get('admin/grafik/pie', ['as' => 'admin.grafik.pie', 'uses' => 'AdminGlobalController@viewPie']);


	#CMS
	//Post
	$cms_post = 'CMSPostController@';
	Route::get('admin/cms/index', ['as' => 'admin.cms.post.index.all', 'uses' => $cms_post.'index']);
	Route::get('admin/cms/create', ['as' => 'admin.cms.post.create', 'uses' => $cms_post.'create']);

	//Kategori
	$cms_kategori = 'CMSKategoriController@';
	Route::get('admin/cms/kategori/index', ['as' => 'admin.cms.kategori.index', 'uses' => $cms_kategori.'index']);
	Route::get('admin/cms/kategori/api', ['as' => 'admin.cms.kategori.api', 'uses' => $cms_kategori.'getListKategori']);
	Route::get('admin/cms/kategori/create', ['as' => 'admin.cms.kategori.create', 'uses' => $cms_kategori.'create']);
	Route::post('admin/cms/kategori/save', ['as' => 'admin.cms.kategori.save', 'uses' => $cms_kategori.'store']);
	Route::get('admin/cms/kategori/edit', ['as' => 'admin.cms.kategori.edit', 'uses' => $cms_kategori.'edit']);
	Route::post('admin/cms/kategori/update', ['as' => 'admin.cms.kategori.update', 'uses' => $cms_kategori.'update']);
	Route::get('admin/cms/kategori/delete', ['as' => 'admin.cms.kategori.delete', 'uses' => $cms_kategori.'destroy']);

	#Users
	$users = 'UsersController@';
	Route::get('admin/users/index', ['as' => 'admin.users.index', 'uses' => $users.'index']);
	Route::get('admin/users/api', ['as' => 'admin.users.api', 'uses' => $users.'getDataUsers']);
	

	#Logout
	Route::get('admin/logout', ['as' => 'users.logout', 'uses' => 'UsersController@destroy']);

	#ChainProvinsi
	Route::post('admin/plug/chainKota', ['as' => 'chain.kota', function(){
		if(Request::ajax()){
			$id_provinsi = Input::get('id_provinsi');
			$kota = MasterKota::where('id_provinsi', '=', $id_provinsi)->get();
			foreach ($kota as $key => $value) {
				$d[] = '<option value="'.$value->id_kota.'">'.$value->nama_kota.'</option>';
			}
			return implode('\n', $d);
		}
	}]);
});

Route::get('test', function(){
	$user = Sentry::getUser();
	$role = $user->getGroups();
	foreach ($user->groups as $value) {
		$d[] = $value->func;
	}
	$role_user = implode('', $d);
	// return User::with($role_user)->where('id', '=', $user->id)->get();
	// return Lib::getNamaPenempatanUser();
	return $role_user;
});

Route::get('test2', function(){
	
			$t_awal = 2011;
			$t_akhir = 2016;
			$selisih = $t_akhir - $t_awal;
			for ($i=0; $i < $selisih+1; $i++) { 
				$tahun[] = $t_awal+$i;
			}
			return $tahun;



	// return KapalPengawasModel::where(Lib::sId(), '=', Crypt::decrypt(Lib::getIdSatuan()))->get();
	// $n = OperasiModel::all();
	// foreach($n as $value){
	// 	return $value->kapalpengawas;
	// }

});

Route::get('tesroute', ['as' => 'tes', 'uses' => 'UsersController@index']);

