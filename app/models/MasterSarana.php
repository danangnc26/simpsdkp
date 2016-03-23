<?php

class MasterSarana extends \Eloquent {
	
	protected $table 		= 'tb_master_sarana';
	public $timestamps		= false;
	protected $primaryKey 	= 'id_sarana';

	public function upt()
	{
		return $this->belongsToMany('UPTModel', 'tb_pivot_sarana', 'id_sarana', 'id_upt');
	}

}