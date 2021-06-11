<?php


namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class ReportController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function report() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.report.report', compact('logged'));
    }

    public function report_today() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $datas = $this->get_amount_today();
        $activities = $this->get_list_activity_today();

        return view('app.report.report_today', compact('logged', 'datas', 'activities'));
    }

    public function get_amount_today() {
        $logged = auth()->user();
        $user_id = $logged->user_id;
        $query = "
            SELECT
                if(a.type = 0, a.so_tien, 0) tien_thu,
                if(a.type = 1, a.so_tien, 0) tien_chi
            FROM
            (
                SELECT
                    c.type,
                    SUM(ua.money_amount) so_tien
                FROM money_manage.user_activity ua
                JOIN money_manage.category c ON ua.category_id = c.category_id
                WHERE ua.user_id = $user_id
                AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%d-%m-%Y') = date_format(CURDATE(), '%d-%m-%Y')
                GROUP BY c.`type`
            ) a;";

        $datas = DB::select($query);

        return $datas;
    }

    public function get_list_activity_today() {
        $logged = auth()->user();
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

        $datas = DB::select($query);
        return $datas;
    }

    public function report_this_month() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $datas = $this->get_amount_this_month();
        $activities = $this->get_list_activity_this_month();

        return view('app.report.report_this_month', compact('logged', 'datas', 'activities'));
    }

    public function get_amount_this_month() {
        $logged = auth()->user();
        $user_id = $logged->user_id;
        $query = "
            SELECT
                if(a.type = 0, a.so_tien, 0) tien_thu,
                if(a.type = 1, a.so_tien, 0) tien_chi
            FROM
            (
                SELECT
                    c.type,
                    SUM(ua.money_amount) so_tien
                FROM money_manage.user_activity ua
                JOIN money_manage.category c ON ua.category_id = c.category_id
                WHERE ua.user_id = $user_id
                AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%Y-%m') = date_format(CURDATE(), '%Y-%m')
                GROUP BY c.`type`
            ) a;";

        $datas = DB::select($query);

        return $datas;
    }

    public function get_list_activity_this_month() {
        $logged = auth()->user();
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
            AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%Y-%m') = date_format(CURDATE(), '%Y-%m');";

        $datas = DB::select($query);
        return $datas;
    }

    public function date_detail(Request $request) {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }
        $query = "
            SELECT date_format(CURDATE(), '%d-%m-%Y') as today;
        ";

        $date = DB::select($query);
        $today = $date[0]->today;

        $__request = $request->all();
        $date = $today;
        if(isset($__request["date"]) && !empty($__request["date"])) {
            $date = $__request["date"];
        }
        $datas = $this->get_amount_by_date($date);
        $activities = $this->get_list_activity_by_date($date);
        return view('app.report.date_detail', compact('logged', 'today', 'date', 'datas', 'activities'));
    }

    public function get_amount_by_date($date) {
        $logged = auth()->user();
        $user_id = $logged->user_id;
        $query = "
            SELECT
                if(a.type = 0, a.so_tien, 0) tien_thu,
                if(a.type = 1, a.so_tien, 0) tien_chi
            FROM
            (
                SELECT
                    c.type,
                    SUM(ua.money_amount) so_tien
                FROM money_manage.user_activity ua
                JOIN money_manage.category c ON ua.category_id = c.category_id
                WHERE ua.user_id = $user_id
                AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%d-%m-%Y') = '$date'
                GROUP BY c.`type`
            ) a;";

        $datas = DB::select($query);

        return $datas;
    }

    public function get_list_activity_by_date($date) {
        $logged = auth()->user();
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
            AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%d-%m-%Y') = '$date';";

        $datas = DB::select($query);
        return $datas;
    }

    public function seven_date() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.report.seven_date', compact('logged'));
    }

    public function month_detail() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.report.month_detail', compact('logged'));
    }

    public function six_month() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.report.six_month', compact('logged'));
    }
}
