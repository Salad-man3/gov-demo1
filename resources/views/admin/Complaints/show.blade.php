@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>عرض تفاصيل الرسالة <a href="{{ url('admin/complaints') }}"
                                class="btn btn-danger float-end">عودة</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="subject"> العنوان</label><br>
                            <p>{{ $complaint->subject }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="description"> الوصف</label><br>
                            <p>{!! $complaint->description !!}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="type"> النوع</label><br>
                            <p>{{ $complaint->type === 'complaint' ? 'شكوى' : 'اقتراح' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
