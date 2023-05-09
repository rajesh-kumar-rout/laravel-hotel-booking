@extends("base")

@section("head")
    <title>Edit Account</title>
@endsection

@section("content")
<form class="card mx-auto" style="max-width: 500px" action="{{ route("auth.edit-account") }}" method="post">
    @csrf
    @method("patch")

    <div class="card-header fw-bold text-primary">Edit Account</div>

    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            
            <input type="text" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" name="name" id="name" value="{{ old("name", auth()->user()->name) }}">
            
            @error("name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" name="email" id="email" value="{{ old("email", auth()->user()->email) }}">
            
            @error("email")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection