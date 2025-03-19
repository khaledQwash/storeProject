@extends('layouts.admin')
@section('content')
<div class="py-4">
    <a href="category/create" style="display: inline-block; color:#fff; background-color:#444; padding:10px 20px; border-radius: 10px; text-decoration: none; font-weight: bold;">أضف صنف جديد</a>
    <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">اسم الصنف</th>
            <th scope="col">الاجراءات</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">1</th>
                <td>{{$category->name}}</td>
                <td>
                    <form action="{{ url('admin/category/delete/' . $category->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                    <form action="{{ url('admin/category/update/' . $category->id) }}" method="POST" style="display: inline-block">
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

