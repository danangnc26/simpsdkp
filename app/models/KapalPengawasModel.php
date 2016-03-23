<?php

class KapalPengawasModel extends \Eloquent {
	
	protected $table = 'tb_kapal_pengawas';
	public $timestamps = false;
	protected $primaryKey = 'id_kapal_pengawas';

	public function material()
	{
		return $this->hasOne('MasterMaterial', 'id_material', 'id_material');
	}

	public function operasi()
	{
		return $this->hasMany('OperasiModel', 'id_kapal_pengawas', 'id_kapal_pengawas');
	}


}