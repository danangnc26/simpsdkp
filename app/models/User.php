<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	public $timestamps = false;
	protected $primaryKey = 'id';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function upt()
	{
		return $this->belongsToMany('UPTModel', 'users_groups', 'user_id', 'id_upt')->withPivot('id_upt');
	}

	public function satker()
	{
		return $this->belongsToMany('SatkerModel', 'users_groups', 'user_id', 'id_satker');
	}

	public function pos()
	{
		return $this->belongsToMany('PosModel', 'users_groups', 'user_id', 'id_pos');
	}

}
