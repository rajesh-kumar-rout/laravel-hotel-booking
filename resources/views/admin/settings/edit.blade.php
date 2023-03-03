@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <a class="btn btn-secondary mb-3 back-btn" href="{{ route('admin.settings.index') }}">Go Back</a>

    <div class="card">
        <div class="card-header fw-bold text-primary">Edit Setting</div>

        <form enctype="multipart/form-data" action="{{ route('admin.settings.update') }}" class="card-body" method="POST" novalidate>
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="about_us" class="form-label">About Us</label>
                <textarea class="form-control" name="about_us" id="about_us">{{ old('about_us', $setting->about_us) }}</textarea>
                @error('about_us')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="number" class="form-control" name="contact" id="contact" value="{{ old('contact', $setting->contact) }}">
                @error('contact')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $setting->email) }}">
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="facebook_url" class="form-label">Facebook URL</label>
                <input type="text" class="form-control" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $setting->facebook_url) }}">
                @error('facebook_url')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="instagram_url" class="form-label">Instagram URL</label>
                <input type="text" class="form-control" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $setting->instagram_url) }}">
                @error('instagram_url')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="twitter_url" class="form-label">Twitter URL</label>
                <input type="text" class="form-control" name="twitter_url" id="twitter_url" value="{{ old('twitter_url', $setting->twitter_url) }}">
                @error('twitter_url')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
@endsection