@extends("master")

@section("head")
    <title>Register</title>
@endsection

@section("body")
<form class="card mx-auto" style="max-width: 500px" action="{{ route("account.register") }}" method="post">
    @csrf

    <div class="card-header fw-bold text-primary">Register</div>

    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            
            <input type="text" class="form-control @error("name") is-invalid @enderror" name="name" id="name" value="{{ old("name") }}">
            
            @error("name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            
            <input type="email" class="form-control @error("email") is-invalid @enderror" name="email" id="email" value="{{ old("email") }}">
            
            @error("email")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
            
            <input type="password" class="form-control @error("password") is-invalid @enderror" name="password" id="password">
            
            @error("password")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="passwordConfirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>

            <input type="password" class="form-control" name="password_confirmation" id="passwordConfirmation">
        </div>

        <button class="btn btn-primary w-100">Register</button>
        
        <p class="text-center mt-3">Already have an account ? <a href="{{ route("account.login") }}">Login</a></p>
    </div>
</form>
@endsection