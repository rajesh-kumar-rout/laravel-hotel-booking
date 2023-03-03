@extends('base')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-12 col-md-3 mb-4 mb-md-0">
            <div class="card text-bg-primary">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="check_in_date" class="form-label text-white">Check In Date</label>
                        <input type="email" class="form-control" id="check_in_date" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="check_in_date" class="form-label text-white">Check Out Date</label>
                        <input type="email" class="form-control" id="check_in_date" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="check_in_date" class="form-label text-white">Adults</label>
                        <input type="email" class="form-control" id="check_in_date" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="check_in_date" class="form-label text-white">Children</label>
                        <input type="email" class="form-control" id="check_in_date" aria-describedby="emailHelp">
                    </div>
                    <button class="btn btn-warning">Check Availability</button>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-9">
            <div class="d-flex align-items-start justify-content-start gap-3">
                @foreach ($rooms as $room)
                <div class="card card-body">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <img  class="img-fluid" src="/uploads/{{ $room->image_url }}">
                        </div>

                        <div class="col-12 col-md-9">
                            <div class="row">
                                <div class="col-12 col-md-9 mt-2 mt-md-0">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="fw-bold text-primary">{{ $room->name }}</a>
                                    <p class="mb-2 mt-2">{{ $room->description }}</p>
                                    <p class="mb-2">{{ $room->beds }}</p>
                                    <p class="mb-2">Adults - {{ $room->adults }}</p>
                                    <p class="mb-2">Children - {{ $room->children }}</p>
                                    <div class="d-flex flex-wrap gap-1">
                                        @foreach ($room->facilities as $facility)
                                            <div class="badge bg-secondary">{{ $facility->name }}</div>
                                        @endforeach
                                    </div>
                                </div>

                                <div 
                                    class="mt-3 mt-md-0 col-12 col-md-3 d-flex gap-2 align-items-start align-items-md-center  
                                    justify-content-start justify-content-md-center flex-column border-start room-right"
                                >
                                    <h3>₹ {{ $room->price }}</h3>
                                    <a href="{{ route('bookings.create', ['room' => $room->id]) }}" class="btn btn-primary btn-sm">Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Dulexe Double Room Gallery</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row g-2">
            <div class="col-3">
                <img class="img-fluid" src="https://cf.bstatic.com/xdata/images/hotel/square600/325771439.webp?k=342e764eea956b500cbda2cdd1c4d065fa9cf3cd6d334eb4959861424707408e&o=&s=1" alt="">
            </div>
            <div class="col-3">
                <img class="img-fluid" src="https://cf.bstatic.com/xdata/images/hotel/square600/325771439.webp?k=342e764eea956b500cbda2cdd1c4d065fa9cf3cd6d334eb4959861424707408e&o=&s=1" alt="">
            </div>
            <div class="col-3">
                <img class="img-fluid" src="https://cf.bstatic.com/xdata/images/hotel/square600/325771439.webp?k=342e764eea956b500cbda2cdd1c4d065fa9cf3cd6d334eb4959861424707408e&o=&s=1" alt="">
            </div>
            <div class="col-3">
                <img class="img-fluid" src="https://cf.bstatic.com/xdata/images/hotel/square600/325771439.webp?k=342e764eea956b500cbda2cdd1c4d065fa9cf3cd6d334eb4959861424707408e&o=&s=1" alt="">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection