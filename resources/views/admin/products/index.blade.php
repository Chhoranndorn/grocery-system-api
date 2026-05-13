
@extends('layouts.admin')

@section('content')

<h2>Products</h2>

<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
    Add Product
</a>
<form method="GET" action="/products" class="row mb-3">

    <div class="col-md-3">
        <input type="text"
               name="search"
               class="form-control"
               placeholder="Search product..."
               value="{{ request('search') }}">
    </div>

    <div class="col-md-3">
        <select name="category_id" class="form-control">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <select name="brand_id" class="form-control">
            <option value="">All Brands</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}"
                    {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                    {{ $brand->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 d-flex gap-2">
        <button class="btn btn-primary">Filter</button>

        <a href="/products" class="btn btn-secondary">Reset</a>
    </div>

</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Actions</th>
            <th>Image</th>
        </tr>
    </thead>

<tbody>
@foreach($products as $product)
<tr>

    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
    <td>${{ $product->price }}</td>
    <td>{{ $product->category->name ?? '-' }}</td>
    <td>{{ $product->brand->name ?? '-' }}</td>

    <td>
        <a href="/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

        <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Delete this product?')">
                Delete
            </button>
        </form>
    </td>

    <td>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="60">
        @endif
    </td>

</tr>
@endforeach
</tbody>
</table>

{{ $products->links() }}

@endsection