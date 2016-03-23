<?php

class MasterMaterial extends \Eloquent {
	
	protected $table 		= 'tb_master_material';
	public $timestamps		= false;
	protected $primaryKey 	= 'id_material';

	public function speedboat()
	{
		return $this->belongsTo('SpeedboatModel', 'id_material', 'id_material');
	}

	public function kapalPengawas()
	{
		return $this->belongsTo('KapalPengwasModel', 'id_material', 'id_material');
	}

}