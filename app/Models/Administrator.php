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

    public function isPermit(){
        $role = $this->role->role;
        return ($role == '1' || $role == '2')? true:false;
    }

    public function superuserOption(){
        $role = $this->role->role;
        return ($role == '1')? true:false;
    }

    public function allUsers($id){
        $admin = $this->find($id);

        if($admin->role->role == '1'){
            $users = $this->all();
        }else{
            $users = $this->with('role')->whereHas('role',function($query){
                $query->where('role', '!=', 1);
            })->get();
        }

        return $users;
    }

    public function oldPassword($id){
        $user = $this->find($id);
        return $user->password;
    }    


}
