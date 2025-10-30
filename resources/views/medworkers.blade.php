@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($medworkers as $medworker)
                <div class="col-lg-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <i class="fa fa-user-md fa-3x text-primary"></i>
                                    <div class="mb-1 fs-4">{{$medworker->first_name}} {{$medworker->last_name}}</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3 fs-6">{{$medworker->job_title}}</div>
                                    <a href="{{url('medworker/' .$medworker->id)}}" class="btn btn-outline-secondary">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
