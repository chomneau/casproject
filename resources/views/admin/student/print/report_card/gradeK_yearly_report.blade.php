


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
					@foreach($kscore as $score_s1)

					@if ($loop->first) 
					<span style="font-size: 18px">
						Grade : {{ $score_s1->KLevel->name }}
					</span>	 

					@endif

				@endforeach

				<span style="margin-left: 20px; font-size: 18px ">

				School Year : 

				@foreach($kscore as $score_s1)	
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
			        <tr style="font-size: 18px">
			            
			            <th>Grading Period</th>
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
					<td style="font-weight: Bold; font-size: 18px">Spiritual Development</td>
				</tr>

			    	@if(count($subject_code_SD))
				    	@foreach($subject_code_SD as $score_s1)

					    	@foreach($kgrade as $grades)

						    	@if($score_s1->k_level_id == $grades->id)

							    	
											<tr style="font-size: 18px;">
							            
							            <td>{{$score_s1->KSubject->name}}</td>
							            <td style="text-align:center">{{ $score_s1->quarter_1}}</td>
							            <td style="text-align:center">{{ $score_s1->quarter_2}}</td>
							            <td style="text-align:center">{{ $score_s1->quarter_3}}</td>
							            <td style="text-align:center">{{ $score_s1->quarter_4}}</td>

							      	</tr>

						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif

				{{--English Language arts-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">
					Personal/Social Development					
					</td>
				</tr>

				@if(count($subject_code_PD))
					@foreach($subject_code_PD as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2}}</td>									
									<td style="text-align:center">{{ $score_s1->quarter_3}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>
								
								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Khmer Language arts-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">
					Art
					</td>
				</tr>

				@if(count($subject_code_ART))
					@foreach($subject_code_ART as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_3}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Music--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">Music</td>
				</tr>

				@if(count($subject_code_MUSIC))
					@foreach($subject_code_MUSIC as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_3}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>	

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Demonstrates emergent reading and writing skills:					--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">
						Language Arts (Refer to tracking cards)										
					</td>
				</tr>

				<tr>
					<td style="font-weight: Bold; font-size: 18px">
						Demonstrates emergent reading and writing skills:					
					</td>
				</tr>

				@if(count($subject_code_DERWS))
					@foreach($subject_code_DERWS as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2 }}</td>									
									<td style="text-align:center">{{ $score_s1->quarter_3}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>
	
								</tr>


							@endif

						@endforeach

					@endforeach
				@endif

				{{--Exhibits appropriate word study skills:	--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">
					Exhibits appropriate word study skills:					
					</td>
				</tr>

				@if(count($subject_code_EAWSS))
					@foreach($subject_code_EAWSS as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)

								<tr style="font-size: 18px">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2}}</td>									
									<td style="text-align:center">{{ $score_s1->quarter_3}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif


				<tr>
					<td style="font-weight: Bold; font-size: 18px">
					Khmer					
					</td>
				</tr>

				<tr>
					<td style="font-weight: Bold; font-size: 18px">
					Demonstrates emergent reading and writing skills:					
					</td>
				</tr>

				@if(count($subject_code_DERWS_KH))
					@foreach($subject_code_DERWS_KH as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2}}</td>									
									<td style="text-align:center">{{ $score_s1->quarter_3}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>
									
								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Exhibits appropriate word study skills:	--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">
						Exhibits appropriate word study skills:					
					</td>
				</tr>

				@if(count($subject_code_EAWSS_KH))
					@foreach($subject_code_EAWSS_KH as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)

								<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2}}</td>									
									<td style="text-align:center">{{ $score_s1->quarter_3}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Mathematics (Refer to tracking cards)--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">
						Mathematics (Refer to tracking cards)					
					</td>
				</tr>

				@if(count($subject_code_MATH))
					@foreach($subject_code_MATH as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)

								<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2 }}</td>
									<td style="text-align:center">{{ $score_s1->quarter_3 }}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--Grading Period	--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">
						Grading Period										
					</td>
				</tr>

				<tr>
					<td style="font-weight: Bold; font-size: 18px">
						Physical Educe don / Health (Refer to tracking card)															
					</td>
				</tr>

				@if(count($subject_code_PEDH))
					@foreach($subject_code_PEDH as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)

								<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2 }}</td>
									<td style="text-align:center">{{ $score_s1->quarter_3 }}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>
									
								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{-- Science--}}
				<tr>
					<td style="font-weight: Bold; font-size: 18px">
						Science																				
					</td>
				</tr>

				@if(count($subject_code_SCIENCE))
					@foreach($subject_code_SCIENCE as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)

								<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2 }}</td>									
									<td style="text-align:center">{{ $score_s1->quarter_3 }}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>
									
								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{-- Social Studies	--}}
				<tr>
					<td style="font-weight: Bold; font-size: 18px">
						Social Studies																									
					</td>
				</tr>

				@if(count($subject_code_SS))
					@foreach($subject_code_SS as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)

							<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>

									<td style="text-align:center">{{ $score_s1->quarter_1}}</td>
									<td style="text-align:center">{{ $score_s1->quarter_2 }}</td>									
									<td style="text-align:center">{{ $score_s1->quarter_3 }}</td>
									<td style="text-align:center">{{ $score_s1->quarter_4}}</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif


				<tr>
					<td></td>
				</tr>

			    <tr>
						<td style="font-size: 18px; font-weight: bold">Days Present</td>
						<td style="font-size: 18px; font-weight:350" class="text-center">

							@foreach($subject_code_SD as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_1 )
								
									@if ($prek_absent_quarter_1>0)
										{{ floor($total_daypresent_1 - $prek_absent_quarter_1) }} / {{ $total_daypresent_1 }}
									@else
										{{ $total_daypresent_1  }} / {{ $total_daypresent_1  }}
									@endif

								@endif
							@endif	
						@endforeach
													
						</td>

						<td class="text-center" style="font-size: 18px" >

							@foreach($subject_code_SD as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_2 )
								
									@if ($prek_absent_quarter_2>0)
										{{ floor($total_daypresent_2 - $prek_absent_quarter_2) }} / {{ $total_daypresent_2 }}
									@else
										{{ $total_daypresent_2  }} / {{ $total_daypresent_2  }}
									@endif

								@endif
							@endif	
						@endforeach
							
						</td>
					
						<td class="text-center" style="font-size: 18px" >

							@foreach($subject_code_SD as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_3 )
								
									@if ($prek_absent_quarter_3>0)
										{{ floor($total_daypresent_3 - $prek_absent_quarter_3) }} / {{ $total_daypresent_3 }}
									@else
										{{ $total_daypresent_3  }} / {{ $total_daypresent_3  }}
									@endif

								@endif
							@endif	
						@endforeach
						
						</td>


						<td class="text-center" style="font-size: 18px" >

						@foreach($subject_code_SD as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_4 )
								
									@if ($prek_absent_quarter_4>0)
										{{ floor($total_daypresent_4 - $prek_absent_quarter_4) }} / {{ $total_daypresent_4 }}
									@else
										{{ $total_daypresent_4  }} / {{ $total_daypresent_4  }}
									@endif

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


	@include('admin.student.print.report_card.prek_and_k_report_card_footer')



</page>


<!-- <page size="A4" layout="portrait"></page> -->


	</main>


</body>
</html>


