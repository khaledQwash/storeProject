<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Product;
use App\Models\Admin\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categories = DB::table('categories')->paginate(4);
        return view('admin.categories.index', compact('categories'));
    }
    public function create(){
        $category_name = $_POST['name'];
        DB::table('categories')->insert(['name'=>$category_name]);
        return redirect()->back();
    }
    public function destroy($id){
        // $categories = DB::table('categories')->where('id', $id)->delete();
        Product::where('category_id', $id)->delete();
        Category::destroy($id);
        return redirect()->back();
    }
    public function edit($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('admin.categories.update', compact('category'));
    }
    public function update(){
        $id = $_POST['id'];
        $category_name = $_POST['name'];
        $category = DB::table('categories')->where('id',$id)->update(['name'=>$category_name]);
        $categories = DB::table('categories')->get();
        // return view('admin.products.index', compact('products'));
        return redirect('admin/category'); // توجيه المستخدم إلى رابط صفحة الجدول
    }
}
