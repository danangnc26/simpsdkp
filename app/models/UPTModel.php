<?php

class UPTModel extends \Eloquent {
	
	protected $table = 'tb_upt';
	public $timestamps = false;
	protected $primaryKey = 'id_upt';

	public function kotaUPT()
	{
		return $this->belongsTo('MasterKota', 'id_kota', 'id_kota');
	}

	public function sarana()
	{
		return $this->belongsToMany('MasterSarana', 'tb_pivot_sarana', 'id_upt', 'id_sarana')->withPivot('kondisi', 'jumlah_sarana', 'id_pv_sarana');
	}

	public function speedboat()
	{
		return $this->hasMany('SpeedboatModel');
	}

	// public function distribusi()
 //    {
 //        return $this->belongsToMany('MPenerima', 'p_agenda_penerima', 'id_agenda_surat','id_penerima_surat' );
 //    }

	// public function provinsiUPT()
	// {
	// 	return $this->belongsTo('MasterProvinsi', 'id_provinsi', 'id_provinsi');
	// }

}