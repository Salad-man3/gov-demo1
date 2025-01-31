@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>تفاصيل الخدمة <a href="{{ url('admin/services') }}"
                                class="btn btn-danger float-end">عودة</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name"> الاسم</label><br>
                            <p>{{ $service->name }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="description"> الوصف</label><br>
                            <p>{!! $service->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
