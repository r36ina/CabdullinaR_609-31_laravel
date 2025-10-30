@extends('layout')
@section('content')
    <div class="container">
    <div class="row">
        @foreach($services as $service)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card border-0 h-100 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">{{$service->name}}</h5>
                        <p class="card-text text-muted small">{{$service->description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-success fw-bold fs-6">{{$service->price}} р.</div>
                            <div class="text-muted">Каб. {{$service->cabinet}}</div>
                        </div>
                        <div class="fs-6 mt-2">{{$service->category->name}}</div>
                    </div>
                    @if(Auth::user() && Auth::user()->is_admin)
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="{{url('services/edit/' .$service->id)}}" class="btn btn-sm btn-outline-primary">Редактировать</a>
                            <a href="{{url('services/destroy/' .$service->id)}}" class="btn btn-sm btn-outline-danger">Удалить</a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    @if(Auth::user() && Auth::user()->is_admin)
        <div class="text-end mb-3">
            <a href="{{url('services/create')}}" class="btn btn-primary">Добавить услугу</a>
        </div>
    @endif
    <div class="d-flex justify-content-center gap-3">
        {{$services->links()}}
    </div>
</div>
@endsection
