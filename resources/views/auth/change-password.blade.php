@extends("base")

@section("head")
    <title>Change Password</title>
@endsection

@section("content")
<form class="card mx-auto" style="max-width: 500px" action="{{ route("auth.change-password") }}" method="post">
    @csrf
    @method("patch")

    <div class="card-header fw-bold text-primary">Change Password</div>

    <div class="card-body">
        <div class="mb-3">
            <label for="old_password" class="form-label">Old Password</label>
            
            <input type="password" class="form-control {{ $errors->has("old_password") ? "is-invalid" : "" }}" name="old_password" id="old_password">
            
            @error("old_password")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control {{ $errors->has("new_password") ? "is-invalid" : "" }}" name="new_password" id="new_password">
            @error("new_password")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation">
        </div>

        <button class="btn btn-primary">Change Password</button>
    </div>
</form>
@endsection