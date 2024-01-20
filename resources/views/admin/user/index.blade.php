@extends("admin.master")

@section("head")
    <title>Customers</title>
@endsection

@section("body")
  <div class="card">
    <div class="card-header fw-bold text-primary">Customers</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered mb-0" style="min-width: 1024px">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Full Name</th>
              <th scope="col">Email</th>
              <th scope="col">Created At</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ date("d-m-Y", strtotime($user->created_at)) }}</td>
                </tr>
            @empty 
              <tr>
                <td colspan="4" class="text-center">No Users Found</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection