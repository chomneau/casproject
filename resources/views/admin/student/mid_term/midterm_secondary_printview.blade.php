@include('admin.student.mid_term.header_style')

<body class="d-flex flex-column" style="min-height: 100vh">
	<main class="flex-fill">

<page size="A4">

	<div class="container">
		<div class="row" >
			<!-- school info -->
      @include('admin.student.mid_term.midterm_header')
       

			<!-- student info -->

			</div>

			<div class="row">

			<div class="col-md-12 ">

				
			<table class="table table-bordered table-sm">
				<!--Table head-->
				<h6>
					@foreach($secondaryscore as $score_s1)

					@if ($loop->first) 
					<span style="font-size: 18px ">
						{{ $score_s1->secondaryLevel->name }}
					</span>	 

					@endif

				@endforeach

				<span style="margin-left: 20px;font-size: 18px ">

				School Year : 

				
				@foreach($secondaryscore as $score_s1)	
					@if ($loop->first) 
										
						<span class="text-center" style="font-size: 18px; font-weight: 400;" contenteditable="true">
                        	
							{{ $score_s1->created_at->format('Y') }} - 
	            {{ $score_s1->created_at->format('Y')+1 }}
                        			 
            </span> 

					@endif
				@endforeach


				</span>

				</h6>
			    <thead>
			        <tr>
			            
			            <th style="font-size: 16px" width="80%">Subject</th>
			            
			            <th style="font-size: 16px; text-align:center"> Midterm</th>

			           
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

							            
							            <td style="font-size: 16px; font-weight: bold">{{$score_s1->PrimarySubject->name}}</td>
							            

													<td style="text-align:center; font-size: 16px; font-weight: bold">
                              <a class="update" data-name="midterm"  data-type="number" 
                              data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
                              </a>
                            </td>

							            
							        </tr>
							        						        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif

			    <tr>
						<td style="font-size: 16px; font-weight: bold">Days Present</td>
						<td style="font-size: 16px; font-weight:bold" contenteditable="true" class="text-center">
						
								
							
							{{-- midterm day present --}}

				
					@if ($selectedDaypresent == $dayPresents[0]->id)
							@if ($secondaryschool_absent_quarter_1>0)
								{{ floor($total_daypresent_1 - $secondaryschool_absent_quarter_1) }} / {{ $total_daypresent_1 }}
							@else
								{{ $total_daypresent_1  }} / {{ $total_daypresent_1  }}
							@endif
					@elseif($selectedDaypresent == $dayPresents[1]->id)
						@if ($secondaryschool_absent_quarter_2>0)
							{{ floor($total_daypresent_2 - $secondaryschool_absent_quarter_2) }} / {{ $total_daypresent_2 }}
						@else
							{{ $total_daypresent_2  }} / {{ $total_daypresent_2  }}
						@endif
					@elseif($selectedDaypresent == $dayPresents[2]->id)

					@if ($secondaryschool_absent_quarter_3>0)
							{{ floor($total_daypresent_3 - $secondaryschool_absent_quarter_3) }} / {{ $total_daypresent_3 }}
						@else
							{{ $total_daypresent_3  }} / {{ $total_daypresent_3  }}
						@endif
				
					@elseif($selectedDaypresent == $dayPresents[3]->id)	
						@if ($secondaryschool_absent_quarter_4>0)
								{{ floor($total_daypresent_4 - $secondaryschoolrek_absent_quarter_4) }} / {{ $total_daypresent_4 }}
							@else
								{{ $total_daypresent_4  }} / {{ $total_daypresent_4  }}
							@endif	
					@else		
							<h3>Please select Quarter</h3>
					@endif
			{{-- @endforeach			 --}}
																			
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



<script type="text/javascript">


  $.ajaxSetup({

      headers: {

          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

  });

//admin side

  $('.update').editable({

				url: '/admin/midterm/secondaryschool/update',

				type: 'text',

				pk: 1,

				name: 'name',

				title: 'Enter name'
         
  }); 

//teacher side

  $('.saveChange').editable({

      url: '/teacher/prekscore/EditSubject',

      type: 'text',

      pk: 1,

      name: 'name',

      title: 'Enter name'


  });

  $(document).ready(function () {
      $('#refresh').click(function(){
          location.reload(true);
      });
  });



</script>


</body>
</html>




