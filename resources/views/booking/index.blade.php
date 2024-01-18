@extends("master")

@section("head")
    <title>My Bookings</title>
@endsection

@section("body")
    <div class="card">
        <div class="card-header fw-bold text-primary">My Bookings</div>

        <div class="card-body">
            @if (count($bookings) == 0)
                <span class="d-block text-center">No Bookings Found</span>
            @endif

            @foreach ($bookings as $booking)
            <div class="border-bottom border-2 pb-3 mb-3 booking-room">
                <div class="row g-3">
                    <div class="col-12 col-md-2">
                        <img  class="img-fluid rounded" src="/uploads/{{ $booking->image_url }}">
                    </div>

                    <div class="col-12 col-md-10">
                        <div class="row">
                            <div class="col-12 col-md-9 mt-2 mt-md-0">
                                <p class="fw-bold mb-2">{{ $booking->name }}</p>
                                
                                <p class="mb-2">{{ $booking->description }}</p>
                                
                                <p class="mb-2">{{ $booking->beds }}</p>
                                
                                <p class="mb-2">Adults - {{ $booking->adults }}, Children - {{ $booking->children }}</p>
                                
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach ($booking->facilities as $facility)
                                        <div class="badge bg-secondary">{{ $facility->name }}</div>
                                    @endforeach
                                </div>
                            </div>

                            <div 
                                class="room-right mt-2 mt-md-0 col-12 col-md-3 d-flex gap-2 align-items-start align-items-md-center justify-content-start justify-content-md-center flex-column border-start"
                            >
                                <p class="mb-0">Check In  - {{ date("d-m-Y", strtotime($booking->pivot->check_in)) }}</p>

                                <p class="mb-0">Check Out - {{ date("d-m-Y", strtotime($booking->pivot->check_out)) }}</p>

                                <p class="mb-0">Room NO - {{ $booking->room_no }}</p>

                                <h3 class="mb-0">₹ {{ $booking->price }}</h3>

                                @if ((date("Y-m-d") < $booking->pivot->check_in) && ($booking->pivot->is_canceled == 0))
                                    <form 
                                        class="form-cancel" 
                                        action="{{ route("booking.cancel", ["booking" => $booking->pivot->id]) }}" 
                                        method="post"
                                    >
                                        @csrf
                                        @method("patch")

                                        <button type="submit" class="btn btn-sm btn-warning">Cancel Booking</button>  
                                    </form>
                                @endif

                                @if ($booking->pivot->is_canceled == 1)
                                    <span class="badge bg-danger">Canceled</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.querySelector(".form-cancel")?.addEventListener("submit", event => {
            event.preventDefault()
            
            if(confirm("Are you sure you want to cancel the booking ?")) event.target.submit()
        })
    </script>
@endsection