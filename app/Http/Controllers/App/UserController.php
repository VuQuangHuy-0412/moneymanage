<?php


namespace App\Http\Controllers\App;

use App\Models\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

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
            else return redirect()->route('app.info.edit')->withErrors('S??? ??i???n tho???i kh??ng h???p l???!');
        }

        if(!empty($__request["email"])) {
            $user->email = $__request["email"];
            $user_account->user_account = $__request["email"];
            $user_account->email = $__request["email"];
        }

        $insert_user = $user->save();
        $insert_account = $user_account->save();

        if ($insert_account && $insert_user) {
            return redirect()->route('app.info.edit')->with('success', 'C???p nh???t th??ng tin th??nh c??ng!');
        }

        return redirect()->route('app.info.edit')->withErrors('C?? l???i x???y ra!');
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
            return redirect()->route('app.change-password')->withErrors('B???n ch??a nh???p m???t kh???u c??!');
        }

        if ($__request["old_password"] != $account->password) {
            return redirect()->route('app.change-password')->withErrors('M???t kh???u c?? b???n nh???p ch??a ????ng!');
        }

        if (empty($__request["new_password"])) {
            return redirect()->route('app.change-password')->withErrors('B???n ch??a nh???p m???t kh???u m???i!');
        }

        if (empty($__request["renew_password"])) {
            return redirect()->route('app.change-password')->withErrors('B???n ch??a nh???p l???i m???t kh???u m???i!');
        }

        if ($__request["new_password"] != $__request["renew_password"]) {
            return redirect()->route('app.change-password')->withErrors('M???t kh???u nh???p l???i kh??ng kh???p!');
        }
        $account->password = $__request["new_password"];
        $insert_account = $account->save();

        if ($insert_account) {
            return redirect()->route('app.change-password')->with('success', 'C???p nh???t m???t kh???u th??nh c??ng!');
        }

        return redirect()->route('app.change-password')->withErrors('C?? l???i x???y ra!');
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
            return redirect()->route('app.inactive-user')->withErrors('H??y nh???p nguy??n nh??n m?? b???n mu???n kh??a t??i kho???n!');
        }

        if (!empty($__request["feedback"])) {
            $feedback = new \App\Models\UserFeedback();
            $feedback->user_id = $user_id;
            $feedback->content = $__request["feedback"];

            $insert_feedback = $feedback->save();
            if (!$insert_feedback) {
                return redirect()->route('app.inactive-user')->withErrors('C?? l???i x???y ra!');
            }
        }

        if ($__request["lock"] == 1) {
            $user->active_user = 0;
            $insert_user = $user->save();
            if (!$insert_feedback) {
                return redirect()->route('app.inactive-user')->withErrors('C?? l???i x???y ra!');
            }
            else return redirect()->route('login')->with('success', 'Kh??a t??i kho???n th??nh c??ng');
        }

        return redirect()->route('app.home');
    }

    public function feedback() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;
        $datas = $this->get_data_feedback($user_id);

        return view('app.feedback', compact('logged', 'datas'));
    }

    public function get_data_feedback($id) {
        $query = DB::table('user_feedback')
            ->where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->select('content', 'created_at');

        $results = $query->get();
        return $results;
    }

    public function add_feedback() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.add_feedback', compact('logged'));
    }

    public function store_feedback(Request $request) {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;

        $__request = $request->all();

        if(!isset($__request["content"]) || empty($__request["content"])) {
            return redirect()->route('app.add-feedback')->withErrors('B???n ch??a nh???p n???i dung!');
        }

        $user_feedback = new UserFeedback();
        $user_feedback->user_id = $user_id;
        $user_feedback->content = $__request["content"];

        $insert_feedback = $user_feedback->save();
        if (!$insert_feedback) {
            return redirect()->route('app.add-feedback')->withErrors('C?? l???i x???y ra!');
        }

        return redirect()->route('app.add-feedback')->with('success', 'C???m ??n b???n ???? g??p ??!');
    }
}
