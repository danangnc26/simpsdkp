<?php

class MasterKota extends \Eloquent {
	
	protected $table 		= 'tb_kota';
	public $timestamps		= false;
	protected $primaryKey 	= 'id_kota';

	public function UPTkota()
	{
		return $this->hasMany('UPTModel', 'id_kota', 'id_kota');
	}

	public function kapalKota()
	{
		return $this->hasMany('KapalPengawasModel', 'id_kota', 'id_kota');	
	}

	public function kotaProvinsi()
	{
		return $this->belongsTo('MasterProvinsi', 'id_provinsi', 'id_provinsi');
	}

}