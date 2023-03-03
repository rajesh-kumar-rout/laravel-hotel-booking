@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <a href="" class="btn btn-secondary btn-sm mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
          </svg>
          Dashboard
    </a>



    <div class="card">
        <div class="card-header fw-bold text-primary">Bookings</div>
        <div class="card-body">
            <form action="" class="d-flex gap-2 justify-content-end mb-3">
                <select class="form-select" style="width: 200px">
                    <option selected>All</option>
                    <option value="1">Canceled</option>
                    <option value="2">Past Booked</option>
                    <option value="3">Future Booked</option>
                  </select> 
                  <input type="search" class="form-control" style="width: 200px" placeholder="Search...">
                  <button class="btn btn-primary">Search</button>   
            </form>
          <div class="table-responsive">
            <table class="table table-bordered text-center" style="min-width: 1024px">
              <thead>
                <tr>
                  <th scope="col">Room No</th>
                  <th scope="col">Customer Email</th>
                  <th scope="col">Check In</th>
                  <th scope="col">Check Out</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">12</th>
                  <td>john@john.com</td>
                  <td>12/02/22 10:15 PM</td>
                  <td>12/02/22 10:15 PM</td>
                </tr>
                <tr>
                  <th scope="row">12</th>
                  <td>john@john.com</td>
                  <td>12/02/22 10:15 PM</td>
                  <td>12/02/22 10:15 PM</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>


@endsection