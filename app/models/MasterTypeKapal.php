<?php

class MasterTypeKapal extends \Eloquent {
	protected $table 		= 'tb_type_kapal';
	public $timestamps		= false;
	protected $primaryKey 	= 'id_type_kapal';

	public function kapalpengawas()
	{
		return $this->hasMany('KapalPengawasModel', 'id_type_kapal', 'id_type_kapal');
	}

}