@extends('base')

@section('content')
    <div class="container my-4 px-3">
        <form class="card mx-auto" style="max-width: 700px" action="{{ route('auth.change-password') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="card-header fw-bold text-primary">Change Password</div>

            <div class="card-body">
                <div class="mb-3">
                    <label for="old_password" class="form-label">Old Password</label>
                    <input type="password" class="form-control" name="old_password" id="old_password">
                    @error('old_password')
                        <span class="text-danger mt-1 d-inline-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new_password">
                    @error('new_password')
                        <span class="text-danger mt-1 d-inline-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation">
                </div>

                <button class="btn btn-primary">Change Password</button>
            </div>
        </form>
    </div>
@endsection