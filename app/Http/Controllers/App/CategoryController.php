<?php


namespace App\Http\Controllers\App;

use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function category() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.category.category', compact('logged'));
    }

    public function category_in() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.category.category_in', compact('logged'));
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

        $category = new Category();

        if(!isset($__request["category_name"]) || empty($__request["category_name"])) {
            return redirect()->route('app.add-category-in')->withErrors('Tên danh mục không được để trống!');
        }

        $exist = \App\Models\Category::query()->where('name', $__request["category_name"])->first();

        if(!isset($exist) || empty($exist)) {
            $category->name = $__request["category_name"];
            $category->type = 0;
            $insert_category = $category->save();

            if (!$insert_category) {
                return redirect()->route('app.add-category-in')->withErrors('Có lỗi xảy ra!');
            }
        }

        $cate = \App\Models\Category::query()->where('name', $category->name)->first();

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

    public function edit_category_in() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.category.edit_category_in', compact('logged'));
    }

    public function category_out() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.category.category_out', compact('logged'));
    }

    public function add_category_out() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.category.add_category_out', compact('logged'));
    }

    public function edit_category_out() {
        $logged = auth()->user();

        if (!isset($logged) || empty($logged)) {
            return redirect()->route('login');
        }

        return view('app.category.edit_category_out', compact('logged'));
    }
}
