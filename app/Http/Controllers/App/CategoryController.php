<?php


namespace App\Http\Controllers\App;

use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function category() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $id = $logged->user_id;
        $datas_in = $this->get_data_category_in($id);
        $datas_out = $this->get_data_category_out($id);

        return view('app.category.category', compact('logged', 'datas_in', 'datas_out'));
    }

    public function category_in() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $id = $logged->user_id;
        $datas = $this->get_data_category_in($id);

        return view('app.category.category_in', compact('logged', 'datas'));
    }

    public function get_data_category_in($id) {
        $query = DB::table('category')
                    ->join('user_category', 'category.category_id', '=', 'user_category.category_id')
                    ->where('user_category.user_id', $id)
                    ->where('category.type', 0)
                    ->select('category.name', 'user_category.describe', 'user_category.user_category_id');

        $result = $query->get();

        return $result;
    }

    public function add_category_in() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.category.add_category_in', compact('logged'));
    }

    public function store_category_in(Request $request) {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;
        $__request = $request->all();

        if(!isset($__request["category_name"]) || empty($__request["category_name"])) {
            return redirect()->route('app.add-category-in')->withErrors('Tên danh mục không được để trống!');
        }

        $exist = DB::table('user_category')
                    ->join('category', 'user_category.category_id', '=', 'category.category_id')
                    ->where('user_category.user_id', $user_id)
                    ->where('category.name', $__request["category_name"])
                    ->where('category.type', 0)
                    ->first();

        if(!isset($exist) || empty($exist)) {
            $category = new Category();
            $category->name = $__request["category_name"];
            $category->type = 0;
            $insert_category = $category->save();

            if (!$insert_category) {
                return redirect()->route('app.add-category-in')->withErrors('Có lỗi xảy ra!');
            }

            $cate = \App\Models\Category::query()->where('name', $category->name)->where('type', 0)->first();

            $user_category = new UserCategory();
            $user_category->user_id = $user_id;
            $user_category->category_id = $cate->category_id;
            $user_category->describe = $__request["describe"];

            $insert_user_category = $user_category->save();

            if (!$insert_user_category) {
                return redirect()->route('app.add-category-in')->withErrors('Có lỗi xảy ra!');
            }

            return redirect()->route('app.add-category-in')->with('success', 'Thêm danh mục thành công');
        }

        return redirect()->route('app.add-category-in')->withErrors('Danh mục đã tồn tại!');
    }

    public function edit_category_in() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $id = $logged->user_id;
        $datas = $this->get_data_category_in($id);

        return view('app.category.edit_category_in', compact('logged', 'datas'));
    }

    public function restore_category_in(Request $request) {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;

        $__request = $request->all();

        $user_category = UserCategory::query()->where('user_category_id', $__request["user_category_id"])->first();
        $category_id = $user_category->category_id;

        $category = Category::query()->where('category_id', $category_id)->first();
        if ($__request["category_name"] == null) {
            $user_category->describe = $__request["describe"];
            $insert_uc = $user_category->save();
            if (!$insert_uc) {
                return redirect()->route('app.edit-category-in')->withErrors('Có lỗi xảy ra!');
            }
            return redirect()->route('app.edit-category-in')->with('success', 'Cập nhật mô tả thành công!');
        }
        else {
            $category->name = $__request["category_name"];
            $insert_category = $category->save();
            if (!$insert_category) {
                return redirect()->route('app.edit-category-in')->withErrors('Có lỗi xảy ra!');
            }
            $user_category->describe = $__request["describe"];
            $insert_uc = $user_category->save();
            if (!$insert_uc) {
                return redirect()->route('app.edit-category-in')->withErrors('Có lỗi xảy ra!');
            }
            return redirect()->route('app.edit-category-in')->with('success', 'Cập nhật thành công!');
        }
    }

    public function category_out() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $id = $logged->user_id;
        $datas = $this->get_data_category_out($id);

        return view('app.category.category_out', compact('logged', 'datas'));
    }

    public function get_data_category_out($id) {
        $query = DB::table('category')
            ->join('user_category', 'category.category_id', '=', 'user_category.category_id')
            ->where('user_category.user_id', $id)
            ->where('category.type', 1)
            ->select('category.name', 'user_category.describe', 'user_category.user_category_id');

        $result = $query->get();

        return $result;
    }

    public function add_category_out() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.category.add_category_out', compact('logged'));
    }

    public function store_category_out(Request $request) {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;
        $__request = $request->all();

        if(!isset($__request["category_name"]) || empty($__request["category_name"])) {
            return redirect()->route('app.add-category-out')->withErrors('Tên danh mục không được để trống!');
        }

        $exist = DB::table('user_category')
            ->join('category', 'user_category.category_id', '=', 'category.category_id')
            ->where('user_category.user_id', $user_id)
            ->where('category.name', $__request["category_name"])
            ->where('category.type', 1)
            ->first();

        if(!isset($exist) || empty($exist)) {
            $category = new Category();
            $category->name = $__request["category_name"];
            $category->type = 1;
            $insert_category = $category->save();

            if (!$insert_category) {
                return redirect()->route('app.add-category-out')->withErrors('Có lỗi xảy ra!');
            }

            $cate = \App\Models\Category::query()->where('name', $category->name)->where('type', 1)->first();

            $user_category = new UserCategory();
            $user_category->user_id = $user_id;
            $user_category->category_id = $cate->category_id;
            $user_category->describe = $__request["describe"];

            $insert_user_category = $user_category->save();

            if (!$insert_user_category) {
                return redirect()->route('app.add-category-out')->withErrors('Có lỗi xảy ra!');
            }

            return redirect()->route('app.add-category-out')->with('success', 'Thêm danh mục thành công');
        }

        return redirect()->route('app.add-category-out')->withErrors('Danh mục đã tồn tại!');
    }

    public function edit_category_out() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $id = $logged->user_id;
        $datas = $this->get_data_category_out($id);

        return view('app.category.edit_category_out', compact('logged', 'datas'));
    }

    public function restore_category_out(Request $request) {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        $user_id = $logged->user_id;

        $__request = $request->all();

        $user_category = UserCategory::query()->where('user_category_id', $__request["user_category_id"])->first();
        $category_id = $user_category->category_id;

        $category = Category::query()->where('category_id', $category_id)->first();
        if ($__request["category_name"] == null) {
            $user_category->describe = $__request["describe"];
            $insert_uc = $user_category->save();
            if (!$insert_uc) {
                return redirect()->route('app.edit-category-out')->withErrors('Có lỗi xảy ra!');
            }
            return redirect()->route('app.edit-category-out')->with('success', 'Cập nhật mô tả thành công!');
        }
        else {
            $category->name = $__request["category_name"];
            $insert_category = $category->save();
            if (!$insert_category) {
                return redirect()->route('app.edit-category-out')->withErrors('Có lỗi xảy ra!');
            }
            $user_category->describe = $__request["describe"];
            $insert_uc = $user_category->save();
            if (!$insert_uc) {
                return redirect()->route('app.edit-category-out')->withErrors('Có lỗi xảy ra!');
            }
            return redirect()->route('app.edit-category-out')->with('success', 'Cập nhật thành công!');
        }
    }
}
