<?php

class CMSKategoriModel extends \Eloquent {
	protected $fillable 	= [];
	protected $table 		= 'cms_tb_kategori';
	protected $primaryKey	= 'id_kategori';
	public $timestamps 		= false;


	public function parent()
    {
        return $this->belongsTo('CMSKategoriModel', 'kategori_utama');
    }

    public function children()
    {
        return $this->hasMany('CMSKategoriModel', 'kategori_utama');
    }

    public function post()
    {
        return $this->belongsToMany('CMSPostModel', 'cms_tb_pivot_kategori_post', 'id_kategori', 'id_post');
    }

}