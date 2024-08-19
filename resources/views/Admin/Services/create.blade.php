@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create a service <a href="{{ url('admin/services') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('services.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name"> Name</label>
                                <input type="text" name="name" class="form-control">
                                <span class="text-danger"> @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="description"> Description</label>
                                <textarea name="description" rows="4" class="form-control"></textarea>
                                <span class="text-danger"> @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
