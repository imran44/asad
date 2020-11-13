<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole

{

	public function users()
	{
		return $this->BelongsToMany('App\User');

	}
	public function permissions()
	{
		return $this->BelongsToMany('App\Permission');
	}
}