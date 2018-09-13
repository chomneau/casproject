<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cas.edu.kh</title>
	<!-- <link rel="stylesheet" href="css.css"> -->

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

	<!-- awesom font -->

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


	<style>
		body {
            background: rgb(204,204,204); 
            }
            page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
            }
            page[size="A4"] {  
            width: 21cm;
            height: auto; 
            }
            page[size="A4"][layout="portrait"] {
            width: 29.7cm;
            height: auto;  
            }

            @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        }
	</style>

</head>
<body class="d-flex flex-column" style="min-height: 100vh">
	<main class="flex-fill">

<page size="A4">

	<div class="container">
		<div class="row" >
			<!-- school info -->
				<div class="container" style="margin-top: 20px">
					<div class="row">
						<div class="col-sm-6 col-md-4" style="padding-left: 20px"  >
	                        <img src="{{ asset('uploads/avatar/logo.png')}}" alt="" class="img-rounded img-responsive" width="150" height="150"/>
	                    </div>
						


	                    <div class="col-sm-6 col-md-8 text-right " style="margin-top: 10px; padding-right: 30px" >
	                        <h4>CAMBODIA ADVENTIST SCHOOL</h4>
	                        <h5>TRANSCRIPT OF SECONDARY ACADEMI</h5>
	                        <h6>INTERNATIONAL PROGRAM</h6>
						</div>

					</div>
					<div class="row" style="margin-top: -25px">
						<div class="col-sm-6 col-md-12 text-right" >
							<small><cite title="San Francisco, USA">#419, St. Rada, Phum Tum Nub,<br> Sangkat Phnom Penh Thmey, Khan Sensok,<br> Phnom Penh, Cambodia <i class="glyphicon glyphicon-map-marker">
			                   </i></cite></small>
			                   <p>
			                   	<i class="glyphicon glyphicon-gift"></i>Tel : (855)12 946 041
			                   	<br>
			                       <i class="glyphicon glyphicon-envelope"></i>Email : info@cas.edu.kh
			                       <br />
			                       <i class="glyphicon glyphicon-globe"></i>
			                       <a href="http://cas.edu.kh">website : www.cas.edu.kh
			                       </a>
			                       <br />
			                   </p>

						</div>
					</div>
					
					<div class="row" style="margin-top: -7em;">

						<div class="col-sm-6 col-md-6" style="margin-left: -35px">
							<ul style="list-style: none;">
								<li>Name : <strong>{{ $student->last_name}} 
									{{ $student->first_name}}</strong>
								</li>
								<li>Progressive Book ID : 
									<strong>{{$student->progressive_book_id}}</strong>
								</li>
                                <li>Date of Birth : <strong>{{ $student->date_of_birth }}</strong></li>
                                <li>Admission Date: <strong>{{ $student->created_at->format('M d, Y') }}</strong></li>
                                <li>Completion Date: Jan 16, 2018</li>

							</ul>
						</div>	
          
	                    <!-- Split button -->
	               
                    </div>
					

				</div>
       
                    


			<!-- student info -->

			</div>

			<div class="row">

			<div class="col-md-6 ">

				
			<table class="table table-sm">
				<!--Table head-->
				<h6><span class="badge badge-primary badge-pill">1</span> First Semester : 

				@foreach($semester_1 as $score_s1)

					@if ($loop->first) 
					
						{{ $score_s1->created_at->format('Y') }} - 
						{{ $score_s1->created_at->format('Y')+1 }} 

					@endif

				@endforeach


				</h6>
			    <thead>
			        <tr>
			            
			            <th>Subject</th>
			            <th>CRED</th>
			            <th>GRD</th>			            
			            <th>PTS</th>
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>

			    	@if(count($semester_1))
				    	@foreach($semester_1 as $score_s1)

					    	@foreach($grade as $grades)

						    	@if($score_s1->grade_id == $grades->id)

							    	
							        <tr>
							            
							            <td style="font-size: 12px; font-weight: bold">{{$score_s1->subject->name}}</td>
							            <td style="font-size: 12px; font-weight: bold">{{ $score_s1->subject->credit}}</td>
							            <td style="font-size: 12px; font-weight: bold"> 

							            	{{ $score_s1->gpa_quarter_1 }}
							            

							            </td>
							            <td style="font-size: 12px; font-weight: bold">
											{{ $score_s1->pts_1 }}
											
							            </td>

							        </tr>
							        
							        
									
						        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif

			        <tr>
						<th style="font-size: 12px; font-weight: bold">SEMESTER CREDIT</th>
						<th style="font-size: 12px; font-weight: bold">{{ $credit }}</th>
						<th style="font-size: 12px; font-weight: bold"> SEMESTER GPA</th>
						<th style="font-size: 12px; font-weight: bold">
							{{ number_format($sum_pts_1/$credit, 2, '.', '') }}

							
						</th>
					</tr>

			        

			        
			    </tbody>
			    <!--Table body-->

			</table>
			<!--Table-->



			
		</div>


		<div class="col-md-6 ">

				
			<table class="table table-sm">
				<!--Table head-->
				<h6><span class="badge badge-primary badge-pill">2</span> Second Semester : 
				
				@foreach($semester_1 as $score_s1)

					@if ($loop->first) 
					
						{{ $score_s1->created_at->format('Y') }} - 
						{{ $score_s1->created_at->format('Y')+1 }} 

					@endif

				@endforeach

				</h6>
			    <thead>
			        <tr>
			            
			            <th>Subject</th>
			            <th>CRED</th>
			            <th>GRD</th>			            
			            <th>PTS</th>
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>
			        @if(count($semester_1))
				    	@foreach($semester_1 as $score_s1)

					    	@foreach($grade as $grades)

						    	@if($score_s1->grade_id == $grades->id)

							    	
							        <tr>
							            
							            <td style="font-size: 12px; font-weight: bold">{{$score_s1->subject->name}}</td>
							            <td style="font-size: 12px; font-weight: bold">{{ $score_s1->subject->credit}}</td>
							            <td style="font-size: 12px; font-weight: bold" > 

							            	{{ $score_s1->gpa_quarter_2 }}
							            

							            </td>
							            <td style="font-size: 12px; font-weight: bold" >
											{{ $score_s1->pts_2 }}
											
							            </td>

							            

							        </tr>
							        
									
						        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif


			        <tr>
						<th style="font-size: 12px; font-weight: bold">SEMESTER CREDIT</th>
						<th style="font-size: 12px; font-weight: bold">

							{{ $credit }}

						</th>



						<th style="font-size: 12px; font-weight: bold">SEMESTER GPA</th>
						<th style="font-size: 12px; font-weight: bold">
						{{ number_format($sum_pts_2/$credit, 2, '.', '') }}</th>

						
					</tr>
			    </tbody>
			    <!--Table body-->

			</table>
			<!--Table-->



			</div>
		</div>

