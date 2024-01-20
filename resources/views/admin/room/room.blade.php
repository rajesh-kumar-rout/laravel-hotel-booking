@extends("admin.master")

@section("head")
    <title>{{ isset($room) ? "Edit Room" : "Create Room" }}</title>
@endsection

@section("body")
    <div class="container my-4 px-3">
        <form enctype="multipart/form-data" action="{{ isset($room) ? route('admin.room.update', ['room' => $room->id]) : route("admin.room.store") }}" class="card mx-auto" style="max-width: 700px" method="POST">
            <div class="card-header fw-bold text-primary">{{ isset($room) ? "Edit Room" : "Create Room" }}</div>
        
            <div class="card-body">
                @csrf
                @method(isset($room) ? 'PATCH' : 'POST')

                <div class="mb-3">
                    <label for="roomNo" class="form-label">Room No</label>
                    
                    <input type="text" class="form-control @error('room_no') is-invalid @enderror" name="room_no" id="roomNo" value="{{ old("room_no", $room->room_no ?? null) }}">
                    
                    @error("room_no")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old("name", $room->name ?? null) }}">
                    
                    @error("name")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old("price", $room->price ?? null) }}">
                    
                    @error("price")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old("description", $room->description ?? null) }}">
                    
                    @error("description")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="beds" class="form-label">Beds</label>
                    
                    <input type="text" class="form-control @error('beds') is-invalid @enderror" name="beds" id="beds" value="{{ old("beds", $room->beds ?? null) }}">
                    
                    @error("beds")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="adults" class="form-label">Adults</label>
                    
                    <input type="text" class="form-control @error('adults') is-invalid @enderror" name="adults" id="adults" value="{{ old("adults", $room->adults ?? null) }}">
                    
                    @error("adults")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="children" class="form-label">Children</label>
                    
                    <input type="text" class="form-control @error('children') is-invalid @enderror" name="children" id="children" value="{{ old('children', $room->children ?? null) }}">
                    
                    @error("children")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                    
                    @error("image")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="facilities" class="form-label">Facilities</label>
                    
                    <select class="form-select @error('facilities') is-invalid @enderror" multiple name="facilities[]" id="facilities">
                        @foreach ($facilities as $facility)
                            <option {{ in_array($facility->id, old("facilities", $room_facilities ?? [])) ? "selected" : "" }} value="{{ $facility->id }}">{{ $facility->name }}</option>
                        @endforeach
                    </select>
                    
                    @error("facilities")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection