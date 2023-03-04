@extends('base')

@section('content')
    <div class="container my-4 px-3">
        <form class="card mx-auto" style="max-width: 600px" action="{{ route('auth.register') }}" method="POST">
            @csrf

            <div class="card-header fw-bold text-primary">Register</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="d-inline-block mt-1 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="d-inline-block mt-1 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    @error('password')
                        <span class="d-inline-block mt-1 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>
                <button class="btn btn-primary w-100">Register</button>
                <p class="text-center mt-3">Already have an account ? <a href="{{ route('auth.login') }}">Login</a></p>
            </div>
        </form>
    </div>
@endsection