@extends("admin.base")

@section("head")
    <title>Create Slider</title>
@endsection

@section("content")
<div class="container my-4 px-3 mx-auto" style="max-width: 700px">
    <div class="card">
        <div class="card-header fw-bold text-primary">Create New Slider</div>

        <form enctype="multipart/form-data" action="{{ route('admin.sliders.store') }}" class="card-body" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                
                <input type="text" class="form-control {{ $errors->has("title") ? "is-invalid" : "" }}" name="title" id="title" value="{{ old("title") }}">
                
                @error("title")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                
                <input type="text" class="form-control {{ $errors->has("description") ? "is-invalid" : "" }}" name="description" id="description" value="{{ old('description') }}">
                
                @error("description")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                
                <input type="file" class="form-control {{ $errors->has("image") ? "is-invalid" : "" }}" name="image" id="image">
                
                @error("image")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection