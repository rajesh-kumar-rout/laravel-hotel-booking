@extends("admin.master")

@section("head")
    <title>Bookings</title>
@endsection

@section("body")
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <span class="fw-bold text-primary">Bookings</span>
    
      <form action="{{ route("admin.booking.index") }}" class="d-flex gap-2 align-items-center">
        <select class="form-select form-select-sm" name="filter" style="width: 200px">
            <option>All</option>
            <option value="canceled" {{ request()->query("filter") == "canceled" ? "selected" : null }}>Canceled</option>
            <option value="past_booked" {{ request()->query("filter") == "past_booked" ? "selected" : null }}>Past Booked</option>
            <option value="future_booking" {{ request()->query("filter") == "future_booking" ? "selected" : null }}>Future Booking</option>
            <option value="today_booking" {{ request()->query("filter") == "today_booking" ? "selected" : null }}>Today"s Booking</option>
        </select> 

        <input type="search" name="search" value="{{ request()->query("search") }}" class="form-control form-control-sm" 
        style="width: 200px" placeholder="Search...">

        <button type="submit" class="btn btn-sm btn-primary">Search</button>   
      </form>
    
    </div>

    <div class="card-body"> 
      <div class="table-responsive">
        <table class="table table-bordered mb-0" style="min-width: 1024px">
          <thead>
            <tr>
              <th scope="col">Room No</th>
              <th scope="col">Customer Email</th>
              <th scope="col">Check In</th>
              <th scope="col">Check Out</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($bookings as $booking)
            <tr>
              <td>{{ $booking->room_no }}</td>
              <td>{{ $booking->email }}</td>
              <td>{{ date("d-m-Y", strtotime($booking->check_in)) }}</td>
              <td>{{ date("d-m-Y", strtotime($booking->check_out)) }}</td>
            </tr>
            @empty 
              <tr>
                <td colspan="4">No Bookings Found</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <div class="d-flex justify-content-end">
          {{ $bookings->withQueryString()->links() }}
        </div>
      </div>
  </div>
</div>
@endsection