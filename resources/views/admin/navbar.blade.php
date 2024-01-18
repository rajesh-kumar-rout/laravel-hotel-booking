<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Admin</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.home.index') ? "active" : null }}" href="{{ route("admin.home.index") }}">Home</a>
            </li>

            <li class="nav-item dropdown" data-bs-theme="light">
              <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.slider.*') ? "active" : null }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sliders
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item {{ request()->routeIs('admin.slider.create') ? "active" : null }}" href="{{ route("admin.slider.create")}}">Create</a></li>
                <li><a class="dropdown-item {{ request()->routeIs('admin.slider.index') ? "active" : null }}" href="{{ route("admin.slider.index")}}">View</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown" data-bs-theme="light">
              <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.facility.*') ? "active" : null }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Facility
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item {{ request()->routeIs('admin.facility.create') ? "active" : null }}" href="{{ route("admin.facility.create")}}">Create</a></li>
                <li><a class="dropdown-item {{ request()->routeIs('admin.facility.index') ? "active" : null }}" href="{{ route("admin.facility.index")}}">View</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown" data-bs-theme="light">
              <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.room.*') ? "active" : null }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Room
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item {{ request()->routeIs('admin.room.create') ? "active" : null }}" href="{{ route("admin.room.create")}}">Create</a></li>
                <li><a class="dropdown-item {{ request()->routeIs('admin.room.index') ? "active" : null }}" href="{{ route("admin.room.index")}}">View</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown" data-bs-theme="light">
              <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.setting.*') ? "active" : null }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Setting
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item {{ request()->routeIs('admin.setting.edit') ? "active" : null }}" href="{{ route("admin.setting.edit")}}">Edit</a></li>
                <li><a class="dropdown-item {{ request()->routeIs('admin.setting.index') ? "active" : null }}" href="{{ route("admin.setting.index")}}">View</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.booking.index') ? "active" : null }}" href="{{ route("admin.booking.index") }}">Bookings</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.user.index') ? "active" : null }}" href="{{ route("admin.user.index") }}">Users</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route("home.index") }}">View Site</a>
            </li>
          </ul>
    </div>
</nav>