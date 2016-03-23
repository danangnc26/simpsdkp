<?php

class SatkerModel extends \Eloquent {

	protected $table = 'tb_satker';
	public $timestamps = false;
	protected $primaryKey = 'id_satker';

	public function sarana()
	{
		return $this->belongsToMany('MasterSarana', 'tb_pivot_sarana', 'id_satker', 'id_sarana')->withPivot('kondisi', 'jumlah_sarana', 'id_pv_sarana');
	}

}