@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-4">
        <div class="card shadow-lg">
            <div class="card-body">
                <form method="post" action="{{url('services/update/'  .$service->id)}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" aria-describedby="nameHelp" value="@if(old('name')) {{old('name')}}
                               @else{{$service->name}}@endif">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea id="description" name="description" aria-describedby="descriptionHelp"
                                  class="form-control @error('description') is-invalid @enderror">@if(old('description')) {{old('description')}}
                            @else{{$service->description}}@endif</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Цена</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                               id="price" name="price" aria-describedby="priceHelp" value="@if(old('price')) {{old('price')}}
                               @else{{$service->price}}@endif">
                        @error('price')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cabinet" class="form-label">Кабинет</label>
                        <input type="text" class="form-control @error('cabinet') is-invalid @enderror"
                               id="cabinet" name="cabinet" aria-describedby="cabinetHelp" value="@if(old('cabinet')) {{old('cabinet')}}
                               @else{{$service->cabinet}}@endif">
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
                                        @if(old('category_id'))
                                            @if(old('category_id') == $category->id) selected @endif
                                        @else
                                            @if($service->category_id == $category->id) selected @endif
                                    @endif>{{$category->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary w-50">Сохранить</button>
                        <a href="{{url('services')}}" class="btn btn-primary w-50">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
