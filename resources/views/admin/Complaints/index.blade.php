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
                        <h4>قائمة الشكاوي أو الاقتراحات</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>العنوان</th>
                                    <th>الوصف</th>
                                    <th>النوع</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['all_complaints'] as $complaint)
                                    <tr>
                                        {{-- <td>{{ $service->id }}</td> --}}
                                        <td>{{ $complaint->subject }}</td>
                                        <td>{{ Str::limit($complaint->description, 80) }}</td>
                                        <td>{{ $complaint->type === 'complaint' ? 'شكوى' : 'اقتراح' }}</td>
                                        <td class="action-column">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.complaints.show', $complaint->id) }}"
                                                    class="btn btn-info btn-sm">عرض</a>
                                                <form action="{{ route('admin.complaints.destroy', $complaint->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data['all_complaints']->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
