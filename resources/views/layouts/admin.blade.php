<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
        <h4>Admin</h4>
        <hr>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link text-white">Dashboard</a>
            </li>

            <li class="nav-item">
                <a href="/products" class="nav-link text-white">Products</a>
            </li>

            <li class="nav-item">
                <a href="/categories" class="nav-link text-white">Categories</a>
            </li>

            <li class="nav-item">
                <a href="/brands" class="nav-link text-white">Brands</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1">

        <!-- Topbar -->
        <nav class="navbar navbar-light bg-light px-3">
            <span class="navbar-brand">Admin Panel</span>

            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </nav>

        <!-- Page Content -->
        <div class="p-4">
            @if(session('success'))
    <div class="alert alert-success m-3">
        {{ session('success') }}
    </div>
@endif
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>