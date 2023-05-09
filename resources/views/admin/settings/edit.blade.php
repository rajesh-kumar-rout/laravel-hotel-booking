@extends("admin.base")

@section("head")
    <title>Edit Settings</title>
@endsection

@section("content")
<div class="container my-4 px-3">
    <div class="card mx-auto" style="max-width: 700px">
        <div class="card-header fw-bold text-primary">Edit Setting</div>

        <form action="{{ route("admin.settings.update") }}" class="card-body" method="post">
            @csrf
            @method("patch")

            <div class="mb-3">
                <label for="about_us" class="form-label">About Us</label>
                
                <textarea class="form-control {{ $errors->has("about_us") ? "is-invalid" : "" }}" name="about_us" id="about_us">{{ old("about_us", $setting->about_us) }}</textarea>
                
                @error("about_us")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                
                <input type="number" class="form-control {{ $errors->has("contact") ? "is-invalid" : "" }}" name="contact" id="contact" value="{{ old("contact", $setting->contact) }}">
                
                @error("contact")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                
                <input type="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" name="email" id="email" value="{{ old("email", $setting->email) }}">
                
                @error("email")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection