@extends('base')

@section('content')
    <div class="container my-4 px-3">
        <form class="card mx-auto" style="max-width: 700px" action="{{ route('auth.edit-account') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="card-header fw-bold text-primary">Edit Account</div>

            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', auth()->user()->name) }}">
                    @error('name')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email', auth()->user()->email) }}">
                    @error('email')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
@endsection