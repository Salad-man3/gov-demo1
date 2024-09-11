@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Contact Us</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">General Contact Information</h5>
            <p>Phone: +1 (555) 123-4567</p>
            <p>Email: contact@example.com</p>
        </div>
    </div>

    @if(Auth::user() instanceof App\Models\Admin)
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Developer Team Contact (Admin Only)</h5>
            <p>Dev Team Phone: +1 (555) 987-6543</p>
            <p>Dev Team Email: devteam@example.com</p>
        </div>
    </div>
    @endif
</div>
@endsection

