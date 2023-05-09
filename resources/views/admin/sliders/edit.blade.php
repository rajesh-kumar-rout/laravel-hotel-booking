@extends("admin.base")

@section("head")
    <title>Edit Slider</title>
@endsection

@section("content")
<div class="card mx-auto" style="max-width: 700px">
    <div class="card-header fw-bold text-primary">Edit Slider</div>

    <form enctype="multipart/form-data" action="{{ route("admin.sliders.update", ["slider" => $slider->id]) }}" class="card-body" method="post">
        @csrf
        @method("patch")

        <div class="mb-3 has-validation">
            <label for="title" class="form-label">Title</label>
            
            <input type="text" class="form-control" name="title" id="title" value="{{ old("title", $slider->title) }}">
            
            @error("title")
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            
            <input type="text" class="form-control" name="description" id="description" value="{{ old("description", $slider->description) }}">
            
            @error("description")
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            
            <input type="file" class="form-control" name="image" id="image">
            
            <img src="/uploads/{{ $slider->image_url }}" class="img-fluid mt-1" width="80" height="80">
            
            @error("image")
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection