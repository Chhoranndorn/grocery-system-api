@extends('layouts.admin')

@section('content')

<h2>Edit Brand</h2>

@include('partials.errors')

<form action="/brands/{{ $brand->id }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Brand Name</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $brand->name) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection