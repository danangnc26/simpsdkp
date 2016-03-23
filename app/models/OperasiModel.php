<?php

class OperasiModel extends \Eloquent {
	
	protected $table = 'tb_operasi';
	public $timestamps = false;
	protected $primaryKey = 'id_operasi';

	public function negara()
	{
		return $this->belongsTo('MasterNegara', 'id_negara', 'id_negara');
	}

	public function kapalpengawas()
	{
		return $this->belongsTo('KapalPengawasModel', 'id_kapal_pengawas', 'id_kapal_pengawas');
	}

}