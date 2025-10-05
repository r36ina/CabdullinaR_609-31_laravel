<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Питомцы</title>
</head>
<body>
<h2>Список питомцев клиентов</h2>
<table border="1">
    <thead>
        <td>Медкнижка</td>
        <td>Клиент</td>
        <td>Порода</td>
        <td>Кличка</td>
        <td>Дата рождения</td>
        <td>Пол</td>
    </thead>
    @foreach($pets as $pet)
        <tr>
            <td>{{$pet->med_book}}</td>
            <td>{{$pet->user->id}}</td>
            <td>{{$pet->breed}}</td>
            <td>{{$pet->nickname}}</td>
            <td>{{$pet->date_of_birth}}</td>
            <td>{{$pet->gender}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
