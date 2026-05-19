@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="row">

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h6 class="text-muted">
                    Total Products
                </h6>

                <h2 class="text-primary">
                    {{ $productCount }}
                </h2>

            </div>

        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h6 class="text-muted">
                    Categories
                </h6>

                <h2 class="text-success">
                    {{ $categoryCount }}
                </h2>

            </div>

        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h6 class="text-muted">
                    Brands
                </h6>

                <h2 class="text-warning">
                    {{ $brandCount }}
                </h2>

            </div>

        </div>
    </div>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <h5 class="mb-3">
            Recent Activity
        </h5>

        <p class="text-muted mb-0">
            Your grocery admin dashboard is running successfully.
        </p>

    </div>

</div>

@endsection