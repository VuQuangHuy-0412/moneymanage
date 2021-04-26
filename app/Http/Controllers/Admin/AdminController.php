<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function admin() {
        return view('admin');
    }

    public function create() {
        return view('create_admin');
    }

    public function store() {
    }
}
