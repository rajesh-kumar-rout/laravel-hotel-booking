@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <a class="btn btn-secondary mb-3 back-btn" href="{{ route('admin.facilities.index') }}">Go Back</a>

    <div class="card">
        <div class="card-header fw-bold text-primary">Edit Facility</div>

        <form enctype="multipart/form-data" action="{{ route('admin.facilities.update', ['facility' => $facility->id]) }}" class="card-body" method="POST" novalidate>
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $facility->name) }}">
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
@endsection