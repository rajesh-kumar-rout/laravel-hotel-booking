@extends('base')

@section('content')
    <div class="container my-4 px-3">
        <div class="card">
            <div class="card-header fw-bold text-primary">My Bookings</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" style="min-width: 1024px">
                  <thead>
                    <tr>
                      <th scope="col">S.NO</th>
                      <th scope="col">Room No</th>
                      <th scope="col">Check In</th>
                      <th scope="col">Check Out</th>
                      <th scope="col">Price</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>234</td>
                      <td>12/02/22</td>
                      <td>12/02/22</td>
                      <td>₹ 4500</td>
                      <td>
                        <button class="btn btn-primary btn-sm">View</button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>234</td>
                      <td>12/02/22</td>
                      <td>12/02/22</td>
                      <td>₹ 4500</td>
                      <td>
                        <button class="btn btn-primary btn-sm">View</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
@endsection