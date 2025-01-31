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
                        <h4>الخدمات</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>العنوان</th>
                                    <th>الوصف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['all_services'] as $service)
                                    <tr>
                                        {{-- <td>{{ $service->id }}</td> --}}
                                        <td>{{ $service->name }}</td>
                                        <td>{{ Str::limit($service->description, 100) }}</td>
                                        <td class="action-column">
                                            <a href="{{ route('services.show', $service->id) }}"
                                                class="btn btn-info">عرض</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data['all_services']->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
