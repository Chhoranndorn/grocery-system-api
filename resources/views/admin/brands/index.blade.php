@extends('layouts.admin')

@section('content')

<h2>Brands</h2>

<a href="/brands/create" class="btn btn-primary mb-3">Add Brand</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

    @foreach($brands as $brand)
    <tr>
        <td>{{ $brand->id }}</td>
        <td>{{ $brand->name }}</td>
        <td>
            <a href="/brands/{{ $brand->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

            <form action="/brands/{{ $brand->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Delete this brand?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $brands->links() }}

@endsection