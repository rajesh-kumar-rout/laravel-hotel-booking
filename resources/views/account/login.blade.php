@extends("master")

@section("head")
    <title>Login</title>
@endsection

@section("body")
<form class="card mx-auto" style="max-width: 500px" action="{{ route("account.login") }}" method="post">
    @csrf

    <div class="card-header fw-bold text-primary">Login</div>

    <div class="card-body">
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
        
        <button class="btn btn-primary w-100">Login</button>

        <p class="text-center mt-3">Do not have an account ? <a href="{{ route("account.register") }}">Register</a></p>
    </div>
</form>
@endsection