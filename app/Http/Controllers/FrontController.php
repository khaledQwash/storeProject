<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
class FrontController extends Controller
{
    // public function index()
    // {
    //     $products = DB::table('Products')->paginate(3);
    //     $categories = DB::table('categories')->get();
    //     return view('home.index', compact('products', 'categories'));
    // }

    // public function showFromCategory()
    // {
    //     $category_id = $_POST['category'];
    //     if ($category_id == '*') {
    //         $products = Product::paginate(3);
    //     } else {
    //         $products = Product::where('category_id', $category_id)->paginate(3);
    //     }
    //     $categories = Category::all();
    //     return view('home.index', compact('products', 'categories'));
    // }
    public function index(Request $request)
    {
        $category_id = $request->input('category');
        $categories = Category::all();

        if ($category_id && $category_id != '*') {
            $products = Product::where('category_id', $category_id)
                ->paginate(3)
                ->appends(['category' => $category_id]);
        } else {
            $products = Product::paginate(3);
        }

        return view('home.index', compact('products', 'categories'));
    }

    public function showFromCategory(Request $request)
    {
        return $this->index($request); // استدعاء دالة index() بدلاً من تكرار الكود
    }

}
