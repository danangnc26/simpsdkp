<?php

class CMSLabelModel extends \Eloquent {
	protected $fillable 	= [];
	protected $table 		= 'cms_tb_label';
	protected $primaryKey	= 'id_label';
	public $timestamps 		= false;

	public function post()
    {
        return $this->belongsToMany('CMSPostModel', 'cms_tb_pivot_label_post', 'id_label', 'id_post');
    }
}