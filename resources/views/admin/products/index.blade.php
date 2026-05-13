@extends('layouts.admin')

@section('content')

<h2>Products</h2>

<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
    Add Product
</a>

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
</td>>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->category->name ?? '-' }}</td>
            <td>{{ $product->brand->name ?? '-' }}</td>
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