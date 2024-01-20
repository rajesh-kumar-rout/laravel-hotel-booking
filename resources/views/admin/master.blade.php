<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("head")

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">

    <script src="{{ asset("js/app.js") }}"></script>
</head>

<body>
    @include('admin.navbar')

    @if (session('success'))
        <div class="container mt-4 px-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

   <div class="container my-4">
      @yield("body")
   </div>
</body>

</html>