<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function role()
	{
		return $this->belongsTo('App\Role');
	}
	
    /**
     * Вычисление прав пользователя на объект, в зав-ти от его роли
     *
     * @elm object
     */	
	public function canEdit($elm) {
		$perm = $this->role->perm;
		return $perm & Role::canEditAll || ($elm->user_id == $this->id && $perm & Role::canEditOwn);
	}
	public function canDelete($elm) {
		$perm = $this->role->perm;
		return $perm & Role::canDeleteAll || ($elm->user_id == $this->id && $perm & Role::canDeleteOwn);
	}
	public function canAdd() {
		$perm = $this->role->perm;
		return $perm & Role::canAdd;
	}
}