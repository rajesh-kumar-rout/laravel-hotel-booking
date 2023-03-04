@extends('base')

@section('content')
    <div class="container my-4 px-3">
        <form class="card mx-auto" style="max-width: 700px" action="{{ route('bookings.store', ['room' => $room->id]) }}" method="POST">
            @csrf
            
            <div class="card-header fw-bold text-primary">Booking Details</div>

            <div class="card-body">
                <div class="mb-3">
                    <label for="check_in" class="form-label">Check In Date</label>
                    <input type="date" class="form-control" name="check_in" id="check_in" value="{{ old('check_in', request()->query('check_in')) }}">
                    @error('check_in')
                        <span class="text-danger mt-1 d-inline-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="check_out" class="form-label">Check Out Date</label>
                    <input type="date" class="form-control" name="check_out" id="check_out" value="{{ old('check_out', request()->query('check_out')) }}">
                    @error('check_out')
                        <span class="text-danger mt-1 d-inline-block">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary">Book</button>
            </div>
        </form>
    </div>
@endsection