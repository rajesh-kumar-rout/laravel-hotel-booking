@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <div class="text-end">
        <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary mb-3">Add New</a>
    </div>
    
    <div class="card">
        <div class="card-header fw-bold text-primary">Rooms</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" style="min-width: 1024px">
              <thead>
                <tr>
                  <th scope="col">Room No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Beds</th>
                  <th scope="col">Image</th>
                  <th scope="col">Member Allowed</th>
                  <th scope="col">Last Updated</th>
                  <th scope="col"></th>
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
                      <p>Children : {{ $room->children }}</p>
                      <p>Adults : {{ $room->adults }}</p>
                    </div>
                  </td>
                  <td>{{ $room->updated_at }}</td>
                  <td>
                   <div class="d-flex gap-1">
                    <a href="{{ route('admin.rooms.edit', ['room' => $room->id]) }}" class="btn btn-warning btn-sm">
                        <span class="material-icons">edit</span>
                    </a>

                    <form action="{{ route('admin.rooms.destroy', ['room' => $room->id]) }}" onsubmit="handleDeleteClick(event)" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            <span class="material-icons">delete</span>
                        </button>
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
</div>

<div class="modal" tabindex="-1" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Are you sure you want to delete ?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>This opration can not be reversed.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="deleteSlider(event)">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const deleteModal = new bootstrap.Modal('#deleteModal', {})

    let deleteForm = {};

    function handleDeleteClick(event) {
        event.preventDefault()

        deleteForm = event.target

        deleteModal.show()
    }

    function deleteSlider(event) {
        event.preventDefault()
        deleteModal.hide()

        deleteForm.submit()
    }
  </script>
@endsection