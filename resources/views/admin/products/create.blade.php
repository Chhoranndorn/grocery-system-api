@extends('layouts.admin')

@section('content')

<h2>Add Product</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/products" method="POST">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="text" name="price" class="form-control">
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Brand</label>
        <select name="brand_id" class="form-control">
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>

@endsection