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
                        <h4>Decisions list <a href="{{ url('admin/decisions/create') }}" class="btn btn-primary float-end">Add
                            decision</a></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Adminstrator</th>
                                    <th>created at</th>
                                    <th>last update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['all_decisions'] as $decision)
                                    <tr>
                                        {{-- <td>{{ $decision->id }}</td> --}}
                                        <td>{{ $decision->title }}</td>
                                        <td>{{ $decision->description }}</td>
                                        <td>{{ $decision->adminstrator }}</td>
                                        <td>{{ $decision->created_at->format('M d, Y H:i') }}</td>
                                        <td>{{ $decision->updated_at->format('M d, Y H:i') }}</td>
                                        <td class="admin-action-column">
                                            <a href="{{ route('decisions.edit', $decision->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ route('decisions.show', $decision->id) }}"
                                                class="btn btn-info">Show</a>
                                                <form action="{{ route('decisions.destroy', $decision->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
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
