<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h1>Insert All Data</h1>
        
          @if(Session::has('success'))
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
          @endif
        
          <form action="{{ route('insertAll.submit', ['grade_id'=>$grade_id->id]) }}"  method="POST">
             {{ csrf_field() }}

             
          
          <div class="">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>#</th>
                    <th>ID</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>grade_profile</th>
                    <th>grade for absent</th>
                    
                  </tr>
                </thead>

                Total : {{ $students->count() }} students
                
                
              @foreach ($students as $key => $student)
              <td>
                  <input type="hidden" name="student_id[]" value="{{ $student->id }}">
              </td>
              <td>{{$key+1}}</td>
                <td>{{ $student->id }}</td>
                <td>{{$student->first_name}}</td>
                <td>{{$student->last_name}}</td>
                <td>{{$student->gradeProfile->name}}</td>
                <td>{{$grade_id->grade_name}}</td>
                
              </tr>
              
              @endforeach
              
            </table>

          </div>
          
          <input type="submit" value="Insert all" class="btn btn-success btn-sm mb-3">
          </form>        
      </div>
    </div>
  </div>

  
</body>
</html>