<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>
<h2>Список клиентов</h2>
<table border="1">
    <thead>
        <td>id</td>
        <td>Имя</td>
        <td>Фамилия</td>
        <td>Почта</td>
        <td>Номер телефона</td>
        <td>Паспорт</td>
    </thead>
@foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->first_name}}</td>
        <td>{{$user->last_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->passport_num}}</td>
    </tr>
@endforeach
</table>
</body>
</html>
