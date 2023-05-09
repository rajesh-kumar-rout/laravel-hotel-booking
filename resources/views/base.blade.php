<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("head")

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset("js/app.js") }}"></script>

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>

<body>
    @if (request()->user() && request()->user()->is_admin)
        <a class="bg-white py-2 text-end px-4 d-block" href="{{ route('admin.index') }}">Admin Panel</a>
    @endif

    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('index') }}">MYStudio</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"data-bs-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteNamed('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteNamed('rooms.index') ? 'active' : '' }}" href="{{ route('rooms.index') }}">Rooms</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteNamed('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteNamed('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>

                    @if (auth()->user())
                        <li class="nav-item dropdown" data-bs-theme="light">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Account</a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route("bookings.index") }}">My Bookings</a>
                                </li>
                                
                                <li>
                                    <a class="dropdown-item" href="{{ route("auth.edit-account") }}">Edit Account</a>
                                </li>
                                
                                <li>
                                    <a class="dropdown-item" href="{{ route("auth.change-password") }}">Change Password</a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route("auth.logout") }}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <a href="{{ route("auth.login") }}" class="btn btn-warning ms-0 ms-md-2">Login/Register</a>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if (session()->has("success"))
        <div class="container mt-4 px-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container my-4">
        @yield("content")
    </div>
</body>

</html>