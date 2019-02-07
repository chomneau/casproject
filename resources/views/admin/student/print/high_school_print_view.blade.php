@include('admin.student.print.header_style')
<body class="d-flex flex-column" style="min-height: 100vh">
	<main class="flex-fill">

<page size="A4">

	<div class="container">
		<div class="row" >
			<!-- school info -->
				@include('admin.student.print.student_info')

			<div class="row" style="margin-top: 2em">

			<div class="col-md-6 ">

				
			<table class="table table-sm">
				<!--Table head-->
				<h6><span class="badge badge-primary badge-pill">1-A</span> First Semester : 

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
							            <td style="font-size: 12px; font-weight: bold">
							            	{{ ($score_s1->subject->credit)/2 }}</td>
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
						<th style="font-size: 12px; font-weight: bold">{{ $credit_grade }}</th>
						<th style="font-size: 12px; font-weight: bold"> SEMESTER GPA</th>
						<th style="font-size: 12px; font-weight: bold">

							@if($credit_grade <= 0)
								<span>0.00</span>
							@else
								

								{{ number_format($sum_pts_1/$credit_grade, 2, '.', '') }}

							@endif
							

							
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
							            <td style="font-size: 12px; font-weight: bold">
							            	{{ ($score_s1->subject->credit)/2 }}</td>
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

							{{ $credit_grade }}

						</th>



						<th style="font-size: 12px; font-weight: bold">SEMESTER GPA</th>
						<th style="font-size: 12px; font-weight: bold">


							@if($credit_grade <= 0)
								<span>0.00</span>
							@else
								
								{{ number_format($sum_pts_2/$credit_grade, 2, '.', '') }}

							@endif
						</th>

						
					</tr>
			    </tbody>
			    <!--Table body-->

			</table>
			<!--Table-->



			</div>

			<table class="table table-sm">
			<thead>
				<tr>
										
					<th colspan="2" class="pull-right">CUMULATIVE  CREDIT</th>
					<th>
						{{ $total_credit }}
					</th>
					
					<th colspan="2" class="pull-right">CUMULATIVE  GPA</th>			            
					<th>
						@if($CGPA > 0 )
							{{ number_format($CGPA, 2, '.', ' ')}}
						@else
							<span>0.00</span>
						@endif
					</th>
				</tr>
			</thead>
		</table>
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
						<td><b>Failed</b></td>
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




