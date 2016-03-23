<?php

class MasterProvinsi extends \Eloquent {
	
	protected $table = 'tb_provinsi';
	public $timestamps = false;
	protected $primaryKey = 'id_provinsi';

	public function provinsiKota()
	{
		return $this->hasMany('MasterKota', 'id_provinsi', 'id_provinsi');
	}

	

}