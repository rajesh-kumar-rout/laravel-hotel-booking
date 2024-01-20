@extends("master")

@section("head")
    <title>Change Password</title>
@endsection

@section("body")
    <form class="card mx-auto" style="max-width: 400px" action="{{ route("account.password.change") }}" method="post">
        @csrf
        @method("PATCH")

        <div class="card-header fw-bold text-primary">Change Password</div>

        <div class="card-body">
            <div class="mb-3">
                <label for="oldPassword" class="form-label">Old Password <span class="text-danger">*</span></label>
                
                <input type="password" class="form-control @error("old_password") is-invalid @enderror" name="old_password" id="oldPassword">
                
                @error("old_password")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="newPassword" class="form-label">New Password <span class="text-danger">*</span></label>

                <input type="password" class="form-control @error("new_password") is-invalid @enderror" name="new_password" id="newPassword">

                @error("new_password")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="passwordConfirmation" class="form-label">Confirm New Password <span class="text-danger">*</span></label>

                <input type="password" class="form-control" name="password_confirmation" id="passwordConfirmation">
            </div>

            <button class="btn btn-primary w-100">Change Password</button>
        </div>
    </form>
@endsection