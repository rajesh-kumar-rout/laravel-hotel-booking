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
                    <div class="col-12 col-md-2">
                        <img  class="img-fluid" src="/uploads/{{ $booking->image_url }}">
                    </div>

                    <div class="col-12 col-md-10">
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
                                class="mt-3 mt-md-0 col-12 col-md-3 d-flex gap-2 align-items-start align-items-md-center  
                                justify-content-start justify-content-md-center flex-column border-start room-right"
                            >
                              <p>Check In  - {{ $booking->pivot->check_in }}</p>
                              <p>Check Out - {{ $booking->pivot->check_out }}</p>
                              <p>Room NO - {{ $booking->room_no }}</p>
                                <h3>₹ {{ $booking->price }}</h3>
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