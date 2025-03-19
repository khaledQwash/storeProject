@extends('layouts.admin')
@section('content')
<div class="py-4">

    <form action="{{ url('admin/product/update')}}" method="post">
        @csrf
        <input type="" hidden name="id" id="id" value="{{$product->id}}">
        <div class="mb-3">
            <label for="nameFormControlInput" class="form-label">اسم المنتج </label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
        </div>
        <div class="mb-3">
            <label for="quantityFormControlInput" class="form-label">الكمية </label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}">
        </div>
        <div class="mb-3">
            <label for="priceFormControlInput" class="form-label">السعر </label>
            <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">اختر الصنف </label>
            <select name="category" id="category" class="form-control">
                <option value="#"></option>
                @foreach ($categories as $category)
                <option value="{{$category->name}}" {{ $product->category == $category->name ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="discriptionFormControlTextarea1" class="form-label">وصف المنتج </label>
            <textarea class="form-control" id="discription" name="discription" rows="3">{{$product->description}}</textarea>
        </div>
        <div class="mb-3">
            <input type="submit" value="حفظ التعديلات" class="btn btn-info">
        </div>
    </form>
</div>
@endsection

