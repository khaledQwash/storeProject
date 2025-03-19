<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $products = DB::table('Products')->get();
        return view('admin.products.index', compact('products'));
    }
    public function create(){
        $product_category = $_POST['category'];
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $product_quantity = $_POST['quantity'];
        $product_discription = $_POST['discription'];
        DB::table('Products')->insert(['category'=>$product_category, 'name'=>$product_name, 'price'=>$product_price, 'quantity'=>$product_quantity, 'description'=>$product_discription]);
        // $categories = DB::table('categories')->get();
        return redirect()->back();
    }
    public function destroy($id){
        $products = DB::table('Products')->where('id', $id)->delete();
        return redirect()->back();
    }
    public function edit($id){
        $product = DB::table('Products')->where('id',$id)->first();
        $categories = DB::table('categories')->get();
        return view('admin.products.update', compact('product', 'categories'));
    }
    public function update(){
        $id = $_POST['id'];
        $product_category = $_POST['category'];
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $product_quantity = $_POST['quantity'];
        $product_discription = $_POST['discription'];
        $product = DB::table('Products')->where('id',$id)->update(['category'=>$product_category, 'name'=>$product_name, 'price'=>$product_price, 'quantity'=>$product_quantity, 'description'=>$product_discription]);
        $products = DB::table('Products')->get();
        // return view('admin.products.index', compact('products'));
        return redirect('admin/product'); // توجيه المستخدم إلى رابط صفحة الجدول
    }
}
