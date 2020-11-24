<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role) {
        if ($this->role->contains('name', $role)) {
            return true;
        }
        return false;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function headteacher()
    {
        return $this->hasOne(HeadTeacher::class);
    }

}
