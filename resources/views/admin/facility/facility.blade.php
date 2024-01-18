@extends("admin.master")

@section("head")
    <title>{{ isset($facility) ? "Edit Facility" : "Create Facility" }}</title>
@endsection

@section("body")
    <div class="card mx-auto" style="max-width: 500px">
        <div class="card-header fw-bold text-primary">{{isset($facility) ? "Edit Facility" : "Create Facility"}}</div>

        <form action="{{ isset($facility) ? route("admin.facility.update", ["facility" => $facility->id]) : route('admin.facility.store') }}" class="card-body" method="post">
            @csrf
            @method(isset($facility) ? 'PATCH' : 'POST')

            <div class="mb-3">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old("name", $facility->name ?? null) }}">
                
                @error("name")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection