@extends("master")

@section("head")
    <title>Rooms</title>
@endsection

@section("body")
    <div class="row">
        <div class="col-12 col-md-3 mb-4 mb-md-0">
            <div class="card text-bg-primary">
                <div class="card-header">Search</div>

                <form class="card-body" action="{{ route("room.index") }}">
                    <div class="mb-3">
                        <label for="checkIn" class="form-label text-white">Check In Date</label>

                        <input type="date" class="form-control" id="checkIn" name="check_in" value="{{ request()->query("check_in") }}">
                    </div>

                    <div class="mb-3">
                        <label for="checkOut" class="form-label text-white">Check Out Date</label>

                        <input type="date" class="form-control" id="checkOut" name="check_out" value="{{ request()->query("check_out") }}">
                    </div>

                    <div class="mb-3">
                        <label for="adults" class="form-label text-white">Adults</label>

                        <input type="number" class="form-control" id="adults" name="adults" value="{{ request()->query("adults") }}">
                    </div>

                    <div class="mb-3">
                        <label for="children" class="form-label text-white">Children</label>
                        
                        <input type="number" class="form-control" id="children" name="children" value="{{ request()->query("children") }}">
                    </div>

                    <button class="btn btn-warning">Check Availability</button>
                </form>
            </div>
        </div>

        <div class="col-12 col-md-9">
            @if (count($rooms) == 0)
                <div class="alert alert-danger">No Room Found</div>
            @endif

            <div class="d-flex flex-column align-items-start justify-content-start gap-3">
                @foreach ($rooms as $room)
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <img  class="img-fluid rounded" src="/uploads/{{ $room->image_url }}">
                            </div>

                            <div class="col-12 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-md-9 mt-2 mt-md-0">
                                        <p class="fw-bold mb-2">{{ $room->name }}</p>
                                        
                                        <p class="mb-2">{{ $room->description }}</p>
                                        
                                        <p class="mb-2">{{ $room->beds }}</p>
                                        
                                        <p class="mb-2">Adults - {{ $room->adults }}, Children - {{ $room->children }}</p>
                                        
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach ($room->facilities as $facility)
                                                <div class="badge bg-secondary">{{ $facility->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div 
                                        class="room-right mt-2 mt-md-0 col-12 col-md-3 d-flex gap-2 align-items-start align-items-md-center justify-content-start justify-content-md-center flex-column border-start"
                                    >
                                        <h3>₹ {{ $room->price }}</h3>
                                        
                                        <a 
                                            href="{{ route("booking.create", ["room" => $room->id, "check_in" => request()->query("check_in"), "check_out" => request()->query("check_out")]) }}" 
                                            class="btn btn-primary btn-sm"
                                        >
                                            Book
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection