@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <div class="row g-3">
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card">
                <div class="card-header text-center fw-bold text-primary">
                    Total Sliders
                </div>
                <div class="card-body text-center">
                    <h1>{{ $total_sliders }}</h1>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary btn-sm">View</a>
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
                <div class="card-footer text-center">
                    <a href="{{ route('admin.rooms.index') }}" class="btn btn-primary btn-sm">View</a>
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
                <div class="card-footer text-center">
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary btn-sm">View</a>
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
                <div class="card-footer text-center">
                    <a href="{{ route('admin.facilities.index') }}" class="btn btn-primary btn-sm">View</a>
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
                <div class="card-footer text-center">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">View</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card">
                <div class="card-header text-center fw-bold text-primary">
                    Others
                </div>
                <div class="card-body d-flex flex-column gap-2 justify-content-center align-items-center">
                    <a href="{{ route('admin.settings.index') }}" class="btn btn-sm btn-primary">Settings</a>
                    <a href="{{ route('index') }}" class="btn btn-sm btn-primary">View Site</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection