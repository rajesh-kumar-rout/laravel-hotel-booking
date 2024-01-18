@extends("admin.master")

@section("head")
    <title>Facilities</title>
@endsection

@section("body")
  <div class="card">
    <div class="card-header fw-bold text-primary">Facilities</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered mb-0" style="min-width: 700px">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Last Updated</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($facilities as $facility)
              <tr>
                <td>{{ $facility->name }}</td>
                <td>{{ date("d-m-Y", strtotime($facility->updated_at)) }}</td>
                <td>
                <div class="d-flex gap-1">
                  <a href="{{ route("admin.facility.edit", ["facility" => $facility->id]) }}" class="btn btn-warning btn-sm">Edit</a>

                  <form action="{{ route("admin.facility.destroy", ["facility" => $facility->id]) }}" method="post">
                      @csrf
                      @method("delete")

                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </div>
                </td>
              </tr>  
            @empty 
              <tr>
                <td colspan="3" class="text-center">No facilities Found</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection