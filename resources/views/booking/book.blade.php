@extends("master")

@section("head")
    <title>Book</title>
@endsection

@section("body")
    <form 
        class="card mx-auto" 
        style="max-width: 500px" 
        action="{{ route("booking.store", ["room" => $room->id]) }}" 
        method="POST"
    >
        @csrf
        
        <div class="card-header fw-bold text-primary">Booking Details</div>

        <div class="card-body">
            <div class="mb-3">
                <label for="check_in" class="form-label">Check In Date</label>
                
                <input type="date" class="form-control @error("check_in") is-invalid @enderror" name="check_in" id="check_in" value="{{ old("check_in") }}">
                
                @error("check_in")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="check_out" class="form-label">Check Out Date</label>
                
                <input type="date" class="form-control @error("check_out") is-invalid @enderror" name="check_out" id="check_out" value="{{ old("check_out") }}">
                
                @error("check_out")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary w-100">Book</button>
        </div>
    </form>
@endsection