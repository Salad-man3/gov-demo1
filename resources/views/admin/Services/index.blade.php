@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @session('status')
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ session('status') }}
                    </div>
                @endsession
                <div class="card">
                    <div class="card-header">
                        <h4>قائمة الخدمات <a href="{{ url('admin/services/create') }}" class="btn btn-primary float-end">إنشاء خدمة</a></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>الاسم</th>
                                    <th>الوصف</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['all_services'] as $service)
                                    <tr>
                                        {{-- <td>{{ $service->id }}</td> --}}
                                        <td>{{ $service->name }}</td>
                                        <td>{{ Str::limit($service->description, 100) }}</td>
                                        <td class="admin-action-column">
                                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                                class="btn btn-success">تعديل</a>
                                            <a href="{{ route('admin.services.show', $service->id) }}"
                                                class="btn btn-info">عرض</a>
                                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$data['all_services']->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
