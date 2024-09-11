@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create a complaint </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('complaints.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name"> الموضوع</label>
                                <input type="text" name="subject" class="form-control">
                                <span class="text-danger"> @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="d-block">نوع الرسالة</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="typeComplaint"
                                        value="complaint" checked>
                                    <label class="form-check-label" for="typeComplaint">شكوى</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="typeRecommendation"
                                        value="recommendation">
                                    <label class="form-check-label" for="typeRecommendation">اقتراح</label>
                                </div>
                                <span class="text-danger">
                                    @error('type')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="description"> الوصف</label>
                                <textarea name="description" rows="4" class="form-control"></textarea>
                                <span class="text-danger"> @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="mobile_number">رقم الهاتف</label>
                                <input type="text" name="mobile_number" class="form-control">
                                <span class="text-danger"> @error('mobile_number')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">إرسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
