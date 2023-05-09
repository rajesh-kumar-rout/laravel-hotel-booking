@extends("admin.base")

@section("head")
    <title>Create New Room</title>
@endsection

@section("content")
<div class="container my-4 px-3">
    <div class="card mx-auto" style="max-width: 700px">
        <div class="card-header fw-bold text-primary">Create New Room</div>
     
        <form enctype="multipart/form-data" action="{{ route("admin.rooms.store") }}" class="card-body" method="POST" novalidate>
            @csrf

            <div class="mb-3">
                <label for="room_no" class="form-label">Room No</label>
                
                <input type="text" class="form-control {{ $errors->has("room_no") ? "is-invalid" : "" }}" name="room_no" id="room_no" value="{{ old("room_no") }}">
                
                @error("room_no")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                
                <input type="text" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" name="name" id="name" value="{{ old("name") }}">
                
                @error("name")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                
                <input type="number" class="form-control {{ $errors->has("price") ? "is-invalid" : "" }}" name="price" id="price" value="{{ old("price") }}">
                
                @error("price")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                
                <input type="text" class="form-control {{ $errors->has("description") ? "is-invalid" : "" }}" name="description" id="description" value="{{ old("description") }}">
                
                @error("description")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="beds" class="form-label">Beds</label>
                
                <input type="text" class="form-control {{ $errors->has("beds") ? "is-invalid" : "" }}" name="beds" id="beds" value="{{ old("beds") }}">
                
                @error("beds")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="adults" class="form-label">Adults</label>
                
                <input type="text" class="form-control {{ $errors->has("adults") ? "is-invalid" : "" }}" name="adults" id="adults" value="{{ old("adults") }}">
                
                @error("adults")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="children" class="form-label">Children</label>
                
                <input type="text" class="form-control {{ $errors->has("children") ? "is-invalid" : "" }}" name="children" id="children" value="{{ old('children') }}">
                
                @error("children")
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

            <div class="mb-3">
                <label for="facilities" class="form-label">Facilities</label>
                
                <select class="form-select {{ $errors->has("facilities") ? "is-invalid" : "" }}" multiple name="facilities[]" id="facilities">
                    @foreach ($facilities as $facility)
                        <option {{ in_array($facility->id, old("facilities", [])) ? "selected" : "" }} value="{{ $facility->id }}">{{ $facility->name }}</option>
                    @endforeach
                </select>
                
                @error("facilities")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection