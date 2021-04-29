<?php


namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class RegisterController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $__request = $request->all();
        $email = $__request["email"];

        $exist = \App\Models\UserInformation::query()->where('email', $email)->first();

        if (isset($exist) && !empty($exist)) {
            return back()->withErrors('Tài khoản này đã tồn tại.')
                ->withInput();
        }

        $user = new \App\Models\UserInformation();

        $user->user_name = $__request["user_name"];
        $user->date_of_birth = $__request["date_of_birth"];
        $user->gender = $__request["gender"];
        $user->active_user = 1;
        $user->email = $__request["email"];

        $account = new \App\Models\UserAccount();

        $account->user_account = $__request["email"];
        $account->email = $__request["email"];
        $account->user_password = $__request["password"];

        if (empty($__request["email"])) {
            return back()->withErrors('Email không được để trống.')
                ->withInput();
        }

        if (empty($__request["password"])) {
            return back()->withErrors('Password không được để trống.')
                ->withInput();
        }

        if (empty($__request["repassword"])) {
            return back()->withErrors('Vui lòng xác nhận lại mật khẩu.')
                ->withInput();
        }

        if (strcmp($__request["password"], $__request["repassword"]) != 0) {
            return back()->withErrors('Email không được để trống.')
                ->withInput();
        }

        $insert_user = $user->save();

        $user_info = \App\Models\UserInformation::query()->where('email', $user->email)->first();
        $account->user_id = $user_info->user_id;

        $insert_account = $account->save();

        if ($insert_account && $insert_user) {
            return redirect()->route('login')->with('success', 'Tạo tài khoản thành công!');
        }

        return redirect()->route('login')->with('Có lỗi xảy ra!');
    }
}
