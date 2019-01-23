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
					
					<div class="row" style="margin-top: -6em;">

						<div class="col-sm-6 col-md-5" style="margin-left: -35px">

							
							<div class="table-responsive" style="margin-left: 2em">
							  <table class="table table-sm table-borderless">
							    
							    <tbody>
							      <tr>
							        <th scope="row">Student Name</th>
							        <td>:</td>
							        <td>
							        	{{ $student->last_name}} 
										{{ $student->first_name}}
									</td>
							        
							        
							        
							      </tr>
							      <tr>
							        <th scope="row">
							        	Student ID
							        </th>
							        <td>:</td>
							        <td>
							        	{{ $student->card_id }}
							        </td>
							        
							        
							      </tr>
							      
							      
							    </tbody>
							  </table>
							</div>


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
					
						Grade : {{ $score_s1->KLevel->name }}
						 

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
			            
			            <th>Grading Period</th>
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
					<td style="font-weight: Bold">Spiritual Development</td>
				</tr>

			    	@if(count($subject_code_SD))
				    	@foreach($subject_code_SD as $score_s1)

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
					<td style="font-weight: Bold">
					Personal/Social Development					
					</td>
				</tr>

				@if(count($subject_code_PD))
					@foreach($subject_code_PD as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									

								</tr>




							@endif

						@endforeach

					@endforeach
				@endif

				{{--Khmer Language arts-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold">
					Art
					</td>
				</tr>

				@if(count($subject_code_ART))
					@foreach($subject_code_ART as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									

								</tr>




							@endif

						@endforeach

					@endforeach
				@endif

				{{--Music--}}

				<tr>
					<td style="font-weight: Bold">Music</td>
				</tr>

				@if(count($subject_code_MUSIC))
					@foreach($subject_code_MUSIC as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Demonstrates emergent reading and writing skills:					--}}

				<tr>
					<td style="font-weight: Bold">
						Language Arts (Refer to tracking cards)										
					</td>
				</tr>

				<tr>
					<td style="font-weight: Bold">
						Demonstrates emergent reading and writing skills:					
					</td>
				</tr>

				@if(count($subject_code_DERWS))
					@foreach($subject_code_DERWS as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2 }}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									

								</tr>




							@endif

						@endforeach

					@endforeach
				@endif

				{{--Exhibits appropriate word study skills:	--}}

				<tr>
					<td style="font-weight: Bold">
					Exhibits appropriate word study skills:					
					</td>
				</tr>

				@if(count($subject_code_EAWSS))
					@foreach($subject_code_EAWSS as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif



				<tr>
					<td style="font-weight: Bold">
					Khmer					
					</td>
				</tr>



				<tr>
					<td style="font-weight: Bold">
					Demonstrates emergent reading and writing skills:					
					</td>
				</tr>

				@if(count($subject_code_DERWS_KH))
					@foreach($subject_code_DERWS_KH as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									
								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Exhibits appropriate word study skills:	--}}

				<tr>
					<td style="font-weight: Bold">
					Exhibits appropriate word study skills:					
					</td>
				</tr>

				@if(count($subject_code_EAWSS_KH))
					@foreach($subject_code_EAWSS_KH as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">{{$score_s1->KSubject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_1}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2}}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3}}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Mathematics (Refer to tracking cards)--}}

				<tr>
					<td style="font-weight: Bold">
						Mathematics (Refer to tracking cards)					
					</td>
				</tr>

				@if(count($subject_code_MATH))
					@foreach($subject_code_MATH as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">
										{{$score_s1->KSubject->name}}
									</td>

									<td style="font-size: 12px; font-weight: bold">
										{{ $score_s1->quarter_1}}
									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2 }}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3 }}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Grading Period	--}}

				<tr>
					<td style="font-weight: Bold">
						Grading Period										
					</td>
				</tr>

				<tr>
					<td style="font-weight: Bold">
						Physical Educe don / Health (Refer to tracking card)															
					</td>
				</tr>

				@if(count($subject_code_PEDH))
					@foreach($subject_code_PEDH as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">
										{{$score_s1->KSubject->name}}
									</td>

									<td style="font-size: 12px; font-weight: bold">
										{{ $score_s1->quarter_1}}
									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2 }}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3 }}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{-- Science--}}
				<tr>
					<td style="font-weight: Bold">
						Science																				
					</td>
				</tr>

				@if(count($subject_code_SCIENCE))
					@foreach($subject_code_SCIENCE as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">
										{{$score_s1->KSubject->name}}
									</td>

									<td style="font-size: 12px; font-weight: bold">
										{{ $score_s1->quarter_1}}
									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2 }}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3 }}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{-- Social Studies	--}}
				<tr>
					<td style="font-weight: Bold">
						Social Studies																									
					</td>
				</tr>

				@if(count($subject_code_SS))
					@foreach($subject_code_SS as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr>


									<td style="font-size: 12px; font-weight: bold">
										{{$score_s1->KSubject->name}}
									</td>

									<td style="font-size: 12px; font-weight: bold">
										{{ $score_s1->quarter_1}}
									</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_2 }}</td>
									

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_3 }}</td>

									<td style="font-size: 12px; font-weight: bold">{{ $score_s1->quarter_4}}</td>

									

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







