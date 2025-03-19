@extends('layouts.admin')
@section('content')
<div class="py-4">
    <a href="product/create" style="display: inline-block; color:#fff; background-color:#444; padding:10px 20px; border-radius: 10px; text-decoration: none; font-weight: bold;">أضف منتج جديد</a>
    <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الصنف</th>
            <th scope="col">الاسم</th>
            <th scope="col">السعر</th>
            <th scope="col">الكمية</th>
            <th scope="col">الاجراءات</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->category}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                    <form action="{{ url('admin/product/delete/' . $product->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                    <form action="{{ url('admin/product/update/' . $product->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        <button type="submit" class="btn btn-info">تعديل</button>
                    </form>
                </td>
              </tr>
            @endforeach

        </tbody>
      </table>
</div>
@endsection

