@extends("admin.base")

@section("head")
    <title>Bookings</title>
@endsection

@section("content")
<div class="card">
    <div class="card-header fw-bold text-primary">Bookings</div>
    <div class="card-body">
      <form action="{{ route("admin.bookings.index") }}" method="GET" class="d-flex gap-2 justify-content-end mb-3">
          <select class="form-select" name="filter" style="width: 200px">
              <option selected>All</option>
              <option value="canceled" {{ request()->query("filter") == "canceled" ? "selected" : "" }}>Canceled</option>
              <option value="past_booked" {{ request()->query("filter") == "past_booked" ? "selected" : "" }}>Past Booked</option>
              <option value="future_booking" {{ request()->query("filter") == "future_booking" ? "selected" : "" }}>Future Booking</option>
              <option value="today_booking" {{ request()->query("filter") == "today_booking" ? "selected" : "" }}>Today"s Booking</option>
            </select> 
            <input type="search" name="search" value="{{ request()->query("search") }}" class="form-control" style="width: 200px" placeholder="Search...">
            <button type="submit" class="btn btn-primary">Search</button>   
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
         @if (count($bookings) == 0)
         <tr>
          <td colspan="4">No Bookings Found</td>
        </tr>
         @endif
          @foreach ($bookings as $booking)
          <tr>
            <td>{{ $booking->room_no }}</td>
            <td>{{ $booking->email }}</td>
            <td>{{ date("d-m-Y", strtotime($booking->check_in)) }}</td>
            <td>{{ date("d-m-Y", strtotime($booking->check_out)) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-end">
        {{ $bookings->withQueryString()->links() }}
      </div>
    </div>
  </div>
</div>
@endsection