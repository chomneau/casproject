@include('end_user.cgpa.cgpa_head')

<body class="d-flex flex-column" style="min-height: 100vh">
	<main class="flex-fill">

<page size="A4">

	<div class="container">
		<div class="row" >
			<!-- school info -->
				@include('end_user.cgpa.student_info')

			 

    <!---------------------------- Grade 10 ---------------------------------->
    <div class="row">

    <div class="col-md-6 ">

            <table class="table table-sm">
				<!--Table head-->
				<h6><span class="badge badge-primary badge-pill">1</span> First Semester : 

                    @foreach($score_grade_10 as $score_s1)

                        @if ($loop->first) 
                        
                            {{ $score_s1->created_at->format('Y') }} - 
                            {{ $score_s1->created_at->format('Y')+1 }} 

                        @endif

                    @endforeach

                    <span style="color:#5d95ef" class="pull-right">
                    @foreach($score_grade_10 as $score_s1)

                        @if ($loop->first) 
                            {{ $score_s1->grade->grade_name }} 
                        @endif

                    @endforeach

                </span>


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

			    	@if(count($score_grade_10))
				    	@foreach($score_grade_10 as $score_s1)

					    	@foreach($grade as $grades)

						    	@if($score_s1->grade_id == $grades->id)

							    	
							        <tr>
							            
							            <td style="font-size: 12px; font-weight: bold">{{$score_s1->Subject->name}}</td>
							            <td style="font-size: 12px; font-weight: bold">
							            	{{ ($score_s1->Subject->credit)/2 }}</td>
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
						<th style="font-size: 12px; font-weight: bold">{{ $credit_grade_10 }}</th>
						<th style="font-size: 12px; font-weight: bold"> SEMESTER GPA</th>
						<th style="font-size: 12px; font-weight: bold">

						@if($credit_grade_10 <= 0)
							<span>0.00</span>
						@else
							
							{{ number_format($sum_pts_1_grade_10/$credit_grade_10, 2, '.', '') }}

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
				
				@foreach($score_grade_10 as $score_s1)

					@if ($loop->first) 
					
						{{ $score_s1->updated_at->format('Y') }} - 
						{{ $score_s1->updated_at->format('Y')+1 }} 

					@endif

				@endforeach

                <span style="color:#5d95ef" class="pull-right">
                    @foreach($score_grade_10 as $score_s1)

                        @if ($loop->first) 
                            {{ $score_s1->grade->grade_name }} 
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
			        @if(count($score_grade_10))
				    	@foreach($score_grade_10 as $score_s1)

					    	@foreach($grade as $grades)

						    	@if($score_s1->grade_id == $grades->id)

							    	
							        <tr>
							            
							            <td style="font-size: 12px; font-weight: bold">{{$score_s1->Subject->name}}</td>
							            <td style="font-size: 12px; font-weight: bold">
							            	{{ ($score_s1->Subject->credit)/2 }}</td>
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

							{{ $credit_grade_10 }}

						</th>



						<th style="font-size: 12px; font-weight: bold">SEMESTER GPA</th>
						<th style="font-size: 12px; font-weight: bold">

						@if($credit_grade_10 <= 0)
							<span>0.00</span>
						@else
							
							{{ number_format($sum_pts_2_grade_10/$credit_grade_10, 2, '.', '') }}

						@endif
						
						</th>

						
					</tr>
			    </tbody>
			    <!--Table body-->

			</table>
			<!--Table-->


    <!--------------------------------- end grade 10 ------------------------->


        </div>
			
	</div>


<!-------------------------- start Grade 11------------------------------------->

<!-- Grade 11 -->
<div class="row">

