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


        $user = \App\Models\UserInformation::query()->where('email', $email)->where('active_user', 1)->first();

        if (isset($__request["logInAsAdmin"]) && $__request["logInAsAdmin"] == 'yes') {
            $admin = $user;
            if (!isset($admin) || empty($admin)) {
                return back()->withErrors('Tài khoản admin này không tồn tại.')
                    ->withInput();
            }

            auth()->login($admin);

            return redirect()->route('admin');
        }

        auth()->login($user);
        return redirect()->route('app.home');
    }

    public function logout() {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->route('login');
    }
}
