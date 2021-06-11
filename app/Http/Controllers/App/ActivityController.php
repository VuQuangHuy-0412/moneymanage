<?php


namespace App\Http\Controllers\App;

use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class ActivityController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function activity() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.activity.activity', compact('logged'));
    }

    public function all_activity() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.activity.activity', compact('logged'));
    }

    public function activity_today() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.activity.activity', compact('logged'));
    }

    public function activity_month() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.activity.activity', compact('logged'));
    }

    public function add_activity() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;

        $datas = $this->get_data_category($user_id);

        return view('app.activity.add_activity', compact('logged', 'datas'));
    }

    public function get_data_activity(Request $request) {
        var_dump($request->get('user_id'));
        var_dump($request->get('date'));
        die();
        $query = DB::table('user_activity')
            ->where('user_id')
            ->get();

        return $query;
    }

    public function store_activity(Request $request) {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;
        $__request = $request->all();

        $user_activity = new UserActivity();
        $user_activity->user_id = $user_id;
        $user_activity->category_id = $__request["category_id"];
        $user_activity->name = $__request["name"];
        $user_activity->money_amount = $__request["money_amount"];
        $user_activity->describe = $__request["describe"];
        $user_activity->date = $__request["date"];

        $insert_activity = $user_activity->save();
        if (!$insert_activity) {
            return redirect()->route('app.add-activity')->withErrors('Có lỗi xảy ra!');
        }
        return redirect()->route('app.add-activity')->with('success', 'Thêm hoạt động thành công!');
    }

    public function get_data_category($id) {
        $query = DB::table('category')
            ->join('user_category', 'category.category_id', '=', 'user_category.category_id')
            ->where('user_category.user_id', $id)
            ->select('category.name', 'user_category.describe', 'user_category.user_category_id', 'category.category_id');

        $result = $query->get();

        return $result;
    }

    public function edit_activity() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.activity.activity', compact('logged'));
    }
}
