@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show decision details <a href="{{ url('decisions') }}"
                                class="btn btn-danger float-end">Back</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title"> Title</label>
                            <p>{{ $decision->title }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="description"> Description</label>
                            <p>{!! $decision->description !!}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="adminstrator"> Adminstrator</label>
                            <p>{{ $decision->adminstrator }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label> Created at</label>
                            <p>{{ $decision->created_at->format('M d, Y H:i')  }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label > Updated at</label>
                            <p>{{ $decision->updated_at->format('M d, Y H:i')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
