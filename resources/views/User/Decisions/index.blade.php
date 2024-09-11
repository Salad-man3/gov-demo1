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
                        <h4>القرارات</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>العنوان</th>
                                    <th>الوصف</th>
                                    {{-- <th>المسؤول</th> --}}
                                    <th>تاريخ الإنشاء</th>
                                    <th>آخر تعديل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['all_decisions'] as $decision)
                                    <tr>
                                        {{-- <td>{{ $decision->id }}</td> --}}
                                        <td>{{ $decision->title }}</td>
                                        <td>{{ Str::limit($decision->description, 100) }}</td>
                                        {{-- <td>{{ $decision->adminstrator }}</td> --}}
                                        <td>{{ $decision->created_at->format('M d, Y H:i') }}</td>
                                        <td>{{ $decision->updated_at->format('M d, Y H:i') }}</td>
                                        <td class="action-column">
                                            <a href="{{ route('decisions.show', $decision->id) }}"
                                                class="btn btn-info">عرض</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data['all_decisions']->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
