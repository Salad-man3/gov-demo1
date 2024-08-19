@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show service details <a href="{{ url('/services') }}"
                                class="btn btn-danger float-end">Back</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name"> Name</label>
                            <p>{{ $service->name }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="description"> Description</label>
                            <p>{!! $service->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
