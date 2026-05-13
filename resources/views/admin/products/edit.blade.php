@extends('layouts.admin')

@section('content')

<h2>Edit Product</h2>

@include('partials.errors')

<form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @include('admin.products._form')

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection