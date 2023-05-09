@extends("admin.base")

@section("head")
    <title>Edit Facility</title>
@endsection

@section("content")
<div class="card mx-auto" style="max-width: 500px">
    <div class="card-header fw-bold text-primary">Edit Facility</div>

    <form action="{{ route("admin.facilities.update", ["facility" => $facility->id]) }}" class="card-body" method="post">
        @csrf
        @method("patch")

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            
            <input type="text" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" name="name" id="name" value="{{ old("name", $facility->name) }}">
            
            @error("name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection