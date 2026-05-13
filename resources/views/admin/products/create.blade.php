@extends('layouts.admin')

@section('content')

<h2>Add Product</h2>

@include('partials.errors')

<form action="/products" method="POST" enctype="multipart/form-data">
    @csrf

    @include('admin.products._form')

    <button type="submit" class="btn btn-success">Save</button>
</form>

@endsection