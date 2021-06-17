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

    public function activity()
    {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.activity.activity', compact('logged'));
    }

    public function all_activity()
    {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;

        $activities = $this->get_all_activity();

        $query = "
            SELECT
                COUNT(if(c.`type` = 0, ua.activity_id, null)) so_hoat_dong_thu,
                COUNT(if(c.`type` = 1, ua.activity_id, null)) so_hoat_dong_chi,
                SUM(if(c.`type` = 0, ua.money_amount, 0)) tong_thu,
                SUM(if(c.`type` = 1, ua.money_amount, 0)) tong_chi
            FROM money_manage.user_activity ua
            JOIN money_manage.category c ON ua.category_id = c.category_id
            WHERE ua.user_id = $user_id;
        ";

        $data = DB::select($query);

        return view('app.activity.activity', compact('logged', 'activities', 'data'));
    }

    public function get_all_activity()
    {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;

        $query = DB::table('user_activity')
            ->join('category', 'user_activity.category_id', '=', 'category.category_id')
            ->where('user_activity.user_id', $user_id)
            ->select('user_activity.name', 'user_activity.money_amount', 'category.type', 'category.name as ten_danh_muc', 'user_activity.describe', 'user_activity.date')
            ->orderBy('user_activity.activity_id', 'desc')
            ->get();

        return $query;
    }

    public function activity_today()
    {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.activity.activity_today', compact('logged'));
    }

    public function activity_month()
    {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.activity.activity', compact('logged'));
    }

    public function add_activity(Request $request)
    {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;
        $datas = $this->get_data_category($user_id);

        return view('app.activity.add_activity', compact('logged', 'datas'));
    }

    public function get_data_activity(Request $request)
    {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;

        $__request = $request->all();
        $data = DB::table('user_activity')
            ->join('category', 'category.category_id', '=', 'user_activity.category_id')
            ->where('user_activity.user_id', $user_id)
            ->where('user_activity.date', $__request["date"])
            ->select('user_activity.name', 'user_activity.money_amount', 'category.type', 'category.name as ten_danh_muc', 'user_activity.describe')
            ->get();

        return $data;
    }

    public function store_activity(Request $request)
    {
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

    public function get_data_category($id)
    {
        $query = DB::table('category')
            ->join('user_category', 'category.category_id', '=', 'user_category.category_id')
            ->where('user_category.user_id', $id)
            ->select('category.name', 'user_category.describe', 'user_category.user_category_id', 'category.category_id');

        $result = $query->get();

        return $result;
    }

    public function edit_activity()
    {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.activity.edit_activity', compact('logged'));
    }
}
