@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="post" action={{url('services')}}>
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" aria-describedby="nameHelp" value="{{old('name')}}">
                            <div id="nameHelp" class="form-text">Введите название услуги</div>
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea id="description" name="description" aria-describedby="descriptionHelp"
                                      class="form-control @error('description') is-invalid @enderror" {{old('description')}}></textarea>
                            <div id="descriptionHelp" class="form-text">Введите описание услуги</div>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Цена</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                   id="price" name="price" aria-describedby="priceHelp" value="{{old('price')}}">
                            <div id="priceHelp" class="form-text">Введите стоимость услуги в рублях</div>
                            @error('price')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cabinet" class="form-label">Кабинет</label>
                            <input type="text" class="form-control @error('cabinet') is-invalid @enderror"
                                   id="cabinet" name="cabinet" aria-describedby="cabinetHelp" value="{{old('cabinet')}}">
                            <div id="cabinetHelp" class="form-text">Введите кабинет, где оказывается услуга</div>
                            @error('cabinet')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Категория:</label>
                            <select class="form-select" id="category" name="category_id"
                                    aria-describedby="categoryHelp" value="{{old('category_id')}}">
                                <option style="">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if(old('category_id') == $category->id) selected
                                        @endif>{{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            <div id="categoryHelp" class="form-text">Выберите категорию услуги</div>
                            @error('category_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary w-50">Добавить</button>
                            <a href="{{url('services')}}" class="btn btn-primary w-50">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
