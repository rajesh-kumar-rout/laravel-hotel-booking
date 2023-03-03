@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <a class="btn btn-secondary mb-3" href="{{ route('admin.facilities.index') }}">Go Back</a>

    <div class="card">
        <div class="card-header fw-bold text-primary">Create New Facility</div>

        <form enctype="multipart/form-data" action="{{ route('admin.facilities.store') }}" class="card-body" method="POST" novalidate>
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection