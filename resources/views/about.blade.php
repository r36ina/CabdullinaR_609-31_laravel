@extends('layout')
@section('content')
    <div class="bg-light">
        <div class="container" style="padding: 20px 0">
            <h3 class="mb-4 text-center">Pet's Help - ваша надежная ветеринарная клиника</h3>
            <p style="font-size: 20px">Мы позаботились о том, чтобы ваши питомцы получали помощь самого высокого уровня.
                Для этого в клинике установлено новейшее оборудование: цифровой рентген,
                УЗИ-сканер с допплером, эндоскопы для щадящих исследований,
                аппараты для гастроскопии и безопасного ингаляционного наркоза.
                Важным преимуществом является собственная лаборатория — мы выполняем
                анализы быстро и точно, не теряя времени на отправку в сторонние организации.</p>
            <div class="d-flex align-items-center" style="justify-content: space-between;">
                <img src="{{'images/img8.png'}}" style="object-fit: cover; margin-right: 30px" alt="">
                <div class="col">
                    <h5 class="mb-3">Контакты:</h5>
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa fa-map-pin" style="font-size:20px;"></i>
                        <p class="mb-2 fs-5">Москва, ул. Вавилова, д. 33</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa fa-phone" style="font-size:20px;"></i>
                        <p class="mb-2 fs-5">Телефон: +7 (495) 123-45-67</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa fa-envelope" style="font-size:20px;"></i>
                        <p class="mb-2 fs-5">Email: petshelp@mail.ru</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa fa-clock-o" style="font-size:20px;"></i>
                        <p class="mb-0 fs-5">Работаем: 24/7 Круглосуточно</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
