@extends("admin.master")

@section("head")
    <title>Settings</title>
@endsection

@section("body")
    <div class="card">
        <div class="card-header fw-bold text-primary">Settings</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" style="min-width: 600px">
                    <tr>
                        <td>About Us</td>
                        <td>{{ $setting->about_us }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $setting->email }}</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>{{ $setting->contact }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection