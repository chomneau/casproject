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
				<h6><span class="badge badge-primary badge-pill">1</span> First Semester : 

				@foreach($semester_1 as $score_s1)

					@if ($loop->first) 
					
						<span class="text-center" style="font-size: 16px; font-weight: 400;" contenteditable="true">
                        	
                {{ $score_s1->created_at->format('Y') }} - 
                {{ $score_s1->created_at->format('Y')+1 }}
                        			 
                        		
            </span> 

					@endif

				@endforeach

				<span style="color:#5d95ef" class="pull-right">
						@foreach($semester_1 as $score_s1)

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
											{{ round($score_s1->pts_1, 2) }}
											
							            </td>

							        </tr>
							        
							        
									
						        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif

			        <tr>
						<th style="font-size: 12px; font-weight: bold">SEMESTER CREDIT</th>
						<th style="font-size: 12px; font-weight: bold">{{ round($credit_grade,2) }}</th>
						<th style="font-size: 12px; font-weight: bold"> SEMESTER GPA</th>
						<th style="font-size: 12px; font-weight: bold">

							@if($credit_grade <= 0)
								<span>0.00</span>
							@else
								

								{{ round($sum_pts_1/$credit_grade, 2) }}

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
					
						<span class="text-center" style="font-size: 16px; font-weight: 400;" contenteditable="true">
                        	
              {{ $score_s1->created_at->format('Y') }} - 
              {{ $score_s1->created_at->format('Y')+1 }}
            </span> 

					@endif

				@endforeach

				<span style="color:#5d95ef" class="pull-right">
						@foreach($semester_1 as $score_s1)

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
											{{ round($score_s1->pts_2,2) }}
											
							            </td>

							            

							        </tr>
							        
									
						        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif


			        <tr>
						<th style="font-size: 12px; font-weight: bold">SEMESTER CREDIT</th>
						<th style="font-size: 12px; font-weight: bold">

							{{ round($credit_grade, 2) }}

						</th>



						<th style="font-size: 12px; font-weight: bold">SEMESTER GPA</th>
						<th style="font-size: 12px; font-weight: bold">


							@if($credit_grade <= 0)
								<span>0.00</span>
							@else
								
								{{ round($sum_pts_2/$credit_grade, 2) }}

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
						{{ round($total_credit,2) }}
					</th>
					
					<th colspan="2" class="pull-right">CUMULATIVE  GPA</th>			            
					<th>
						@if($CGPA > 0 )
							{{ round($CGPA, 2)}}
						@else
							<span>0.00</span>
						@endif
					</th>
				</tr>
			</thead>
		</table>
		</div>


	@include('admin.student.print.transcript_footer')

		</div>
	<!-- end row  -->
	</div>
	<!-- end container  -->

</page>


<!-- <page size="A4" layout="portrait"></page> -->


	</main>


</body>
</html>




