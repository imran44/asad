<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

	public function roles()
    {
        return $this->BelongsToMany('App\Role');
    }
}