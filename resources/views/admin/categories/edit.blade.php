@extends('layouts.admin')

@section('content')

<h2>Edit Category</h2>

@include('partials.errors')

<form action="/categories/{{ $category->id }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Category Name</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $category->name) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection