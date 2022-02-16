<!DOCTYPE html>
<html>
<head>
    <title>Новое сообщение</title>
</head>
<body>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>тема</th>
        <th>сообщение</th>
        <th>имя клиента</th>
        <th>почта клиента</th>
        <th>файл</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$details['id']}}</td>
            <td>{{$details['subject']}}</td>
            <td>{{$details['text']}}</td>
            <td>{{$details['name']}}</td>
            <td>{{$details['email']}}</td>
            <td>
                @if($details['file_url'])
                    <a href="{{$details['file_url']}}">файл</a>
                @else
                    -
                @endif
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>
