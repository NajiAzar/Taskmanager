<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hexwhale Task </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hexwhale Task </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        <li class="nav-item">
                            @auth
                                <a href="{{ url('/home') }}" class="nav-link">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                @endif
                            @endauth
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Hexwhale Task Admin Panel Content Goes Here -->
        <h2>Welcome to Hexwhale Task Admin Panel</h2>
        <!-- Add your admin panel content here -->

        <!-- Login Form -->
         <!-- Login Form -->
         <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                @if(session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Log in</button>
                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                </form>

                @if ($errors->has('email') || $errors->has('password'))
                    <div class="alert alert-danger mt-3" role="alert">
                        Invalid credentials. Please check your email and password.
                    </div>
                @endif
            </div>
        </div>
        <!-- End Login Form -->

    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
