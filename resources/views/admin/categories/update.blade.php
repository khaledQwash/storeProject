@extends('layouts.admin')
@section('content')
<div class="py-4">

    <form action="{{ url('admin/category/update')}}" method="post">
        @csrf
        <input type="" hidden name="id" id="id" value="{{$category->id}}">
        <div class="mb-3">
            <label for="nameFormControlInput" class="form-label">اسم الصنف </label>
            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
        </div>
        <div class="mb-3">
            <input type="submit" value="حفظ التعديلات" class="btn btn-info">
        </div>
    </form>
</div>
@endsection

