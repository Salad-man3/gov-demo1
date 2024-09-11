@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>عرض تفاصيل القرار <a href="{{ url('admin/decisions') }}"
                                class="btn btn-danger float-end">عودة</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title"> العنوان</label><br>
                            <p>{{ $decision->title }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="description"> الوصف</label><br>
                            <p>{!! $decision->description !!}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="adminstrator"> المسؤول</label><br>
                            <p>{{ $decision->adminstrator }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label>تاريخ الإنشاء</label><br>
                            <p>{{ $decision->created_at->format('M d, Y H:i')  }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label > آخر تعديل</label><br>
                            <p>{{ $decision->updated_at->format('M d, Y H:i')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
