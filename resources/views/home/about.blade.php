@extends("master")

@section("head")
    <title>About Us</title>
@endsection

@section("body")
    <div class="card">
        <div class="card-header fw-bold text-primary">About Us</div>
        <div class="card-body">
            <p class="card-text">{{ $about }}</p>
        </div>
    </div>
@endsection