@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-4">
                    <h2>{{$medworker->first_name}} {{$medworker->last_name}}</h2>
                    <div class="fs-6">{{$medworker->job_title}}</div>
                    <p class="fs-5">{{$medworker->specialization}}</p>
                </div>
                <hr style="border: 2px solid #007bff; opacity: 1; width: 100px;
                margin: 10px auto; text-align: center;">
                <div class="text-center mb-3">
                    <i class="fa fa-envelope"></i>
                    {{$medworker->email}}
                </div>
            </div>
        </div>
    </div>
@endsection