<div class="col-md-6 ">

		<table class="table table-sm">
			<!--Table head-->
			<h6><span class="badge badge-primary badge-pill">1</span> First Semester : 

				@foreach($score_grade_11 as $score_s1)

					@if ($loop->first) 
					
						{{ $score_s1->created_at->format('Y') }} - 
						{{ $score_s1->created_at->format('Y')+1 }} 

					@endif

				@endforeach

				<span style="color:#5d95ef" class="pull-right">
				@foreach($score_grade_11 as $score_s1)

					@if ($loop->first) 
						{{ $score_s1->grade->grade_name }} 
					@endif

				@endforeach

			</span>


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

				@if(count($score_grade_11))
					@foreach($score_grade_11 as $score_s1)

						@foreach($grade as $grades)

							@if($score_s1->grade_id == $grades->id)

								
								<tr>
									
									<td style="font-size: 12px; font-weight: bold">{{$score_s1->Subject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">{{ ($score_s1->Subject->credit)/2 }}</td>
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
					<th style="font-size: 12px; font-weight: bold">{{ $credit_grade_11 }}</th>
					<th style="font-size: 12px; font-weight: bold"> SEMESTER GPA</th>
					<th style="font-size: 12px; font-weight: bold">

					@if($credit_grade_11 <= 0)
						<span>0.00</span>
					@else
						
						{{ number_format($sum_pts_1_grade_11/$credit_grade_11, 2, '.', '') }}

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
			
			@foreach($score_grade_11 as $score_s1)

				@if ($loop->first) 
				
					{{ $score_s1->updated_at->format('Y') }} - 
					{{ $score_s1->updated_at->format('Y')+1 }} 

				@endif

			@endforeach

			<span style="color:#5d95ef" class="pull-right">
				@foreach($score_grade_11 as $score_s1)

					@if ($loop->first) 
						{{ $score_s1->grade->grade_name }} 
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
				@if(count($score_grade_11))
					@foreach($score_grade_11 as $score_s1)

						@foreach($grade as $grades)

							@if($score_s1->grade_id == $grades->id)

								
								<tr>
									
									<td style="font-size: 12px; font-weight: bold">{{$score_s1->Subject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">
										{{ ($score_s1->Subject->credit)/2}}</td>
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

						{{ $credit_grade_11 }}

					</th>



					<th style="font-size: 12px; font-weight: bold">SEMESTER GPA</th>
					<th style="font-size: 12px; font-weight: bold">

					@if($credit_grade_11 <= 0)
						<span>0.00</span>
					@else
						
						{{ number_format($sum_pts_2_grade_11/$credit_grade_11, 2, '.', '') }}

					@endif
					</th>

					
				</tr>
			</tbody>
			<!--Table body-->

		</table>
		<!--Table-->


<!-- end grade 10 -->


	</div>
		
</div>




<!------------------------------End Grade 11------------------------------------------>


<!--------------------------------Start Grade 12--------------------------------------->

<!-- Grade 10 -->
<div class="row">

<div class="col-md-6 ">

		<table class="table table-sm">
			<!--Table head-->
			<h6><span class="badge badge-primary badge-pill">1</span> First Semester : 

				@foreach($score_grade_12 as $score_s1)

					@if ($loop->first) 
					
						{{ $score_s1->created_at->format('Y') }} - 
						{{ $score_s1->created_at->format('Y')+1 }} 

					@endif

				@endforeach

				<span style="color:#5d95ef" class="pull-right">
				@foreach($score_grade_12 as $score_s1)

					@if ($loop->first) 
						{{ $score_s1->grade->grade_name }} 
					@endif

				@endforeach

			</span>


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

				@if(count($score_grade_12))
					@foreach($score_grade_12 as $score_s1)

						@foreach($grade as $grades)

							@if($score_s1->grade_id == $grades->id)

								
								<tr>
									
									<td style="font-size: 12px; font-weight: bold">{{$score_s1->Subject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">
										{{ ($score_s1->Subject->credit)/2}}</td>
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
					<th style="font-size: 12px; font-weight: bold">{{ $credit_grade_12 }}</th>
					<th style="font-size: 12px; font-weight: bold"> SEMESTER GPA</th>
					<th style="font-size: 12px; font-weight: bold">

					@if($credit_grade_12 <= 0)
						<span>0.00</span>
					@else
						
						{{ number_format($sum_pts_1_grade_12/$credit_grade_12, 2, '.', '') }}

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
			
			@foreach($score_grade_12 as $score_s1)

				@if ($loop->first) 
				
					{{ $score_s1->updated_at->format('Y') }} - 
					{{ $score_s1->updated_at->format('Y')+1 }} 

				@endif

			@endforeach

			<span style="color:#5d95ef" class="pull-right">
				@foreach($score_grade_12 as $score_s1)

					@if ($loop->first) 
						{{ $score_s1->grade->grade_name }} 
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
				@if(count($score_grade_12))
					@foreach($score_grade_12 as $score_s1)

						@foreach($grade as $grades)

							@if($score_s1->grade_id == $grades->id)

								
								<tr>
									
									<td style="font-size: 12px; font-weight: bold">{{$score_s1->Subject->name}}</td>
									<td style="font-size: 12px; font-weight: bold">
										{{ ($score_s1->Subject->credit)/2}}</td>
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

						{{ $credit_grade_12 }}

					</th>



					<th style="font-size: 12px; font-weight: bold">SEMESTER GPA</th>
					<th style="font-size: 12px; font-weight: bold">
					
					@if($credit_grade_12 <= 0)
						<span>0.00</span>
					@else

						{{ number_format($sum_pts_2_grade_12/$credit_grade_12, 2, '.', '') }}

					@endif
					</th>

					
				</tr>
			</tbody>
			<!--Table body-->

		</table>
		<!--Table-->

		
		


<!-- end grade 12 -->


	</div>

	<table class="table table-sm">
			<thead>
				<tr>
										
					<th colspan="2" class="pull-right">CUMULATIVE  CREDIT</th>
					<th>{{ $total_credit }}</th>
					
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

<!---------------------------------End Grade 12-------------------------------------->


	@include('end_user.cgpa.cgpa_footer')



</page>


<!-- <page size="A4" layout="portrait"></page> -->


	</main>


</body>
</html>



