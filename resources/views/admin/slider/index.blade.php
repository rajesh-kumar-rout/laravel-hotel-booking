@extends("admin.master")

@section("head")
    <title>Sliders</title>
@endsection

@section("body")
  <div class="card">
    <div class="card-header fw-bold text-primary">Sliders</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered mb-0" style="min-width: 1024px">
          <thead>
            <tr>
              <th scope="col" width="10%">Image</th>
              <th scope="col" width="25%">Title</th>
              <th scope="col" width="40%">Description</th>
              <th scope="col" width="15%">Last Updated</th>
              <th scope="col" width="5%">Actions</th>
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
                      <img src="/uploads/{{ $slider->image_url }}" height="80" width="80" class="img-thumbnail">
                    </td>
                  <td>{{ $slider->title ??  "NA" }}</td>
                  <td>{{ $slider->description ?? "NA" }}</td>
                  <td>{{ date("d-m-Y", strtotime($slider->updated_at)) }}</td>
                  <td>
                  <div class="d-flex gap-1">
                    <a href="{{ route("admin.slider.edit", ["slider" => $slider->id]) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route("admin.slider.destroy", ["slider" => $slider->id]) }}" method="post">
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