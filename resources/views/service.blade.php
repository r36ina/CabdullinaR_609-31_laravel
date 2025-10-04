<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Услуга</title>
</head>
<body>
<h2>{{$service ? "Список договоров, в которые входит услуга ".$service->name : "Неверное id услуги"}}</h2>
@if($service)
    <table border="1">
        <tr>
            <td>id</td>
            <td>Номер договора</td>
            <td>Дата заключения</td>
        </tr>
        @foreach($service->contracts as $contract)
            <tr>
                <td>{{$contract->pivot->id}}</td>
                <td>{{$contract->contract_number}}</td>
                <td>{{$contract->conclusion_date}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
