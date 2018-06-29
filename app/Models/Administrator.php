<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\AdministratorRole;

class Administrator extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'status', 'password',
    ];    

    protected $hidden = [
        'remember_token',
    ];

    public function role(){
        return $this->hasOne(AdministratorRole::class, 'administrator_id');
    }
}
