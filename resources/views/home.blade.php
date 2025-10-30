@extends('layout')
@section('content')
<div class="container">
    <h1 class="fw-bold mb-5">Профессиональная помощь вашим питомцам в Pet's Help</h1>
    <div class="row">
        <div class="col-6 col-md-3">
            <img src="{{asset('images/img5.jpg')}}" class="img-fluid rounded"
                 style="width: 100%; height: 300px; object-fit: cover;" alt="">
        </div>
        <div class="col-6 col-md-3">
            <img src="{{asset('images/img1.jpg')}}" class="img-fluid rounded"
                 style="width: 100%; height: 300px; object-fit: cover;" alt="">
        </div>
        <div class="col-6 col-md-3">
            <img src="{{asset('images/img6.jpg')}}" class="img-fluid rounded"
                 style="width: 100%; height: 300px; object-fit: cover;" alt="">
        </div>
        <div class="col-6 col-md-3">
            <img src="{{asset('images/img3.jpg')}}" class="img-fluid rounded"
                 style="width: 100%; height: 300px; object-fit: cover;" alt="">
        </div>
    </div>
</div>
@endsection
