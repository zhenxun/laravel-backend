<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrator;
use App\Models\AdministratorRole;
use App\Http\Requests\Backend\UsersStoreRequest;
use App\Http\Requests\Backend\UsersUpdateRequest;

class UsersController extends BackendController
{
    protected $admin;
    protected $role;

    public function __construct(Administrator $admin, AdministratorRole $role){

        $this->admin = $admin;
        $this->role = $role;
        $title = $this->getHeaderTitle();
        $method = $this->getHeaderMethod();
    }

    public function index(){

        $this->candoit('view', Administrator::class);

        $admins = $this->admin->allUsers(Auth::id());
        return view('backend.users.index', compact('admins'));
    }

    public function create(){

        $this->candoit('create', Administrator::class);

        $route = URL::route('admin.users.store');
        $permit = Auth::guard('admin')->user()->superuserOption();
        return view('backend.users.create', compact('route', 'permit'));
    }

    public function edit($id){

        $this->candoit('update', Administrator::class);

        $route = URL::route('admin.users.update', $id);
        $admin = $this->admin->with('role')->where('id', Auth::id())->first();
        $permit = Auth::guard('admin')->user()->superuserOption();
        return view('backend.users.edit', compact('route', 'admin', 'permit'));
    }

    public function store(UsersStoreRequest $request){

        $status = ($request->has('status'))? false:true;

        $replacement_status = array('status' => $status);
        $replacement_password = array('password' => bcrypt($request->input('password')));


        $basket = array_replace($request->except('_token', 'role', 'password_confirmation'), $replacement_status);
        $basket = array_replace($basket, $replacement_password);

        $admin = $this->admin->create($basket);

        $save_role = $admin->role()->create([
            'role' => $request->input('role')
        ]);

        if($admin){
            return Redirect::route('admin.users.index')->with('success', '帳號新增成功');
        }else{
            return Redirect::route('admin.users.index')->with('success', '帳號新增失敗');
        }

    }

    public function update(UsersUpdateRequest $request, $id){

        $status = ($request->has('status'))? false:true;

        $replacement_status = array('status' => $status);
        if(!empty($request->input('password'))){
            $new_password = bcrypt($request->input('password'));
            $replacement_password = array('password' => $new_password);
        }
        else{
            $old_password = $this->admin->oldPassword(Auth::id());
            $replacement_password = array('password' => $old_password);
        }

        $basket = array_replace($request->except('_token', '_method' ,'role', 'password_confirmation'), $replacement_status);
        $basket = array_replace($basket, $replacement_password);



        $admin = $this->admin->where('id', $id)->update($basket);

        $save_role = $this->role->where('administrator_id', $id)->update([
            'role' => $request->input('role')
        ]);

        if($admin){
            return Redirect::route('admin.users.index')->with('success', '帳號儲存成功');
        }else{
            return Redirect::route('admin.users.index')->with('success', '帳號儲存失敗');
        }

    }

    public function destroy($id){

        $this->candoit('delete', Administrator::class);

        $if_admin_exist = $this->admin->where('id', $id)->exist();

        if($if_admin_exist){
            $delete = $this->admin->where('id', $id)->delete();
        }else{
            $delete = false;
        }
        if($delete){
            return Redirect::route('admin.users.index')->with('success', '帳號刪除成功');
        }else{
            return Redirect::route('admin.users.index')->with('success', '帳號刪除失敗');
        }

    }
}
