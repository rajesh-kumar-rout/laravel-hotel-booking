@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <div class="text-end">
        <a href="{{ route('admin.create-slider') }}" class="btn btn-primary mb-3">Add New</a>
    </div>
    <div class="card">
        <div class="card-header fw-bold text-primary">Sliders</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" style="min-width: 1024px">
              <thead>
                <tr>
                  <th scope="col" width="10%">Image</th>
                  <th scope="col" width="25%">Title</th>
                  <th scope="col" width="40%">Description</th>
                  <th scope="col" width="15%">Last Updated</th>
                  <th scope="col" width="5%"></th>
                </tr>
              </thead>
              <tbody>
                @if (count($sliders) == 0)
                    <tr>
                      <td colspan="5" class="text-center">No Sliders Found</td>
                    </tr>
                @endif
                @foreach ($sliders as $slider)
                <tr>
                  <td>
                    <img src="{{ $slider->image_url }}" height="80" width="80" class="img-fluid">
                  </td>
                  <td>{{ $slider->title }}</td>
                  <td>{{ $slider->description }}</td>
                  <td>{{ $slider->updated_at }}</td>
                  <td>
                   <div class="d-flex gap-1">
                    <a href="" class="btn btn-warning btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg>
                    </a>
                    <form action="" method="post">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>
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
    function handleDeleteClick(event) {
        event.preventDefault()
        deleteModal.show()
    }
    function deleteSlider(event) {
        event.preventDefault()
        deleteModal.hide()
    }
  </script>
@endsection