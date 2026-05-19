<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forgot Password | Grocery Admin</title>

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
                                Forgot Password
                            </h2>

                            <p class="text-muted">
                                Enter your email to receive a reset link.
                            </p>

                        </div>

                        <!-- Success Message -->
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Email Address
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

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary w-100">
                                Send Reset Link
                            </button>

                            <!-- Back Login -->
                            <div class="text-center mt-3">

                                <a href="{{ route('login') }}"
                                    class="text-decoration-none">
                                    Back to Login
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>