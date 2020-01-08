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
        <h1>Insert Data</h1>
        
          @if(Session::has('success'))
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
          @endif
        
          
      </div>
      <div class="col-md-8">
        <h3>Insert all</h3>
      <form action="{{ route('insertAll.form' ) }}" method="GET">
          {{ csrf_field() }}
            <label for="id">select grade profile</label>
            <div class="">
                <select name="student_id" id="" class="form-control" >
                    @foreach ($gradeProfiles as $gradeprofile)
                      <option value="{{$gradeprofile->id}}">{{$gradeprofile->name}}</option>
                        
                    @endforeach
                </select>
            </div>    
                <div class="">
                    <label for="id">select grade absent</label>
                    <select name="grade_id" id="" class="form-control" >
                        @foreach ($Grade as $grade)
                          <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                            
                        @endforeach
                    </select>
                  </div>
            <div class="submit">
              <input type="submit" value="submit" class="btn btn-success btn-sm mt-3">
              {{-- <a href="{{ route('insertAll.form' ) }}" class="btn btn-success btn-sm mt-3" >insert all form</a>  --}}
            </div>    

              
            
        </form>
      </div>
    </div>
  </div>

  
</body>
</html>