<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Питомец</title>
</head>
<body>
<h2>{{$pet ? "Информация о владельце питомца - " .$pet->nickname ." (" .$pet->med_book .")" : "Неверный id питомца"}}</h2>
@if($pet)
    <table border="1">
        <thead>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Почта</td>
            <td>Номер телефона</td>
            <td>Паспорт</td>
        </thead>
        <tbody>
            <tr>
                <td>{{$pet->user->first_name}}</td>
                <td>{{$pet->user->last_name}}</td>
                <td>{{$pet->user->email}}</td>
                <td>{{$pet->user->phone}}</td>
                <td>{{$pet->user->passport_num}}</td>
            </tr>
        </tbody>
    </table>
@endif
</body>
</html>

