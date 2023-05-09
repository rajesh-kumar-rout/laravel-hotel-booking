@extends("admin.base")

@section("head")
    <title>Home</title>
@endsection

@section("content")
<div class="row g-3">
    <div class="col-12 col-md-4 col-lg-3">
        <div class="card">
            <div class="card-header text-center fw-bold text-primary">
                Total Sliders
            </div>
            <div class="card-body text-center">
                <h1>{{ $total_sliders }}</h1>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-3">
        <div class="card">
            <div class="card-header text-center fw-bold text-primary">
                Total Rooms
            </div>
            <div class="card-body text-center">
                <h1>{{ $total_rooms }}</h1>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-3">
        <div class="card">
            <div class="card-header text-center fw-bold text-primary">
                Total Bookings
            </div>
            <div class="card-body text-center">
                <h1>{{ $total_bookings }}</h1>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-3">
        <div class="card">
            <div class="card-header text-center fw-bold text-primary">
                Total Facilities
            </div>
            <div class="card-body text-center">
                <h1>{{ $total_facilities }}</h1>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-3">
        <div class="card">
            <div class="card-header text-center fw-bold text-primary">
                Total Customers
            </div>
            <div class="card-body text-center">
                <h1>{{ $total_users }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection