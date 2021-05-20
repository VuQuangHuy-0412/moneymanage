<?php


namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function info() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;
        $user = \App\Models\UserInformation::query()->where('user_id', $user_id)->first();

        return view('app.personal_information', compact('logged', 'user'));
    }

    public function edit_info() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;
        $user = \App\Models\UserInformation::query()->where('user_id', $user_id)->first();

        return view('app.edit_info', compact('logged', 'user'));
    }

    public function store_info(Request $request) {
        $__request = $request->all();

        $logged = auth()->user();
        $id = $logged->user_id;
        $user = \App\Models\UserInformation::query()->where('user_id', $id)->first();
        $user_account = \App\Models\UserAccount::query()->where('user_id', $id)->first();
        if(!empty($__request["user_name"])) {
            $user->user_name = $__request["user_name"];
        }

        if(!empty($__request["date_of_birth"])) {
            $user->date_of_birth = $__request["date_of_birth"];
        }

        if(!empty($__request["gender"])) {
            $user->gender = $__request["gender"];
        }

        if(!empty($__request["phone"])) {
            if(strlen($__request["phone"]) == 10 || strlen($__request["phone"]) == 11) {
                $user->phone = $__request["phone"];
            }
            else return redirect()->route('app.info.edit')->withErrors('Số điện thoại không hợp lệ!');
        }

        if(!empty($__request["email"])) {
            $user->email = $__request["email"];
            $user_account->user_account = $__request["email"];
            $user_account->email = $__request["email"];
        }

        $insert_user = $user->save();
        $insert_account = $user_account->save();

        if ($insert_account && $insert_user) {
            return redirect()->route('app.info.edit')->with('success', 'Cập nhật thông tin thành công!');
        }

        return redirect()->route('app.info.edit')->withErrors('Có lỗi xảy ra!');
    }

    public function change_password() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }
        $user_id = $logged->user_id;
        $user = \App\Models\UserInformation::query()->where('user_id', $user_id)->first();

        return view('app.change_password', compact('logged', 'user'));
    }

    public function save_password(Request $request) {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }
        $user_id = $logged->user_id;
        $account = \App\Models\UserAccount::query()->where('user_id', $user_id)->first();

        $__request = $request->all();
        if (empty($__request["old_password"])) {
            return redirect()->route('app.change-password')->withErrors('Bạn chưa nhập mật khẩu cũ!');
        }

        if ($__request["old_password"] != $account->password) {
            return redirect()->route('app.change-password')->withErrors('Mật khẩu cũ bạn nhập chưa đúng!');
        }

        if (empty($__request["new_password"])) {
            return redirect()->route('app.change-password')->withErrors('Bạn chưa nhập mật khẩu mới!');
        }

        if (empty($__request["renew_password"])) {
            return redirect()->route('app.change-password')->withErrors('Bạn chưa nhập lại mật khẩu mới!');
        }

        if ($__request["new_password"] != $__request["renew_password"]) {
            return redirect()->route('app.change-password')->withErrors('Mật khẩu nhập lại không khớp!');
        }
        $account->password = $__request["new_password"];
        $insert_account = $account->save();

        if ($insert_account) {
            return redirect()->route('app.change-password')->with('success', 'Cập nhật mật khẩu thành công!');
        }

        return redirect()->route('app.change-password')->withErrors('Có lỗi xảy ra!');
    }

    public function inactive_user() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.inactive_user', compact('logged'));
    }

    public function inactive_user_store(Request $request) {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }
        $user_id = $logged->user_id;
        $user = \App\Models\UserInformation::query()->where('user_id', $user_id)->first();

        $__request = $request->all();

        if (empty($__request["reason"])) {
            return redirect()->route('app.inactive-user')->withErrors('Hãy nhập nguyên nhân mà bạn muốn khóa tài khoản!');
        }

        if (!empty($__request["feedback"])) {
            $feedback = new \App\Models\UserFeedback();
            $feedback->user_id = $user_id;
            $feedback->content = $__request["feedback"];

            $insert_feedback = $feedback->save();
            if (!$insert_feedback) {
                return redirect()->route('app.inactive-user')->withErrors('Có lỗi xảy ra!');
            }
        }

        if ($__request["lock"] == 1) {
            $user->active_user = 0;
            $insert_user = $user->save();
            if (!$insert_feedback) {
                return redirect()->route('app.inactive-user')->withErrors('Có lỗi xảy ra!');
            }
            else return redirect()->route('login')->with('success', 'Khóa tài khoản thành công');
        }

        return redirect()->route('app.home');
    }
}
