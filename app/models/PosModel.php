<?php

class PosModel extends \Eloquent {
	
	protected $table = 'tb_pos';
	public $timestamps = false;
	protected $primaryKey = 'id_pos';

	public function sarana()
	{
		return $this->belongsToMany('MasterSarana', 'tb_pivot_sarana', 'id_pos', 'id_sarana')->withPivot('kondisi', 'jumlah_sarana', 'id_pv_sarana');
	}

}