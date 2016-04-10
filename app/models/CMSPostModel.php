<?php

class CMSPostModel extends \Eloquent {
	protected $fillable 	= [];
	protected $table 		= 'cms_tb_post';
	protected $primaryKey	= 'id_post';

	public function kategori()
    {
        return $this->belongsToMany('CMSKategoriModel', 'cms_tb_pivot_kategori_post', 'id_post', 'id_kategori');
    }

    public function author()
    {
    	return $this->belongsTo('User', 'user_id');
    }

    public function lampiran()
    {
        return $this->hasMany('CMSLampiranModel', 'id_post');
    }

    public function label()
    {
        return $this->belongsToMany('CMSLabelModel', 'cms_tb_pivot_label_post', 'id_post', 'id_label');
    }

}