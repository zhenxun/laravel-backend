<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;

class DashboardController extends BackendController
{
    public function __construct(){

    }

    public function index(){

        return view('backend.dashboard.index');

    }

}
