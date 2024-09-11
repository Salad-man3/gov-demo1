@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>تعديل قرار <a href="{{ url('admin/decisions') }}" class="btn btn-danger float-end">عودة</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.decisions.update', $decision->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title"> العنوان</label>
                                <input type="text" name="title" class="form-control" value="{{ $decision->title }}">
                                <span class="text-danger"> @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="description"> الوصف</label>
                                <textarea name="description" rows="4" class="form-control">{!! $decision->description !!}</textarea>
                                <span class="text-danger"> @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="adminstrator"> المسؤول</label>
                                <input type="text" name="adminstrator" class="form-control" value="{{ $decision->adminstrator }}">
                                <span class="text-danger"> @error('adminstrator')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">تحديث</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
