@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mb-5">أعضاء المجلس</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @for ($i = 1; $i <= 20; $i++)
                <div class="col">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="صورة العضو {{ $i }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ fake('ar_SA')->name() }}</h5>
                            {{-- <p class="card-text">{{ fake('ar_SA')->jobTitle() }}</p> --}}
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">عضو منذ {{ fake('ar_SA')->date('Y') }}</small>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
