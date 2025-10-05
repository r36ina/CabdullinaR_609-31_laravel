<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Питомцы</title>
</head>
<body>
<h2>{{$user ? "Список питомцев клиента " .$user->first_name  ." (" .$user->phone .")" : "Неверный id клиента"}}</h2>
@if($user)
    <table border="1">
        <thead>
            <td>Медкнижка</td>
            <td>Порода</td>
            <td>Кличка</td>
            <td>Дата рождения</td>
            <td>Пол</td>
        </thead>
        @foreach($user->pets as $pet)
            <tr>
                <td>{{$pet->med_book}}</td>
                <td>{{$pet->breed}}</td>
                <td>{{$pet->nickname}}</td>
                <td>{{$pet->date_of_birth}}</td>
                <td>{{$pet->gender}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
