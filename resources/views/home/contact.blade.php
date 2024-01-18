@extends("master")

@section("head")
    <title>Contact Us</title>
@endsection

@section("body")
    <form class="card mx-auto" style="max-width: 700px" onsubmit="alert('This functionality is not implemented'); return false;" method="post">
        <div class="card-header fw-bold text-primary">Contact Us</div>
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message"></textarea>
            </div>
            <button class="btn btn-primary">Send Message</button>
        </div>
    </form>
@endsection