@extends("base")

@section("head")
    <title>Home</title>
@endsection

@section("content")
<div id="carouselCaption" class="slide carousel overflow-hidden" style="height: 400px">
    <div class="carousel-indicators">
        @foreach ($sliders as $slider)
            <button type="button" data-bs-target="#carouselCaption" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->index === 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach ($sliders as $slider)
            <div class="carousel-item {{ $loop->index === 0 ? "active" : "" }}">
                <div class="position-relative">
                    <img style="height: 400px" src="/uploads/{{ $slider->image_url }}" class="d-block w-100 img-fluid">
                    <div class="position-absolute top-0 start-0 bottom-0 end-0" style="background-color: rgba(0,0,0,0.5)"></div>
                </div>

                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $slider->title }}</h5>
                    <p>{{ $slider->description }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaption" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselCaption" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="card text-bg-primary mt-5">
      <div class="card-body">
          <form action="{{ route("rooms.index") }}" method="GET" class="d-flex flex-column flex-md-row gap-2">
              <div class="row g-2" style="flex: 1">
                  <div class="col-12 col-md-3 mb-3 mb-md-0">
                      <label for="check_in" class="form-label text-white">Check In Date</label>
                      <input type="date" class="form-control w-100" id="check_in" name="check_in">
                  </div>

                  <div class="col-12 col-md-3 mb-3 mb-md-0">
                      <label for="check_out" class="form-label text-white">Check Out Date</label>
                      <input type="date" class="form-control w-100" id="check_out" name="check_out">
                  </div>

                  <div class="col-12 col-md-3 mb-3 mb-md-0">
                      <label for="adults" class="form-label text-white">Adults</label>
                      <input type="number" class="form-control w-100" id="adults" name="adults">
                  </div>

                  <div class="col-12 col-md-3">
                      <label for="children" class="form-label text-white">Children</label>
                      <input type="number" class="form-control w-100" id="children" name="children">
                  </div>
              </div>
              
              <div>
                  <label class="form-label"></label>
                  <button class="btn btn-warning d-block mt-0 mt-md-2">Check Availability</button>
              </div>
          </form>
      </div>
</div>
@endsection