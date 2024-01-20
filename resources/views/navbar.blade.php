<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home.index') }}">MYStudio</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"data-bs-target="#navContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home.index') ? 'active' : null }}" href="{{ route('home.index') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('room.index') ? 'active' : null }}" href="{{ route('room.index') }}">Rooms</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home.about') ? 'active' : null }}" href="{{ route('home.about') }}">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home.contact') ? 'active' : null }}" href="{{ route('home.contact') }}">Contact</a>
                </li>

                @auth
                    <li class="nav-item dropdown" data-bs-theme="light">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs("account.*") || request()->routeIs("booking.index")  ? "active" : null }}" href="#" data-bs-toggle="dropdown">Account</a>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs("booking.index") ? "active" : null }}" href="{{ route("booking.index") }}">My Bookings</a>
                            </li>
                            
                            <li>
                                <a class="dropdown-item {{ request()->routeIs("account.edit") ? "active" : null }}" href="{{ route("account.edit") }}">Edit Account</a>
                            </li>
                            
                            <li>
                                <a class="dropdown-item {{ request()->routeIs("account.password.change") ? "active" : null }}" href="{{ route("account.password.change") }}">Change Password</a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            @if (request()->user()->is_admin)
                                <li>
                                    <a class="dropdown-item" href="{{ route("admin.home.index") }}">Admin Panel</a>
                                </li>
                            @endif

                            <li>
                                <a class="dropdown-item" href="{{ route("account.logout") }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                @endauth

                @guest
                    <a href="{{ route("account.login") }}" class="btn btn-warning">Login/Register</a>     
                @endguest
            </ul>
        </div>
    </div>
</nav>