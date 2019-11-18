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
					@foreach($semester_1 as $score_s1)

					@if ($loop->first) 
					
						{{ $score_s1->grade->grade_name }}
						 

					@endif

				@endforeach

				<span style="margin-left: 20px">

				School Year : 

 
					
 				@foreach($semester_1 as $score_s1)	
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
			            
			            <th class="text-center" style="font-size: 14px">Subject</th>
			            <th class="text-center" style="font-size: 14px">1<sup>st</sup> Quarter</th>
			            <th class="text-center" style="font-size: 14px">2<sup>nd</sup> Quarter</th>
			            <th class="text-center" style="font-size: 14px">1<sup>st</sup> Semester</th>
			            <th class="text-center" style="font-size: 14px">3<sup>rd</sup> Quarter</th>
			            <th class="text-center" style="font-size: 14px">4<sup>th</sup> Quarter</th>
			            <th class="text-center" style="font-size: 14px">2<sup>nd</sup> Semester</th>

									

									
			           
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

							            
							            <td style="font-size: 14px; font-weight: bold" >		{{$score_s1->subject->name}}
							            </td>
							            <td style="font-size: 14px; " class="text-center">
							            	{{ $score_s1->quarter_1}}
							            </td>

							            <td style="font-size: 14px; " class="text-center">
							            	{{ $score_s1->quarter_2}}
							            </td>
													<td style="font-size: 14px; font-weight: bold" class="text-center"> 
														<?php
															if(!$score_s1->quarter_1 == null && !$score_s1->quarter_2 == null){
															 echo number_format(ceil(($score_s1->quarter_1+$score_s1->quarter_2)/2), 2, '.', ',');
															}
														
														?>


														<!-- number_format($number, 2, '.', ',') -->
							            

							            </td>

							            <td style="font-size: 14px; " class="text-center">
							            	{{ $score_s1->quarter_3}}
							            </td>

							            <td style="font-size: 14px; " class="text-center">
							            	{{ $score_s1->quarter_4}}
							            </td>

													<td style="font-size: 14px; font-weight: bold" class="text-center"> 
														
														<?php
															if(!$score_s1->quarter_3 == null && !$score_s1->quarter_4 == null){
															 echo number_format(ceil(($score_s1->quarter_3+$score_s1->quarter_4)/2), 2, '.', ',');
															}
														
														?>
							            

							            </td>


							        </tr>
							        
						        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif

			    <tr>
						<td style="font-size: 14px; font-weight: bold">Days Present</td>

												
				<td style="font-size: 14px; font-weight:350" contenteditable="true" class="text-center">
					
						@foreach($semester_1 as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_1 )
								
									@if ($highschool_absent_quarter_1>0)
									{{ floor($total_daypresent_1 - $highschool_absent_quarter_1) }} / {{ $total_daypresent_1 }}
									@else
									{{ $total_daypresent_1  }} / {{ $total_daypresent_1  }}
									@endif

								@endif
							@endif	
						@endforeach
							
					


					{{-- @if($total_daypresent_1==1)
						{{ $total_daypresent_1  }}/{{ $total_daypresent_1  }}
					@elseif($total_daypresent_1>1)
						
						{{ floor($total_daypresent_1 - $highschool_absent_quarter_1) }} / {{ $total_daypresent_1 }}

					@endif							 --}}
					
				</td>

						<td class="text-center" style="font-size: 12px" contenteditable="true">
						
						@foreach($semester_1 as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_2 )
								
									@if ($highschool_absent_quarter_2>0)
									{{ floor($total_daypresent_2 - $highschool_absent_quarter_2) }} / {{ $total_daypresent_2 }}
									@else
									{{ $total_daypresent_2  }} / {{ $total_daypresent_2  }}
									@endif

								@endif
							@endif	
						@endforeach

						</td>
					{{--semester_1--}}
						<td class="text-center" style="font-size: 12px; font-weight:bold" contenteditable="true">

							
							@foreach($semester_1 as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_1 && $score_s1->quarter_2 )
								
								{{ ($total_daypresent_1 - $highschool_absent_quarter_1) + ($total_daypresent_2 - $highschool_absent_quarter_2) }} / {{ $total_daypresent_1 + $total_daypresent_2 }}

								@endif
							@endif	
						@endforeach
						 

						</td>


						<td class="text-center" style="font-size: 12px" contenteditable="true">

							@foreach($semester_1 as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_3 )
								
									@if ($highschool_absent_quarter_2>0)
									{{ floor($total_daypresent_3 - $highschool_absent_quarter_3) }} / {{ $total_daypresent_3 }}
									@else
									{{ $total_daypresent_3  }} / {{ $total_daypresent_3  }}
									@endif

								@endif
							@endif	
						@endforeach

						
												
						</td>


						<td class="text-center" style="font-size: 12px" contenteditable="true">
						
							
						@foreach($semester_1 as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_2 )
								
									@if ($highschool_absent_quarter_4>0)
									{{ floor($total_daypresent_4 - $highschool_absent_quarter_4) }} / {{ $total_daypresent_4 }}
									@else
									{{ $total_daypresent_4  }} / {{ $total_daypresent_4  }}
									@endif

								@endif
							@endif	
						@endforeach


						</td>
						{{-- semeter 2--}}
						<td class="text-center" style="font-size: 12px; font-weight:bold" contenteditable="true">


						@foreach($semester_1 as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_3 && $score_s1->quarter_4 )
								
								{{ ($total_daypresent_3 - $highschool_absent_quarter_3) + ($total_daypresent_4 - $highschool_absent_quarter_4) }} / {{ $total_daypresent_3 + $total_daypresent_4 }}

								@endif
							@endif	
						@endforeach

						 

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




