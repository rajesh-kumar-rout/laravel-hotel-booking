@extends('base')

@section('content')
    <div class="container my-4 px-3">
        <div class="card">
            <div class="card-header fw-bold text-primary">My Bookings</div>
            <div class="card-body">
              @if (count($bookings) == 0)
                  <span class="d-block text-center">No Bookings Found</span>
              @endif
              @foreach ($bookings as $booking)
              <div class="border-bottom border-2 pb-3 mb-3 booking-room">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img  class="img-fluid" src="/uploads/{{ $booking->image_url }}">
                    </div>

                    <div class="col-12 col-md-9">
                        <div class="row">
                            <div class="col-12 col-md-9 mt-2 mt-md-0">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="fw-bold text-primary">{{ $booking->name }}</a>
                                <p class="mb-2 mt-2">{{ $booking->description }}</p>
                                <p class="mb-2">{{ $booking->beds }}</p>
                                <p class="mb-2">Adults - {{ $booking->adults }}</p>
                                <p class="mb-2">Children - {{ $booking->children }}</p>
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach ($booking->facilities as $facility)
                                        <div class="badge bg-secondary">{{ $facility->name }}</div>
                                    @endforeach
                                </div>
                            </div>

                            <div 
                                class="mt-3 mt-md-0 col-12 col-md-3 d-flex gap-3 align-items-start align-items-md-center  
                                justify-content-start justify-content-md-center flex-column border-start room-right"
                            >
                              <p class="mb-0">Check In  - {{ $booking->pivot->check_in }}</p>
                              <p class="mb-0">Check Out - {{ $booking->pivot->check_out }}</p>
                              <p class="mb-0">Room NO - {{ $booking->room_no }}</p>
                                <h3>₹ {{ $booking->price }}</h3>
                                @if ((date('Y-m-d') < $booking->pivot->check_in) && ($booking->pivot->is_canceled == 0))
                                <form action="{{ route('bookings.cancel', ['booking' => $booking->pivot->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-warning">Cancel Booking</button>
                                    
                                </form>
                                    
                                @endif
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