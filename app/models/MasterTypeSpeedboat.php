<?php

class MasterTypeSpeedboat extends \Eloquent {
	protected $table 		= 'tb_type_speedboat';
	public $timestamps		= false;
	protected $primaryKey 	= 'id_type_speedboat';

	public function speedboat()
	{
		return $this->hasMany('SpeedboatModel', 'id_type_speedboat', 'id_type_speedboat');
	}
}