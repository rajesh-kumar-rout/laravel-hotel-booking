@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <div class="d-flex justify-content-between">
        <a href="" class="btn btn-secondary btn-sm mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>
              Go Back
        </a>
    </div>
    <div class="card">
        <div class="card-header fw-bold text-primary">Edit Feature</div>
        <div class="card-body">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control">
            </div>
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
</div>
@endsection