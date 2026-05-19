<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Grocery Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="d-flex">

        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">

            <h3 class="mb-4">
                Grocery Admin
            </h3>

            <ul class="nav flex-column">

                <li class="nav-item mb-2">
                    <a href="/dashboard"
                        class="nav-link text-white {{ request()->is('dashboard') ? 'bg-secondary rounded' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/products"
                        class="nav-link text-white {{ request()->is('products*') ? 'bg-secondary rounded' : '' }}">
                        <i class="bi bi-box-seam me-2"></i>
                        Products
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/categories"
                        class="nav-link text-white {{ request()->is('categories*') ? 'bg-secondary rounded' : '' }}">
                        <i class="bi bi-tags me-2"></i>
                        Categories
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/brands"
                        class="nav-link text-white {{ request()->is('brands*') ? 'bg-secondary rounded' : '' }}">
                        <i class="bi bi-award me-2"></i>
                        Brands
                    </a>
                </li>

            </ul>

        </div>

        <!-- Main -->
        <div class="flex-grow-1">

            <!-- Navbar -->
            <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3">

                <div class="d-flex justify-content-between align-items-center w-100">

                    <!-- Page Title -->
                    <h4 class="mb-0">
                        @yield('title')
                    </h4>

                    <!-- Right Side -->
                    <div class="d-flex align-items-center gap-3">

                        <span class="text-muted">
                            Welcome, {{ auth()->user()->name }}
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-box-arrow-right me-1"></i>
                                Logout
                            </button>
                        </form>

                    </div>

                </div>

            </nav>

            <!-- Content -->
            <div class="p-4">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @yield('content')

            </div>

        </div>

    </div>

</body>

</html>