@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <a class="btn btn-secondary mb-3" href="{{ route('admin.rooms.index') }}">Go Back</a>

    <div class="card">
        <div class="card-header fw-bold text-primary">Edit Room</div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form enctype="multipart/form-data" action="{{ route('admin.rooms.update', ['room' => $room->id]) }}" class="card-body" method="POST" novalidate>
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="room_no" class="form-label">Room No</label>
                <input type="text" class="form-control" name="room_no" id="room_no" value="{{ old('room_no', $room->room_no) }}">
                @error('room_no')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $room->name) }}">
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $room->price) }}">
                @error('price')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ old('description', $room->description) }}">
                @error('description')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="beds" class="form-label">Beds</label>
                <input type="text" class="form-control" name="beds" id="beds" value="{{ old('beds', $room->beds) }}">
                @error('beds')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="adults" class="form-label">Adults</label>
                <input type="text" class="form-control" name="adults" id="adults" value="{{ old('adults', $room->adults) }}">
                @error('adults')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="children" class="form-label">Children</label>
                <input type="text" class="form-control" name="children" id="children" value="{{ old('children', $room->children) }}">
                @error('children')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image">
                <img src="/uploads/{{ $room->image_url }}" class="img-fluid mt-1" width="80" height="80">
                @error('image')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label for="facilities" class="form-label">Facilities</label>
                <select class="form-select" multiple name="facilities[]" id="facilities">
                    @foreach ($facilities as $facility)
                        <option {{ in_array($facility->id, $room_facilities) ? 'selected' : '' }} value="{{ $facility->id }}">{{ $facility->name }}</option>
                    @endforeach
                </select>
                @error('facilities')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
@endsection