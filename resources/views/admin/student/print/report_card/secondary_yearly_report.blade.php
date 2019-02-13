
@include('admin.student.print.header_style')

<body class="d-flex flex-column" style="min-height: 100vh">
	<main class="flex-fill">

<page size="A4">

	<div class="container">
		<div class="row" >
			<!-- school info -->
				@include('admin.student.print.report_card.report_card_header')
       

			<!-- student info -->

			</div>

			<div class="row">

			<div class="col-md-12 ">

				
			<table class="table table-bordered table-sm">
				<!--Table head-->
				<h6>
					@foreach($secondaryscore as $score_s1)

					@if ($loop->first) 
					
						{{ $score_s1->secondaryLevel->name }}
						 

					@endif

				@endforeach

				<span style="margin-left: 20px">

				School Year : 

				@foreach($secondaryscore as $score_s1)

					@if ($loop->first) 
					
						<span class="text-center" style="font-size: 16px; font-weight: 400;" contenteditable="true">
                        	
	                        {{ $score_s1->created_at->format('Y') }} - 
	                        {{ $score_s1->created_at->format('Y')+1 }}
            </span>

					@endif

				@endforeach
				</span>

				</h6>
			    <thead>
			        <tr>
			            
			            <th style="font-size: 13px">Subject</th>
			            <th style="font-size: 13px">1<sup>st</sup> Quarter</th>
			            <th style="font-size: 13px">2<sup>nd</sup> Quarter</th>
			            <th style="font-size: 13px">1<sup>st</sup> Semester</th>
			            <th style="font-size: 13px">3<sup>rd</sup> Quarter</th>
			            <th style="font-size: 13px">4<sup>th</sup> Quarter</th>
			            <th style="font-size: 13px">2<sup>nd</sup> Semester</th>
			            <th style="font-size: 13px"> Yearly</th>

			           
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>

			    	@if(count($secondaryscore))
				    	@foreach($secondaryscore as $score_s1)

					    	@foreach($secondaryGrade as $grades)

						    	@if($score_s1->secondary_level_id == $grades->id)

							    	
							        <tr>

							            
							            <td style="font-size: 12px; font-weight: bold">{{$score_s1->PrimarySubject->name}}</td>
							            <td style="font-size: 12px; font-weight: bold" class="text-center">{{ $score_s1->quarter_1}}</td>

							            <td style="font-size: 12px; font-weight: bold" class="text-center">{{ $score_s1->quarter_2}}</td>
							            <td style="font-size: 12px; font-weight: bold" class="text-center"> 

							            	{{ number_format(ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2),2, '.', ',') }}
							            

							            </td>

							            <td style="font-size: 12px; font-weight: bold" class="text-center">{{ $score_s1->quarter_3}}</td>

							            <td style="font-size: 12px; font-weight: bold" class="text-center">{{ $score_s1->quarter_4}}</td>

							            <td style="font-size: 12px; font-weight: bold" class="text-center"> 

							            	{{ number_format(ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2), 2, '.', ',') }}
							            

							            </td>
													<td style="font-size: 12px; font-weight: bold" class="text-center">{{
														number_format(ceil(($score_s1->quarter_1+$score_s1->quarter_2+$score_s1->quarter_3+$score_s1->quarter_4)/4), 2, '.', ',')



													}}</td>

							            

							        </tr>
							        
							        
									
						        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif

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

						<td style="font-size: 12px" contenteditable="true">
							
						</td>
						
					</tr>

			        

			        
			    </tbody>
			    <!--Table body-->

			</table>
			<!--Table-->



			
		</div>


		

	@include('admin.student.print.report_card.report_card_footer')



</page>


<!-- <page size="A4" layout="portrait"></page> -->


	</main>


</body>
</html>




