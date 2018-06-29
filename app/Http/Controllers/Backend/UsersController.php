<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrator;
use App\Models\AdministratorRole;
use App\Http\Requests\Backend\UsersStoreRequest;
use App\Http\Requests\Backend\UsersUpdateRequest;

class UsersController extends Controller
{
    protected $admin;
    protected $role;

    public function __construct(Administrator $admin, AdministratorRole $role){

        $this->admin = $admin;
        $this->role = $role;
    }

    public function index(){

        $can_view = $this->admin->can('view', Administrator::class);
        if(!$can_view){
            return abort(403, 'Unauthorized action.');
        }

        $admins = $this->admin->with('role')->get();
        return view('backend.users.index', compact('admins'));
    }

    public function create(){
        $route = URL::route('admin.users.store');
        $admin = $this->admin->with('role')->where('id', Auth::id())->first();
        return view('backend.users.create', compact('route','admin'));
    }

    public function edit($id){
        $route = URL::route('admin.users.update', $id);
        $admin = $this->admin->with('role')->where('id', Auth::id())->first();
        return view('backend.users.edit', compact('route', 'admin'));
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

        $basket = array_replace($request->expect('_token', 'role'), $replacement_status);

        $admin = $this->admin->where('id', $id)->update($basket);

        $save_role = $this->role->where('administrator_id', $id)->update([
            'role' => $request->input('role')
        ]); 
        
        if($admin){
            return Redirect::route('admin.users.index')->with('success', '帳號新增成功');
        }else{
            return Redirect::route('admin.users.index')->with('success', '帳號新增失敗');
        }

    }

    public function destroy($id){

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
