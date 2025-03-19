<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = DB::table('Products')->get();
        $categories = DB::table('categories')->get();
        return view('home.index', compact('products', 'categories'));
    }

    public function showFromCategory()
    {
        $category = $_POST['category'];
        if ($category == '*') {
            $products = DB::table('Products')->get();
        } else {
            $products = DB::table('Products')->where('category', $category)->get();
        }
        $categories = DB::table('categories')->get();
        return view('home.index', compact('products', 'categories'));
    }
}
