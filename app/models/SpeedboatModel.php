<?php

class SpeedboatModel extends \Eloquent {
	
	protected $table = 'tb_speedboat';
	public $timestamps = false;
	protected $primaryKey = 'id_speedboat';

	public function upt()
	{
		return $this->belongsTo('UPTModel');
	}

	public function material()
	{
		return $this->hasOne('MasterMaterial', 'id_material', 'id_material');
	}

}