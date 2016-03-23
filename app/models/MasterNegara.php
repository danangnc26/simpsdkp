<?php

class MasterNegara extends \Eloquent {
	
	protected $table 		= 'tb_negara';
	public $timestamps		= false;
	protected $primaryKey 	= 'id_negara';

	public function operasi()
	{
		return $this->hasMany('OperasiModel', 'id_negara', 'id_negara');
	}

}