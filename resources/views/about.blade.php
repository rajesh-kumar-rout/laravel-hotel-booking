@extends('base')

@section('content')
    <div class="container px-2 my-4">
        <div class="card">
            <div class="card-header fw-bold text-primary">About Us</div>
            <div class="card-body">
                <p class="card-text">{{ $about }}</p>
            </div>
        </div>
    </div>
@endsection