<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login() {
        return view('login');
    }

    public function check(Request $request) {
        $__request = $request->all();
        $email = $__request["email"];

        $account = \App\Models\UserAccount::query()->where('email', $email)->first();

        if (!isset($account) || empty($account)) {
            return back()->withErrors('Tài khoản này không tồn tại.')
                ->withInput();
        }

        $password = $__request["password"];
        $checkPassword = $account->user_password;

        $id = $account->user_id;

        if (strcmp($password, $checkPassword) != 0) {
            return back()->withErrors('Mật khẩu không đúng!')
                ->withInput();
        }

        return redirect()->route('login')->with('success', 'Đăng nhập thành công!');
    }
}
