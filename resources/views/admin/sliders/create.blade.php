@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <a class="btn btn-secondary mb-3" href="{{ route('admin.sliders.index') }}">Go Back</a>

    <div class="card">
        <div class="card-header fw-bold text-primary">Create New Slider</div>

        <form enctype="multipart/form-data" action="{{ route('admin.sliders.store') }}" class="card-body" method="POST" novalidate>
            @csrf

            <div class="mb-3 has-validation">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
                @error('description')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image">
                @error('image')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection