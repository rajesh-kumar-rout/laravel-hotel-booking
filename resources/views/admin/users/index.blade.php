@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <div class="card">
        <div class="card-header fw-bold text-primary">Customers</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" style="min-width: 1024px">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Created At</th>
                </tr>
              </thead>
              <tbody>
                @if (count($users) == 0)
                    <tr>
                        <td colspan="4" class="text-center">No Users Found</td>
                    </tr>
                @endif

                @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>


@endsection