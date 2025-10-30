<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">Pet's Help</a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                           href="{{url('services')}}">Наши Услуги</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{url('services')}}">Bce услуги</a></li>
                            </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('medworkers')}}">Врачи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('about')}}">О Нас</a>
                    </li>
                </ul>
                <div class="navbar-text text-white d-flex align-items-center gap-2 position-absolute start-50">
                    <i class="fa fa-phone" style="font-size:16px; color:white;"></i>
                    <div>+7 (495) 123-45-67</div>
                </div>
                @if(!Auth::user())
                    <form class="d-flex" method="post" action="{{url('auth')}}">
                        @csrf
                        <input class="form-control me-2" type="text" placeholder="Логин"
                               name="email" aria-label="Логин" value="{{old('email')}}"/>
                        <input class="form-control me-2" type="password" placeholder="Пароль"
                               name="password" aria-label="Пароль"/>
                        <button class="btn btn-outline-success" type="submit">Войти</button>
                    </form>
                @else
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="">
                                <i class="fa fa-user" style="font-size:20px;color:white;"></i>
                                {{Auth::user()->first_name}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('logout') }}">Выйти</a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>

