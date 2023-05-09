<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("head")

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">

    <script src="{{ asset("js/app.js") }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Admin</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link {{ Route::currentRouteName() == "admin.index" ? "active" : "" }}" href="{{ route("admin.index") }}">Home</a>
                </li>

                <li class="nav-item dropdown" data-bs-theme="light">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sliders
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route("admin.sliders.create")}}">Create</a></li>
                    <li><a class="dropdown-item" href="{{ route("admin.sliders.index")}}">Manage</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown" data-bs-theme="light">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Facility
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route("admin.facilities.create")}}">Create</a></li>
                    <li><a class="dropdown-item" href="{{ route("admin.facilities.index")}}">Manage</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown" data-bs-theme="light">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Room
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route("admin.rooms.create")}}">Create</a></li>
                    <li><a class="dropdown-item" href="{{ route("admin.rooms.index")}}">Manage</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown" data-bs-theme="light">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Setting
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route("admin.settings.edit")}}">Edit</a></li>
                    <li><a class="dropdown-item" href="{{ route("admin.settings.index")}}">Manage</a></li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route("admin.bookings.index") }}">Bookings</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route("admin.users.index") }}">Customers</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route("index") }}">View Site</a>
                </li>
              </ul>
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