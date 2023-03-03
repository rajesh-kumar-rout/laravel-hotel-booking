@extends('admin.base')

@section('content')
<div class="container my-4 px-3">
    <div class="text-end">
        <a href="{{ route('admin.settings.edit') }}" class="btn btn-primary mb-3">Edit Setting</a>
    </div>

    <div class="card">
        <div class="card-header fw-bold text-primary">Setting</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" style="min-width: 600px">
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
                <tr>
                    <td>Facebook URL</td>
                    <td>{{ $setting->facebook_url }}</td>
                </tr>
                <tr>
                    <td>Instagram URL</td>
                    <td>{{ $setting->instagram_url }}</td>
                </tr>
                <tr>
                    <td>Twitter URL</td>
                    <td>{{ $setting->twitter_url }}</td>
                </tr>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection