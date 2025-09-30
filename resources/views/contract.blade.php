<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Договор</title>
</head>
<body>
<h2>{{$contract ? "Список услуг по договору № " .$contract->contract_number : "Неверный номер договора"}}</h2>
@if($contract)
    <table border="1">
        <tr>
            <td>Название услуги</td>
            <td>Описание</td>
            <td>Цена</td>
        </tr>
        @foreach($contract->services as $service)
            <tr>
                <td>{{$service->name}}</td>
                <td>{{$service->description}}</td>
                <td>{{$service->pivot->contract_price}}</td>
            </tr>
        @endforeach
    </table>
    <h2>{{"Итого: ".$total->total}}</h2>
@endif
</body>
</html>
