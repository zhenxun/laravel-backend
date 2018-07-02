<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BackendController;

class DashboardController extends BackendController
{
    public function __construct(){
        $title = $this->getHeaderTitle();
        $title = $this->getHeaderTitle();
    }

    public function index(){
        $permit = Auth::guard('admin')->user()->isPermit();

        return view('backend.dashboard.index', compact('permit'));

    }

}
