<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Grocery Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-4">

                <div class="card shadow border-0">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">

                            <h2 class="fw-bold">
                                Grocery Admin
                            </h2>

                            <p class="text-muted">
                                Sign in to continue
                            </p>

                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    required
                                    autofocus>

                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                            <!-- Password -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    required>

                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                            <!-- Remember -->
                            <div class="form-check mb-3">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember">

                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>

                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="btn btn-primary w-100">
                                Login
                            </button>

                            <!-- Forgot Password -->
                            @if (Route::has('password.request'))
                            <div class="text-center mt-3">

                                <a href="{{ route('password.request') }}"
                                    class="text-decoration-none">
                                    Forgot Password?
                                </a>

                            </div>
                            @endif

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>