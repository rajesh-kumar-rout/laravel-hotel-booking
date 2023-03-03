@extends('base')

@section('content')
    <div class="container my-4 px-3">
        <form class="card mx-auto" style="max-width: 600px" action="" method="post">
            <div class="card-header fw-bold text-primary">Register</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="fullName">
                </div>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Email</label>
                    <input type="text" class="form-control" name="full_name" id="fullName">
                </div>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Password</label>
                    <input type="text" class="form-control" name="full_name" id="fullName">
                </div>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Confirm Password</label>
                    <input type="text" class="form-control" name="full_name" id="fullName">
                </div>
                <button class="btn btn-primary w-100">Register</button>
                <p class="text-center mt-3">Already have an account ? <a href="{{ route('auth.login') }}">Login</a></p>
            </div>
        </form>
    </div>
@endsection