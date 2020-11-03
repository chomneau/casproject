<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="{{ route('download.pdf', ['id'=>$items->id, 'download'=>'pdf']) }}">download</a>
   
        {{-- @foreach ($items as $key=>$item) --}}
            
        
        <ul>
            {{-- <li>{{ $key+1 }}</li> --}}
            <li> {{ $items->id }}</li>
            <li> {{ $items->first_name }}</li>
            <li> {{ $items->last_name }}</li>
        
        </ul>
        {{-- @endforeach --}}
    
</body>
</html>

