<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\config;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','is_customer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function AllCustomers(){
        return Self::where('is_customer',config('params.customer'))
             ->where('status',config('params.active'))->get();
    }
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role','model_has_roles','model_id','role_id');
    }

    public function getRole() {
        $userRoles       = $this->roles()->get();
        $assigneRoleName = [];
        if (@count($userRoles) > 1) {
            foreach ($userRoles as $userRole) {
                $assigneRoleName[] = $userRole->role;
            }
            return $assigneRoleName;
        }
        else {
            return $userRoles[0]->role;
        }
    }
}
