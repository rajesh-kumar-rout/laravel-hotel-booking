@extends("admin.master")

@section("head")
    <title>Edit Settings</title>
@endsection

@section("body")
    <div class="container my-4 px-3">
        <form action="{{ route("admin.setting.update") }}"  method="post" class="card mx-auto" style="max-width: 700px">
            <div class="card-header fw-bold text-primary">Edit Setting</div>

            <div class="card-body">
                @csrf
                @method("patch")

                <div class="mb-3">
                    <label for="aboutUs" class="form-label">About Us</label>
                    
                    <textarea class="form-control @error("about_us") is-invalid @enderror" name="about_us" id="aboutUs">{{ old("about_us", $setting->about_us) }}</textarea>
                    
                    @error("about_us")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    
                    <input type="number" class="form-control @error("contact") is-invalid @enderror" name="contact" id="contact" value="{{ old("contact", $setting->contact) }}">
                    
                    @error("contact")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="email" class="form-label">Email</label>
                    
                    <input type="email" class="form-control @error("email") is-invalid @enderror" name="email" id="email" value="{{ old("email", $setting->email) }}">
                    
                    @error("email")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection