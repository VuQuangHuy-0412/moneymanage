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

        $activities = $this->get_data_activities_today();

        $user_id = $logged->user_id;

        $query = "
            SELECT
                COUNT(if(c.`type` = 0, ua.activity_id, null)) so_hoat_dong_thu,
                COUNT(if(c.`type` = 1, ua.activity_id, null)) so_hoat_dong_chi,
                SUM(if(c.`type` = 0, ua.money_amount, 0)) tong_thu,
                SUM(if(c.`type` = 1, ua.money_amount, 0)) tong_chi
            FROM money_manage.user_activity ua
            JOIN money_manage.category c ON ua.category_id = c.category_id
            WHERE ua.user_id = $user_id
            AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%d-%m-%Y') = date_format(CURDATE(), '%d-%m-%Y');
        ";

        $data = DB::select($query);

        return view('app.activity.activity_today', compact('logged', 'activities', 'data'));
    }

    public function get_data_activities_today() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;
        $query = "
            SELECT
                ua.name,
                ua.money_amount,
                ua.`describe`,
                c.name AS ten_danh_muc,
                c.`type`
            FROM money_manage.user_activity ua
            JOIN money_manage.category c ON ua.category_id = c.category_id
            WHERE ua.user_id = $user_id
            AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%d-%m-%Y') = date_format(CURDATE(), '%d-%m-%Y');";
        $result = DB::select($query);

        return $result;
    }

    public function activity_month()
    {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $activities = $this->get_data_activities_month();

        $user_id = $logged->user_id;

        $query = "
            SELECT
                COUNT(if(c.`type` = 0, ua.activity_id, null)) so_hoat_dong_thu,
                COUNT(if(c.`type` = 1, ua.activity_id, null)) so_hoat_dong_chi,
                SUM(if(c.`type` = 0, ua.money_amount, 0)) tong_thu,
                SUM(if(c.`type` = 1, ua.money_amount, 0)) tong_chi
            FROM money_manage.user_activity ua
            JOIN money_manage.category c ON ua.category_id = c.category_id
            WHERE ua.user_id = $user_id
            AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%Y-%m') = date_format(CURDATE(), '%Y-%m');
        ";

        $data = DB::select($query);

        return view('app.activity.activity', compact('logged', 'activities', 'data'));
    }

    public function get_data_activities_month() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;
        $query = "
            SELECT
                ua.name,
                ua.money_amount,
                ua.`describe`,
                c.name AS ten_danh_muc,
                c.`type`,
                ua.date
            FROM money_manage.user_activity ua
            JOIN money_manage.category c ON ua.category_id = c.category_id
            WHERE ua.user_id = $user_id
            AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%Y-%m') = date_format(CURDATE(), '%Y-%m');";
        $result = DB::select($query);

        return $result;
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
            ->select('user_activity.name', 'user_activity.money_amount', 'category.type', 'category.name as ten_danh_muc', 'user_activity.describe', 'user_activity.activity_id')
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

        $user_id = $logged->user_id;

        $category = $this->get_data_category($user_id);

        return view('app.activity.edit_activity', compact('logged', 'category'));
    }

    public function get_activity_detail(Request $request)
    {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;

        $__request = $request->all();

        $activity_id = $__request["activity_id"];

        $query = "
            SELECT
                ua.name,
                ua.money_amount,
                ua.`describe`,
                c.category_id,
                c.name AS ten_danh_muc,
                c.`type`,
                ua.date
            FROM money_manage.user_activity ua
            JOIN money_manage.category c ON ua.category_id = c.category_id
            WHERE ua.activity_id = $activity_id;
        ";

        $result = DB::select($query);

        return $result;
    }

    public function restore_activity(Request $request)
    {
        $__request = $request->all();

        $activity = UserActivity::query()->where('activity_id', $__request['activity_id'])->first();

        if(isset($__request["category_id"]) && !empty($__request["category_id"])) {
            $activity->category_id = $__request["category_id"];
        }

        if(isset($__request["name"]) && !empty($__request["name"])) {
            $activity->name = $__request["name"];
        }

        if(isset($__request["money_amount"]) && !empty($__request["money_amount"])) {
            $activity->money_amount = $__request["money_amount"];
        }

        if(isset($__request["describe"]) && !empty($__request["describe"])) {
            $activity->describe = $__request["describe"];
        }

        if(isset($__request["date"]) && !empty($__request["date"])) {
            $activity->date = $__request["date"];
        }

        $activity->save();

        return redirect()->route('app.edit-activity');
    }
}
