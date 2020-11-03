<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <table>
            <tr>
            {{-- <li>{{ $key+1 }}</li> --}}
            <td> {{ $items->id }}</td>
            <td> {{ $items->first_name }}</td>
            <td> {{ $items->last_name }}</td>
            </tr>
        <tr><td>{{ $hello }}</td></tr>
        </table>
    </ul>
</body>
</html>