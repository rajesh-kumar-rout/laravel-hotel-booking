@extends("admin.master")

@section("head")
    <title>{{ isset($slider) ? "Edit Slider" : "Create Slider" }}</title>
@endsection

@section("body")
    <div class="container my-4 px-3 mx-auto" style="max-width: 700px">
        <form 
            class="card" 
            enctype="multipart/form-data" action="{{ isset($slider) ? route('admin.slider.update', ['slider' => $slider->id]) : route('admin.slider.store') }}"  
            method="post"
        >
            @method(isset($slider) ? "PATCH" : "POST")

            <div class="card-header fw-bold text-primary">{{ isset($slider) ? "Edit Slider" : "Create Slider" }}</div>

            <div class="card-body">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    
                    <input type="text" class="form-control @error("tot;e") is-invalid @enderror" name="title" id="title" value="{{ old('title', $slider->title ?? null) }}">
                    
                    @error("title")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    
                    <input type="text" class="form-control @error("description") is-invalid @enderror" name="description" id="description" value="{{ old('description', $slider->description ?? null) }}">
                    
                    @error("description")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                    
                    <input type="file" class="form-control @error("image") is-invalid @enderror" name="image" id="image">
                    
                    @error("image")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection