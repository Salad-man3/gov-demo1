@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">تعديل الخبر</h4>
                    <a href="{{ url('admin/news') }}" class="btn btn-light bg-primary text-white">عودة</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">العنوان</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">الوصف</label>
                            <textarea name="description" id="description" rows="6" class="form-control">{{ $news->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">الصورة</label>
                            <input type="file" name="photo" id="photo" class="form-control">
                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if($news->photo)
                            <div class="mb-3">
                                <label class="form-label">الصورة الحالية</label>
                                <img src="{{ asset('storage/' . $news->photo) }}" alt="Current Photo" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        @endif
                            <button type="submit" class="btn btn-primary">تحديث الخبر</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
