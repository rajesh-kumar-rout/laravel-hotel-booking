@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <a class="btn btn-secondary mb-3" href="{{ route('admin.rooms.index') }}">Go Back</a>

    <div class="card">
        <div class="card-header fw-bold text-primary">Create New Room</div>
     
        <form enctype="multipart/form-data" action="{{ route('admin.rooms.store') }}" class="card-body" method="POST" novalidate>
            @csrf

            <div class="mb-3">
                <label for="room_no" class="form-label">Room No</label>
                <input type="text" class="form-control" name="room_no" id="room_no" value="{{ old('room_no') }}">
                @error('room_no')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}">
                @error('price')
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
                <label for="beds" class="form-label">Beds</label>
                <input type="text" class="form-control" name="beds" id="beds" value="{{ old('beds') }}">
                @error('beds')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="adults" class="form-label">Adults</label>
                <input type="text" class="form-control" name="adults" id="adults" value="{{ old('adults') }}">
                @error('adults')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="children" class="form-label">Children</label>
                <input type="text" class="form-control" name="children" id="children" value="{{ old('children') }}">
                @error('children')
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

            <div class="mb-3">
                <label for="facilities" class="form-label">Facilities</label>
                <select class="form-select" multiple name="facilities[]" id="facilities">
                    @foreach ($facilities as $facility)
                        <option {{ in_array($facility->id, old('facilities', [])) ? 'selected' : '' }} value="{{ $facility->id }}">{{ $facility->name }}</option>
                    @endforeach
                </select>
                @error('facilities')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection