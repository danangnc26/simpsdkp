<?php

class CMSLampiranModel extends \Eloquent {
	protected $fillable 	= [];
	protected $table 		= 'cms_tb_lampiran';
	protected $primaryKey	= 'id_lampiran';
	public $timestamps 		= false;

	public function post()
	{
		return $this->belongsTo('CMSPostModel', 'id_post');
	}
}