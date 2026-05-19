<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-green-600 text-white p-6">

            <div class="mb-10">
                <h1 class="text-2xl font-bold">
                    Grocery Admin
                </h1>
            </div>

            <nav class="space-y-3">

                <a href="/dashboard"
                    class="block px-4 py-3 rounded-xl bg-green-700 hover:bg-green-800 transition">
                    Dashboard
                </a>

                <a href="/products"
                    class="block px-4 py-3 rounded-xl hover:bg-green-700 transition">
                    Products
                </a>

                <a href="/categories"
                    class="block px-4 py-3 rounded-xl hover:bg-green-700 transition">
                    Categories
                </a>

                <a href="/brands"
                    class="block px-4 py-3 rounded-xl hover:bg-green-700 transition">
                    Brands
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="w-full text-left px-4 py-3 rounded-xl hover:bg-red-500 transition mt-10">
                        Logout
                    </button>
                </form>

            </nav>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">

            <!-- Header -->
            <div class="mb-8">

                <h2 class="text-3xl font-bold text-gray-800">
                    Dashboard
                </h2>

                <p class="text-gray-500 mt-2">
                    Welcome back 👋
                </p>

            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">
                        Total Products
                    </h3>

                    <p class="text-3xl font-bold text-green-600 mt-2">
                        120
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">
                        Categories
                    </h3>

                    <p class="text-3xl font-bold text-blue-600 mt-2">
                        12
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">
                        Brands
                    </h3>

                    <p class="text-3xl font-bold text-orange-500 mt-2">
                        8
                    </p>
                </div>

            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-2xl shadow p-6 mt-8">

                <h3 class="text-xl font-semibold mb-4">
                    Recent Activity
                </h3>

                <p class="text-gray-500">
                    Your grocery admin dashboard is running successfully.
                </p>

            </div>

        </main>

    </div>

</body>

</html>