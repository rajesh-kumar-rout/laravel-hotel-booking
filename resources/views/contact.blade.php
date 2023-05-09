@extends("base")

@section("head")
    <title>Contact Us</title>
@endsection

@section("content")
<form class="card mx-auto" style="max-width: 700px" onsubmit="alert('This functionality is not implemented'); return false;" method="post">
    <div class="card-header fw-bold text-primary">Contact Us</div>
    <div class="card-body">
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" id="fullName">
        </div>
        <div class="mb-3">
            <label for="fullName" class="form-label">Email</label>
            <input type="text" class="form-control" name="full_name" id="fullName">
        </div>
        <div class="mb-3">
            <label for="fullName" class="form-label">Subject</label>
            <input type="text" class="form-control" name="full_name" id="fullName">
        </div>
        <div class="mb-3">
            <label for="fullName" class="form-label">Message</label>
            <textarea class="form-control" name="full_name" id="fullName"></textarea>
        </div>
        <button class="btn btn-primary">Send Message</button>
    </div>
</form>
@endsection