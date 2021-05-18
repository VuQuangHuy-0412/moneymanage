<?php


namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.home', compact('logged'));
    }
}
