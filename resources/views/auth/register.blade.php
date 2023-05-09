@extends("base")

@section("head")
    <title>Register</title>
@endsection

@section("content")
<form class="card mx-auto" style="max-width: 500px" action="{{ route("auth.register") }}" method="post">
    @csrf

    <div class="card-header fw-bold text-primary">Register</div>
    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            
            <input type="text" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" name="name" id="name" value="{{ old("name") }}">
            
            @error("name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            
            <input type="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" name="email" id="email" value="{{ old("email") }}">
            
            @error("email")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            
            <input type="password" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}" name="password" id="password">
            
            @error("password")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>

        <button class="btn btn-primary w-100">Register</button>
        
        <p class="text-center mt-3">Already have an account ? <a href="{{ route("auth.login") }}">Login</a></p>
    </div>
</form>
@endsection