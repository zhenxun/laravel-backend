<?php

namespace App\Policies\Backend;

use App\Models\Administrator;
use App\Models\AdministratorRole;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UsersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the administrator.
     *
     * @param  \App\User  $user
     * @param  \Backend\Administrator  $administrator
     * @return mixed
     */
    public function view(Administrator $admin)/**you fool */
    {
        return $this->checkAdminRole();
    }

    /**
     * Determine whether the user can create administrators.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Administrator $admin)
    {
        return $this->checkAdminRole();
    }

    /**
     * Determine whether the user can update the administrator.
     *
     * @param  \App\User  $user
     * @param  \Backend\Administrator  $administrator
     * @return mixed
     */
    public function update(Administrator $admin)
    {
        return $this->checkAdminRole();
    }

    /**
     * Determine whether the user can delete the administrator.
     *
     * @param  \App\User  $user
     * @param  \Backend\Administrator  $administrator
     * @return mixed
     */
    public function delete(Administrator $admin)
    {
        return  $this->checkAdminRole();
    }

    private function checkAdminRole(){

        $admin = AdministratorRole::where('administrator_id', Auth::id())->first();

        if($admin->role == '1' || $admin->role == '2'){
            return true;
        }else{
            return false;
        }

    }
}
