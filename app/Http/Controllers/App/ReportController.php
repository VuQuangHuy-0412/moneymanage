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
                c.`type`,
                date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%d-%m-%Y') as `date`
            FROM money_manage.user_activity ua
            JOIN money_manage.category c ON ua.category_id = c.category_id
            WHERE ua.user_id = $user_id
            AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%Y-%m') = date_format(CURDATE(), '%Y-%m')
            ORDER BY ua.activity_id DESC;";

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

        $datas = $this->get_amount_seven_date();
        $activities = $this->get_list_activity_seven_date();
        $detail = $this->get_money_seven_date();

        return view('app.report.seven_date', compact('logged', 'datas', 'activities', 'detail'));
    }

    public function get_money_seven_date() {
        $logged = auth()->user();
        $user_id = $logged->user_id;
        $query = "
            SELECT b.date, if(a.thu IS NULL, 0, a.thu) thu, if(a.chi IS NULL, 0, a.chi) chi
            FROM
            (
                SELECT
                    DATE_FORMAT(str_to_date(a.date, '%m/%d/%Y'), '%d-%m-%Y') AS date,
                    SUM(if(a.type = 0, a.money_amount, 0)) thu,
                    SUM(if(a.type = 1, a.money_amount, 0)) chi
                FROM
                (
                    SELECT ua.*, c.type, c.name AS category_name
                    FROM money_manage.user_activity ua
                    JOIN money_manage.category c ON ua.category_id = c.category_id
                    WHERE ua.user_id = $user_id
                    AND ua.created_at BETWEEN ADDDATE(NOW(),INTERVAL -6 DAY) AND NOW()
                ) a
                GROUP BY a.date
                ORDER BY a.activity_id
                LIMIT 7
            ) a
            RIGHT JOIN
            (
                SELECT
                    (case
                    when sd.STT=1 then a.DAY1
                    when sd.STT=2 then a.DAY2
                    when sd.STT=3 then a.DAY3
                    when sd.STT=4 then a.DAY4
                    when sd.STT=5 then a.DAY5
                    when sd.STT=6 then a.DAY6
                    when sd.STT=7 then a.DAY7
                    END) AS date
                FROM
                (
                    SELECT
                        DATE_FORMAT(NOW(), '%d-%m-%Y') AS DAY7,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -6 DAY), '%d-%m-%Y') AS DAY1,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -5 DAY), '%d-%m-%Y') AS DAY2,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -4 DAY), '%d-%m-%Y') AS DAY3,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -3 DAY), '%d-%m-%Y') AS DAY4,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -2 DAY), '%d-%m-%Y') AS DAY5,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -1 DAY), '%d-%m-%Y') AS DAY6
                ) a, money_manage.seven_date sd
            ) b ON a.date = b. date;";

        $datas = DB::select($query);

        return $datas;
    }

    public function get_amount_seven_date() {
        $logged = auth()->user();
        $user_id = $logged->user_id;
        $query = "
            SELECT
                if(c.thu IS NULL, 0, c.thu) tien_thu,
                if(c.chi IS NULL, 0, c.chi) tien_chi
            FROM
            (
                SELECT SUM(b.thu) AS thu, SUM(b.chi) AS chi
                FROM
                (
                    SELECT
                        a.date, SUM(if(a.type = 0, a.money_amount, 0)) thu,
                        SUM(if(a.type = 1, a.money_amount, 0)) chi,
                        a.activity_id
                    FROM
                    (
                        SELECT ua.*, c.type, c.name AS category_name
                        FROM money_manage.user_activity ua
                        JOIN money_manage.category c ON ua.category_id = c.category_id
                        WHERE ua.user_id = 1
                        AND ua.created_at BETWEEN ADDDATE(NOW(),INTERVAL -7 DAY) AND NOW()
                    ) a
                    GROUP BY a.date
                    ORDER BY a.activity_id DESC
                    LIMIT 7
                ) b
            ) c;";

        $datas = DB::select($query);

        return $datas;
    }

    public function get_list_activity_seven_date() {
        $logged = auth()->user();
        $user_id = $logged->user_id;
        $query = "
            SELECT
                ua.name,
                ua.money_amount,
                ua.`describe`,
                c.name AS ten_danh_muc,
                c.`type`,
                date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%d-%m-%Y') as `date`
			FROM money_manage.user_activity ua
			JOIN money_manage.category c ON ua.category_id = c.category_id
			WHERE ua.user_id = $user_id
			AND ua.created_at BETWEEN ADDDATE(NOW(),INTERVAL -6 DAY) AND NOW()
			ORDER BY ua.activity_id DESC;";

        $datas = DB::select($query);
        return $datas;
    }

    public function month_detail(Request $request) {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }
        $query = "
            SELECT date_format(CURDATE(), '%m-%Y') as this_month;
        ";

        $month = DB::select($query);
        $this_month = $month[0]->this_month;

        $__request = $request->all();
        $month = $this_month;
        if(isset($__request["month"]) && !empty($__request["month"])) {
            $month = $__request["month"];
        }
        $datas = $this->get_amount_by_month($month);
        $activities = $this->get_list_activity_by_month($month);

        return view('app.report.month_detail', compact('logged', 'this_month', 'month', 'datas', 'activities'));
    }

    public function get_amount_by_month($month) {
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
                AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%m-%Y') = '$month'
                GROUP BY c.`type`
            ) a;";

        $datas = DB::select($query);

        return $datas;
    }

    public function get_list_activity_by_month($month) {
        $logged = auth()->user();
        $user_id = $logged->user_id;
        $query = "
            SELECT
                ua.name,
                ua.money_amount,
                ua.`describe`,
                c.name AS ten_danh_muc,
                c.`type`,
                date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%d-%m-%Y') as `date`
            FROM money_manage.user_activity ua
            JOIN money_manage.category c ON ua.category_id = c.category_id
            WHERE ua.user_id = $user_id
            AND date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%m-%Y') = '$month'
            ORDER BY ua.activity_id DESC;";

        $datas = DB::select($query);
        return $datas;
    }

    public function six_month() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $datas = $this->get_amount_six_month();
        $activities = $this->get_list_activity_six_month();
        $detail = $this->get_money_six_month();

        return view('app.report.six_month', compact('logged', 'detail', 'datas', 'activities'));
    }

    public function get_money_six_month() {
        $logged = auth()->user();
        $user_id = $logged->user_id;
        $query = "
            SELECT b.month, if(a.thu IS NULL, 0, a.thu) thu, if(a.chi IS NULL, 0, a.chi) chi
            FROM
            (
                SELECT
                    DATE_FORMAT(str_to_date(a.date, '%m/%d/%Y'), '%m-%Y') AS month,
                    SUM(if(a.type = 0, a.money_amount, 0)) thu,
                    SUM(if(a.type = 1, a.money_amount, 0)) chi
                FROM
                (
                    SELECT ua.*, c.type, c.name AS category_name
                    FROM money_manage.user_activity ua
                    JOIN money_manage.category c ON ua.category_id = c.category_id
                    WHERE ua.user_id = $user_id
                    AND ua.created_at BETWEEN ADDDATE(NOW(),INTERVAL -6 MONTH) AND NOW()
                ) a
                GROUP BY DATE_FORMAT(str_to_date(a.date, '%m/%d/%Y'), '%m-%Y')
                ORDER BY a.activity_id
                LIMIT 6
            ) a
            RIGHT JOIN
            (
                SELECT
                    (case
                    when sd.STT=1 then a.MONTH1
                    when sd.STT=2 then a.MONTH2
                    when sd.STT=3 then a.MONTH3
                    when sd.STT=4 then a.MONTH4
                    when sd.STT=5 then a.MONTH5
                    when sd.STT=6 then a.MONTH6
                    END) AS month
                FROM
                (
                    SELECT
                        DATE_FORMAT(NOW(), '%m-%Y') AS MONTH6,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -5 MONTH), '%m-%Y') AS MONTH1,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -4 MONTH), '%m-%Y') AS MONTH2,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -3 MONTH), '%m-%Y') AS MONTH3,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -2 MONTH), '%m-%Y') AS MONTH4,
                        DATE_FORMAT(ADDDATE(NOW(),INTERVAL -1 MONTH), '%m-%Y') AS MONTH5
                ) a, money_manage.seven_date sd
                LIMIT 6
            ) b ON a.month = b.month;";

        $datas = DB::select($query);

        return $datas;
    }

    public function get_amount_six_month() {
        $logged = auth()->user();
        $user_id = $logged->user_id;
        $query = "
            select sum(z.thu) as tien_thu, sum(z.chi) as tien_chi
            from
            (
                SELECT b.month, if(a.thu IS NULL, 0, a.thu) thu, if(a.chi IS NULL, 0, a.chi) chi
                FROM
                (
                    SELECT
                        DATE_FORMAT(str_to_date(a.date, '%m/%d/%Y'), '%m-%Y') AS month,
                        SUM(if(a.type = 0, a.money_amount, 0)) thu,
                        SUM(if(a.type = 1, a.money_amount, 0)) chi
                    FROM
                    (
                        SELECT ua.*, c.type, c.name AS category_name
                        FROM money_manage.user_activity ua
                        JOIN money_manage.category c ON ua.category_id = c.category_id
                        WHERE ua.user_id = $user_id
                        AND ua.created_at BETWEEN ADDDATE(NOW(),INTERVAL -6 MONTH) AND NOW()
                    ) a
                    GROUP BY DATE_FORMAT(str_to_date(a.date, '%m/%d/%Y'), '%m-%Y')
                    ORDER BY a.activity_id
                    LIMIT 6
                ) a
                RIGHT JOIN
                (
                    SELECT
                        (case
                        when sd.STT=1 then a.MONTH1
                        when sd.STT=2 then a.MONTH2
                        when sd.STT=3 then a.MONTH3
                        when sd.STT=4 then a.MONTH4
                        when sd.STT=5 then a.MONTH5
                        when sd.STT=6 then a.MONTH6
                        END) AS month
                    FROM
                    (
                        SELECT
                            DATE_FORMAT(NOW(), '%m-%Y') AS MONTH6,
                            DATE_FORMAT(ADDDATE(NOW(),INTERVAL -5 MONTH), '%m-%Y') AS MONTH1,
                            DATE_FORMAT(ADDDATE(NOW(),INTERVAL -4 MONTH), '%m-%Y') AS MONTH2,
                            DATE_FORMAT(ADDDATE(NOW(),INTERVAL -3 MONTH), '%m-%Y') AS MONTH3,
                            DATE_FORMAT(ADDDATE(NOW(),INTERVAL -2 MONTH), '%m-%Y') AS MONTH4,
                            DATE_FORMAT(ADDDATE(NOW(),INTERVAL -1 MONTH), '%m-%Y') AS MONTH5
                    ) a, money_manage.seven_date sd
                    LIMIT 6
                ) b ON a.month = b.month
            ) z;
        ";

        $datas = DB::select($query);

        return $datas;
    }

    public function get_list_activity_six_month() {
        $logged = auth()->user();
        $user_id = $logged->user_id;
        $query = "
            SELECT
                ua.name,
                ua.money_amount,
                ua.`describe`,
                c.name AS ten_danh_muc,
                c.`type`,
                date_format(STR_TO_DATE(ua.date, '%m/%d/%Y'), '%d-%m-%Y') as `date`
			FROM money_manage.user_activity ua
			JOIN money_manage.category c ON ua.category_id = c.category_id
			WHERE ua.user_id = $user_id
			AND ua.created_at BETWEEN DATE_FORMAT(ADDDATE(NOW(),INTERVAL -5 MONTH), '01-%m-%Y') AND NOW()
			ORDER BY ua.activity_id DESC;";

        $datas = DB::select($query);
        return $datas;
    }
}
