@extends("master")

@section("head")
    <title>Edit Account</title>
@endsection

@section("body")
<form class="card mx-auto" style="max-width: 400px" action="{{ route("account.update") }}" method="post">
    @csrf
    @method("patch")

    <div class="card-header fw-bold text-primary">Edit Account</div>

    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            
            <input type="text" class="form-control @error("name") is-invalid @enderror" name="name" id="name" value="{{ old("name", auth()->user()->name) }}">
            
            @error("name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>

            <input type="text" class="form-control @error("email") is-invalid @enderror" name="email" id="email" value="{{ old("email", auth()->user()->email) }}">
            
            @error("email")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
    </div>
</form>
@endsection