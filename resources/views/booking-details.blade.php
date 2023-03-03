@extends('base')

@section('content')
    <div class="container my-4 px-3">
        <button class="btn btn-primary btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
              </svg>
        </button>

    <div class="card mt-4">
        <div class="card-header fw-bold text-primary">23/02/23 - 23/02/23</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3">
                    <img 
                        class="img-fluid"
                        src="https://cf.bstatic.com/xdata/images/hotel/square600/325771439.webp?k=342e764eea956b500cbda2cdd1c4d065fa9cf3cd6d334eb4959861424707408e&o=&s=1"
                        alt=""
                    >
                </div>

                <div class="col-12 col-md-9">
                    <div class="row">
                        <div class="col-12 col-md-9 mt-2 mt-md-0">
                            <a href="" class="fw-bold text-primary">Dulexe Double Room</a>
                            <p class="mb-2 mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse,
                                recusandae.</p>
                            <p class="mb-2">2 Single Beds</p>
                            <p class="mb-2">Adults - 2</p>
                            <p class="mb-2">Children - 2</p>
                            <div class="d-flex flex-wrap gap-1">
                                <div class="badge bg-secondary">Desk</div>
                                <div class="badge bg-secondary">TV</div>
                                <div class="badge bg-secondary">Flat-screen TV</div>
                                <div class="badge bg-secondary">AC</div>
                                <div class="badge bg-secondary">Hand Sanitizer</div>
                                <div class="badge bg-secondary">City View</div>
                                <div class="badge bg-secondary">Private Bathroom</div>
                            </div>
                        </div>

                        <div 
                            class="mt-3 mt-md-0 col-12 col-md-3 d-flex gap-2 align-items-start align-items-md-center  
                            justify-content-start justify-content-md-center flex-column border-start room-right"
                        >
                            <h3>₹ 683</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection