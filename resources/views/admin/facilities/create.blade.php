@extends("admin.base")

@section("head")
    <title>Create New Facility</title>
@endsection

@section("content")
<div class="card mx-auto" style="max-width: 500px">
    <div class="card-header fw-bold text-primary">Create New Facility</div>

    <form action="{{ route("admin.facilities.store") }}" class="card-body" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            
            <input type="text" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" name="name" id="name" value="{{ old("name") }}">
            
            @error("name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection