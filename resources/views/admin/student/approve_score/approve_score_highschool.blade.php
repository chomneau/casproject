<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CAS APPROVE SCORE</title>
</head>
<body>
     <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-12">
            <h4>SCORE APPROVAL FOR <span class="text-success text-uppercase">{{ $grade_profile_id->name }}</span> 
            
            <span class="pull-right mb-2" ><a href="{{ route('student.byGrade') }}" class="btn btn-success"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Student by Grade</a></span> 
            </h4>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>

                    <th scope="col">student name</th>
                    <th scope="col" width="30%">subject</th>
                    <th scope="col">quarter_1</th>
                    
                    <th scope="col">quarter_2</th>
                    
                    <th scope="col">quarter_3</th>
                    
                    <th scope="col">quarter_4</th>
                    
                   
                    </tr>
                </thead>
                <tbody>
                @foreach($studentScore as $student)
                    <tr>
                    <th scope="row">
                        {{ $loop->iteration }}                   
                    </th>

                    <td>{{ $student->StudentProfile->first_name }}, {{ $student->StudentProfile->last_name }}</td>
                    <td>{{ $student->Subject->name }}</td>
                    <td>
                        @if($student->quarter_1 !== null)
                            @if($student->approve_score_q1==1)
                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>    
                            @endif
                            {{ $student->quarter_1 }}
                        @endif    
                    </td>
                    
                        
                    
                    <td>
                    @if($student->quarter_2 !== null)
                        
                        @if($student->approve_score_q2==1)
                            <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                        @else
                            <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>   
                        @endif

                        {{ $student->quarter_2 }}
                    
                    @endif    
                    </td>
                    
                    <td>
                        @if($student->quarter_3 !== null)
                            {{ $student->quarter_3 }} 
                            @if($student->approve_score_q3==1)
                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>   
                            @endif
                        @endif    
                    </td>
                    
                    <td>
                        @if($student->quarter_4 !== null)
                            
                            @if($student->approve_score_q4==1)
                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>   
                            @endif

                            {{ $student->quarter_4 }} 
                        @endif    
                    </td>
                    
                    
                    </tr>
                @endforeach    
                    
                </tbody>
                </table>
            </div>
        </div>
     
     </div>   
</body>
</html>