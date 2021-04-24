<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PasswordController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function password() {
        return view('password');
    }

    public function get_password(Request $request) {
        $__request = $request->all();
        $email = $__request["email"];

        if (empty($email)) {
            return back()->withErrors('Vui lòng nhập email của bạn!')
                ->withInput();
        }

        $account = \App\Models\UserAccount::query()->where('email', $email)->first();

        if (!isset($account) || empty($account)) {
            return back()->withErrors('Tài khoản này không tồn tại.')
                ->withInput();
        }

        return redirect()->route('login')->with('success', 'Vui lòng kiểm tra email để lấy lại mật khẩu của bạn!');
    }
}
