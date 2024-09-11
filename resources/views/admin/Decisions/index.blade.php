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
                        <h4>قائمة القرارات <a href="{{ url('admin/decisions/create') }}" class="btn btn-primary float-end">إنشاء قرار</a></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>العنوان</th>
                                    <th>الوصف</th>
                                    <th>المسؤول</th>
                                    <th>تاريخ الإنشاء</th>
                                    <th>آخر تعديل</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['all_decisions'] as $decision)
                                    <tr>
                                        {{-- <td>{{ $decision->id }}</td> --}}
                                        <td>{{ $decision->title }}</td>
                                        <td>{{ Str::limit($decision->description, 100) }}</td>
                                        <td>{{ $decision->adminstrator }}</td>
                                        <td>{{ $decision->created_at->format('M d, Y H:i') }}</td>
                                        <td>{{ $decision->updated_at->format('M d, Y H:i') }}</td>
                                        <td class="admin-action-column">
                                            <a href="{{ route('admin.decisions.edit', $decision->id) }}"
                                                class="btn btn-success">تعديل</a>
                                            <a href="{{ route('admin.decisions.show', $decision->id) }}"
                                                class="btn btn-info">عرض</a>
                                                <form action="{{ route('admin.decisions.destroy', $decision->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$data['all_decisions']->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