<div class="row mt-4">
		<div class="col-md-1"></div>
		<div class="col-md-7 border border-secondary" >
			<table class="table table-sm" style="font-size: 10px ">
				<thead>
			        <tr>			            
			            Grading Equivalence and Symbols Used
			        </tr>
			    </thead>
				<tbody>
					<tr>
						<td><b>Excellent</b></td>
						<td>A</td>
						<td>4.00</td>
						<td>93-100%</td>
						<td>A-</td>
						<td>3.70</td>
						<td>90-92%</td>
						<td></td>
					</tr>
					<tr>
						<td><b>Good</b></td>
						<td>B+</td>
						<td>3.30</td>
						<td>87-89%</td>

						<td>B</td>
						<td>3.00</td>
						<td>83-86%</td>

						<td>B-</td>
						<td>2.70</td>
						<td>80-82%</td>
					</tr>
					<tr>
						<td><b>Satisfactory</b></td>
						<td>C+</td>
						<td>2.30</td>
						<td>77-79%</td>

						<td>C</td>
						<td>2.00</td>
						<td>73-76%</td>

						<td>C-</td>
						<td>1.70</td>
						<td>70-72%</td>
					</tr>
					<tr>
						<td><b>Poor</b></td>
						<td>D+</td>
						<td>1.30</td>
						<td>67-69%</td>

						<td>D</td>
						<td>1.00</td>
						<td>63-66%</td>

						<td>D-</td>
						<td>0.70</td>
						<td>60-62%</td>
					</tr>
					<tr>
						<td><b>Fail</b></td>
						<td>F</td>
						<td>0.00</td>
						<td>0.00-59%</td>
					</tr>
				</tbody>
			</table>
		</div>
	<div class="col-md-4"></div>


	<div class="col-md-6 offset-3 mt-4">
		<p class="text-uppercase text-center" style="font-size: 12px">****** any entry below this lines in not valid ******* </p>
	</div>

	



	</div>




	<div class="col-md-10 offset-1" style="margin-top: 8em">
					<div class="row">
						<div class="col-md-4 pull-left text-center">
							<hr>
							<p style="font-size: 12px">Registra's Signature</p>
						</div>

						<div class="col-md-4"></div>
			
						

						<div class="col-md-4 pull-right text-center">
							<hr>
							<p style="font-size: 12px">Homeroom Teacher's Signature</p>
						</div>
					</div>
					
						
					
				</div>
				
			

		<div class="col-md-10 offset-1 mt-4 " style="margin-bottom: 20px">
			<p class="text-left" style="font-size: 12px" style="margin-bottom: 10px">
			A transcript is official if embossed with Cambodia Adventist School logo seal and signature signed in ink.
			</p>
		</div>

	</div>



</page>


<!-- <page size="A4" layout="portrait"></page> -->


	</main>


</body>
</html>




