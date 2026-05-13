@extends('layouts.admin')

@section('content')

<h2>Categories</h2>

<a href="/categories/create" class="btn btn-primary mb-3">Add Category</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

    @foreach($categories as $cat)
    <tr>
        <td>{{ $cat->id }}</td>
        <td>{{ $cat->name }}</td>
        <td>
            <a href="/categories/{{ $cat->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

            <form action="/categories/{{ $cat->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Delete this category?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

{{ $categories->links() }}

@endsection