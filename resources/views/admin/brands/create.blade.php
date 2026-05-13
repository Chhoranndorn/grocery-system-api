@extends('layouts.admin')

@section('content')

<h2>Add Brand</h2>

@include('partials.errors')

<form action="/brands" method="POST">
    @csrf

    <div class="mb-3">
        <label>Brand Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter brand name">
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>

@endsection