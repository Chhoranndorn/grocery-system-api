@extends('layouts.admin')

@section('content')

<h2>Add Category</h2>

@include('partials.errors')

<form action="/categories" method="POST">
    @csrf

    <div class="mb-3">
        <label>Category Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter category name">
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>

@endsection