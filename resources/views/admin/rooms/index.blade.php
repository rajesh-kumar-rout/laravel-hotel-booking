@extends("admin.base")

@section("head")
    <title>Rooms</title>
@endsection

@section("content")
<div class="card">
  <div class="card-header fw-bold text-primary">Rooms</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" style="min-width: 1400px">
        <thead>
          <tr>
            <th scope="col" width="8%">Room No</th>
            <th scope="col" width="15%">Name</th>
            <th scope="col" width="23%">Description</th>
            <th scope="col" width="10%">Beds</th>
            <th scope="col" width="10%">Image</th>
            <th scope="col" width="12%">Member</th>
            <th scope="col" width="12%">Updated</th>
            <th scope="col" width="10%">Actions</th>
          </tr>
        </thead>
        <tbody>
          @if (count($rooms) == 0)
              <tr>
                <td colspan="8" class="text-center">No Rooms Found</td>
              </tr>
          @endif
          @foreach ($rooms as $room)
              <tr>
                <td>{{ $room->room_no }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->description }}</td>
                <td>{{ $room->beds }}</td>
                <td>
                  <img src="/uploads/{{ $room->image_url }}" height="80" width="80" class="img-fluid">
                </td>
                <td>
                  <div>
                    <p class="mb-1">Children : {{ $room->children }}</p>
                    <p>Adults : {{ $room->adults }}</p>
                  </div>
                </td>
                <td>{{ date("d-m-Y", strtotime($room->updated_at)) }}</td>
                <td>
                <div class="d-flex gap-1">
                  <a href="{{ route("admin.rooms.edit", ["room" => $room->id]) }}" class="btn btn-warning btn-sm">Edit</a>

                  <form action="{{ route("admin.rooms.destroy", ["room" => $room->id]) }}" method="POST">
                      @csrf
                      @method("delete")

                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </div>
                </td>
              </tr>  
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection