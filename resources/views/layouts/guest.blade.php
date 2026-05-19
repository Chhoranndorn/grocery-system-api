<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-green-50 to-white min-h-screen">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="text-center mb-8">

                <div class="flex justify-center mb-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/2331/2331970.png"
                        alt="Grocery Logo"
                        class="w-24 h-24">
                </div>

                <h1 class="text-3xl font-bold text-gray-800">
                    Grocery Admin
                </h1>

                <p class="text-gray-500 mt-2 text-sm">
                    Welcome back. Please sign in to continue.
                </p>

            </div>

            <!-- Login Card -->
            <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 p-8">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>

</html>