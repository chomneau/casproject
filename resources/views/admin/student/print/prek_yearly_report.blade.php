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
            height: 21cm;  
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
	                        <h5>YEARLY REPORT</h5>
	                        
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
								<li>Student's Name : <strong>{{ $student->last_name}} 
									{{ $student->first_name}}</strong>
								</li>

								<li>Student ID : 
									<strong>
										{{ $student->card_id }} 
									</strong>
								</li>
								
                                
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

			<div class="col-md-12 ">

				
			<table class="table table-bordered table-sm">
				<!--Table head-->
				<h6>
					@foreach($kscore as $score_s1)

					@if ($loop->first) 
					
						Grde : {{ $score_s1->KLevel->name }}
						 

					@endif

				@endforeach

				<span style="margin-left: 20px">

				School Year : 

				@foreach($kscore as $score_s1)

					@if ($loop->first) 
					
						{{ $score_s1->created_at->format('Y') }} - 
						{{ $score_s1->created_at->format('Y')+1 }} 

					@endif

				@endforeach
				</span>

				</h6>
			    <thead>
			        <tr>
			            
			            <th>Subject</th>
						{{--<th>2<sup>nd</sup> Q2</th>--}}
			            <th>Q1</th>
			            <th>Q2</th>
			            
			            <th>Q3</th>
			            <th>Q4</th>
			            
			           
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>
				<tr>
					<td style="font-weight: Bold">PERSONAL PLANNING - Intellectual Development</td>
				</tr>

			    	@if(count($subject_code_PPI))
				    	@foreach($subject_code_PPI as $score_s1)

					    	@foreach($kgrade as $grades)

						    	@if($score_s1->k_level_id == $grades->id)

							    	
							        <tr>

							            
							            <td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
							            <td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

							            <td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
							            
													<!-- <td style="font-size: 12px; font-weight: bold"> 

							            	{{ ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2) }}
							            
							            </td> -->

							            <td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

							            <td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

							            <!-- <td style="font-size: 12px; font-weight: bold"> 

							            	{{ ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2) }}

							            </td> -->

							        </tr>
							        
							        
									
						        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif

				{{--English Language arts-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold">ENGLISH LANGUAGE ARTS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_ELAI))
					@foreach($subject_code_ELAI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2) }}


									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2) }}

									</td>

								</tr>




							@endif

						@endforeach

					@endforeach
				@endif

				{{--Khmer Language arts-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold">KHMER LANGUAGE ARTS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_KLAI))
					@foreach($subject_code_KLAI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2) }}


									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2) }}

									</td>

								</tr>




							@endif

						@endforeach

					@endforeach
				@endif

				{{--Mathematics-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold">MATHEMATICS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_MI))
					@foreach($subject_code_MI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2) }}


									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2) }}

									</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--SOCIAL STUDIES-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold">SOCIAL STUDIES - Intellectual Development</td>
				</tr>

				@if(count($subject_code_SSI))
					@foreach($subject_code_SSI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2) }}


									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2) }}

									</td>

								</tr>




							@endif

						@endforeach

					@endforeach
				@endif

				{{--SCIENCE-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold">SCIENCE - Intellectual Development</td>
				</tr>

				@if(count($subject_code_SI))
					@foreach($subject_code_SI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2) }}


									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2) }}

									</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif


				<tr>
					<td style="font-weight: Bold">FINE ARTS - Aesthetic and Artistic Development</td>
				</tr>

				@if(count($subject_code_FAA))
					@foreach($subject_code_FAA as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2) }}


									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2) }}

									</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--PHYSICAL EDUCATION -Physical Development--}}

				<tr>
					<td style="font-weight: Bold">PHYSICAL EDUCATION - Physical Development</td>
				</tr>

				@if(count($subject_code_PEP))
					@foreach($subject_code_PEP as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2) }}


									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2) }}

									</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--SOCIAL RESPONSIBILITY-Social and Emotional Development--}}

				<tr>
					<td style="font-weight: Bold">SOCIAL RESPONSIBILITY-Social and Emotional Development</td>
				</tr>

				@if(count($subject_code_SRS))
					@foreach($subject_code_SRS as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2) }}


									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									<td style="font-size: 12px; font-weight: bold">

										{{ ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2) }}

									</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif
				<tr>
					<td></td>
				</tr>

			        <tr>
						<td style="font-size: 12px; font-weight: bold">Days Present</td>
						<td style="font-size: 12px" contenteditable="true">
							
						</td>

						<td style="font-size: 12px" contenteditable="true">
							
						</td>

						<td style="font-size: 12px" contenteditable="true">
							
						</td>
						<td style="font-size: 12px" contenteditable="true">
							
						</td>
						<td style="font-size: 12px" contenteditable="true">
							
						</td>
						<td style="font-size: 12px" contenteditable="true">
							
						</td>
						
					</tr>

			        

			        
			    </tbody>
			    <!--Table body-->

			</table>
			<!--Table-->

		</div>


<div class="row" style="margin-top: 5em">
		<div class="col-md-1"></div>

	<div class="col-md-1"></div>


	<div class="col-md-12">
		<p class="text-uppercase text-center" style="font-size: 12px; margin-left: 15em">****** any entry below this lines in not valid ******* </p>
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
				
			

		<div class="col-md-10 offset-1 mt-4">
			<p class="text-left" style="font-size: 12px">
			A transcript is official if embossed with Cambodia Adventist School logo seal and signature signed in ink.
			</p>
		</div>
					
		
	

	</div>



</page>


<!-- <page size="A4" layout="portrait"></page> -->


	</main>


</body>
</html>







