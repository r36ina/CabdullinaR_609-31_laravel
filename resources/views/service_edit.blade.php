<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Услуга</title>
    <style>.is-invalid {color: red;}</style>
</head>
<body>
<h2>Редактирование услуги</h2>
<form method="post" action="{{url('services/update/'  .$service->id)}}">
    @csrf
    <label>Название</label>
    <input type="text" name="name" value="@if(old('name')) {{old('name')}} @else{{$service->name}}@endif">
    @error('name')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Описание</label>
    <textarea name="description">@if(old('description')) {{old('description')}}
        @else{{$service->description}}@endif</textarea>
    @error('description')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Цена</label>
    <input type="text" name="price" value="@if(old('price')) {{old('price')}} @else{{$service->price}}@endif">
    @error('price')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Кабинет</label>
    <input type="text" name="cabinet" value="@if(old('cabinet')) {{old('cabinet')}} @else{{$service->cabinet}}@endif">
    @error('cabinet')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Категория:</label>
    <select name="category_id" value="{{old('category_id')}}">
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
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <input type="submit">
</form>
</body>
</html>
