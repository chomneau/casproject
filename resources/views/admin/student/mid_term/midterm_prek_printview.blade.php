
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
					@foreach($kscore as $score_s1)

					@if ($loop->first) 
					<span style="font-size: 16px">
						Grade : {{ $score_s1->KLevel->name }}
					</span>	 

					@endif

				@endforeach

				<span style="margin-left: 20px; font-size: 16px">

				School Year : 

			
			@foreach($kscore as $score_s1)	
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
			            
			            <th style="font-size:16px">Subject</th>
						{{--<th>2<sup>nd</sup> Q2</th>--}}
			            <th style="text-align:center">Midterm</th>
			            
			            
			           
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>
				<tr>
					<td style="font-weight: Bold; font-size: 16px">PERSONAL PLANNING - Intellectual Development</td>
				</tr>

			    	@if(count($subject_code_PPI))
				    	@foreach($subject_code_PPI as $score_s1)

					    	@foreach($kgrade as $grades)

						    	@if($score_s1->k_level_id == $grades->id)

							    	
										<tr style="font-size: 16px;">

							            
                          <td>{{$score_s1->KSubject->name}}</td>
                          
                          {{-- <td style="text-align:center">{{ $score_s1->midterm}}</td> --}}

													<td style="text-align:center">
														@if(Auth::guard('admin')->check())
                            	<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="update" data-name="midterm"  data-type="number" 
                            	data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
															</a>
														@elseif(Auth::guard('teacher')->check())
															<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="saveChange" data-name="midterm"  data-type="number" 
															data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
															</a>

														@endif
                          </td>

							            

							      </tr>
							        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif

				{{--English Language arts-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold;font-size: 16px">ENGLISH LANGUAGE ARTS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_ELAI))
					@foreach($subject_code_ELAI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 16px;">


									<td>{{$score_s1->KSubject->name}}</td>
									{{-- <td style="text-align:center">{{ $score_s1->midterm}}</td> --}}

									<td style="text-align:center">
											@if(Auth::guard('admin')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="update" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>
										@elseif(Auth::guard('teacher')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="saveChange" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>

										@endif
									</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Khmer Language arts-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 16px">KHMER LANGUAGE ARTS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_KLAI))
					@foreach($subject_code_KLAI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 16px;">


									<td>{{$score_s1->KSubject->name}}</td>
									
									<td style="text-align:center">
											@if(Auth::guard('admin')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="update" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>
										@elseif(Auth::guard('teacher')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="saveChange" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>

										@endif
									</td>

								</tr>




							@endif

						@endforeach

					@endforeach
				@endif

				{{--Mathematics-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 16px">MATHEMATICS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_MI))
					@foreach($subject_code_MI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 16px;">


									<td>{{$score_s1->KSubject->name}}</td>

									<td style="text-align:center">
											@if(Auth::guard('admin')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="update" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>
										@elseif(Auth::guard('teacher')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="saveChange" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>

										@endif
									</td>
									

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--SOCIAL STUDIES-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 16px">SOCIAL STUDIES - Intellectual Development</td>
				</tr>

				@if(count($subject_code_SSI))
					@foreach($subject_code_SSI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 16px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">
											@if(Auth::guard('admin')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="update" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>
										@elseif(Auth::guard('teacher')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="saveChange" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>

										@endif
                  </td>
									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--SCIENCE-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 16px">SCIENCE - Intellectual Development</td>
				</tr>

				@if(count($subject_code_SI))
					@foreach($subject_code_SI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 16px;">


									<td>{{$score_s1->KSubject->name}}</td>

									<td style="text-align:center">
											@if(Auth::guard('admin')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="update" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>
										@elseif(Auth::guard('teacher')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="saveChange" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>

										@endif
									</td>
									

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif


				<tr>
					<td style="font-weight: Bold; font-size: 16px">FINE ARTS - Aesthetic and Artistic Development</td>
				</tr>

				@if(count($subject_code_FAA))
					@foreach($subject_code_FAA as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 16px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">
											@if(Auth::guard('admin')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="update" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>
										@elseif(Auth::guard('teacher')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="saveChange" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>

										@endif
									</td>
									
									
								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--PHYSICAL EDUCATION -Physical Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 16px">PHYSICAL EDUCATION - Physical Development</td>
				</tr>

				@if(count($subject_code_PEP))
					@foreach($subject_code_PEP as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 16px;">


									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">
											@if(Auth::guard('admin')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="update" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>
										@elseif(Auth::guard('teacher')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="saveChange" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>

										@endif
									</td>
									

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--SOCIAL RESPONSIBILITY-Social and Emotional Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 16px">SOCIAL RESPONSIBILITY-Social and Emotional Development</td>
				</tr>

				@if(count($subject_code_SRS))
					@foreach($subject_code_SRS as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 16px;">


									<td>{{$score_s1->KSubject->name}}</td>

									<td style="text-align:center">
											@if(Auth::guard('admin')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="update" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>
										@elseif(Auth::guard('teacher')->check())
											<a style a:link="text-decoration: none; border-bottom: dashed 0.25px #0088cc;" class="saveChange" data-name="midterm"  data-type="number" 
											data-pk="{{ $score_s1->id}}" data-title="midterm">{{ $score_s1->midterm}}
											</a>

										@endif
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
						<td style="font-size: 16px">
							This student is meeting the expected level of development for his/her age range. (If No, see comment)
						</td>
						<td style="font-size: 14px; text-align:center" >Y or N</td>
						
					</tr>

					<tr>
						<td style="font-size: 16px">
							This student is on a modified program. (If Yes, see comment)  	
						</td>
						<td style="font-size: 14px; text-align:center" >Y or N</td>
						
					</tr>

			    <tr>
						<td style="font-size: 16px; font-weight: bold">Days Present</td>
						<td style="font-size: 16px; font-weight:350" contenteditable="true" class="text-center">

						
						
				{{-- midterm day present --}}

				{{-- {{ $dayPresents[0]->id }} --}}
				{{-- @foreach ($dayPresents as $dayPresent) --}}
					@if ($selectedDaypresent == $dayPresents[0]->id)
							@if ($prek_absent_quarter_1>0)
								{{ floor($total_daypresent_1 - $prek_absent_quarter_1) }} / {{ $total_daypresent_1 }}
							@else
								{{ $total_daypresent_1  }} / {{ $total_daypresent_1  }}
							@endif
					@elseif($selectedDaypresent == $dayPresents[1]->id)
							@if ($prek_absent_quarter_2>0)
								{{ floor($total_daypresent_2 - $prek_absent_quarter_2) }} / {{ $total_daypresent_2 }}
							@else
								{{ $total_daypresent_2  }} / {{ $total_daypresent_2  }}
							@endif
					@elseif($selectedDaypresent == $dayPresents[2]->id)

					@if ($prek_absent_quarter_3>0)
								{{ floor($total_daypresent_3 - $prek_absent_quarter_3) }} / {{ $total_daypresent_3 }}
							@else
								{{ $total_daypresent_3  }} / {{ $total_daypresent_3  }}
							@endif
					
					@elseif($selectedDaypresent == $dayPresents[3]->id)	
						@if ($prek_absent_quarter_4>0)
								{{ floor($total_daypresent_4 - $prek_absent_quarter_4) }} / {{ $total_daypresent_4 }}
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


	@include('admin.student.print.report_card.prek_yearly_report_card_footer')



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

         url: '/admin/midterm/prekscore/update',

         type: 'text',

         pk: 1,

         name: 'name',

         title: 'Enter name'
         
  }); 

//teacher side

  $('.saveChange').editable({

      url: '/teacher/midterm/prekscore/update',

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







