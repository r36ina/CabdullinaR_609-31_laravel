<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Услуги</title>
</head>
<body>
<h2>Список предоставляемых услуг</h2>
<table border="1">
    <thead>
    <td>Название</td>
    <td>Описание</td>
    <td>Цена</td>
    <td>Кабинет</td>
    <td>Категория</td>
    <td>Действия</td>
    </thead>
    @foreach($services as $service)
        <tr>
            <td>{{$service->name}}</td>
            <td>{{$service->description}}</td>
            <td>{{$service->price}}</td>
            <td>{{$service->cabinet}}</td>
            <td>{{$service->category->name}}</td>
            <td>
                <a href="{{url('services/edit/' .$service->id)}}">Редактировать</a>
                <a href="{{url('services/destroy/' .$service->id)}}">Удалить</a>
            </td>
        </tr>
    @endforeach
</table>
{{$services->links('vendor.pagination.default')}}
<a href="{{url('services/create')}}" style="text-decoration: none; ">Добавить услугу</a>
</body>
</html>
