
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

				<span style="margin-left: 20px; font-size: 18px">

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
			        <tr>
			            
			            <th style="font-size:18px">Subject</th>
						{{--<th>2<sup>nd</sup> Q2</th>--}}
			            <th style="text-align:center">Q1</th>
			            <th style="text-align:center">Q2</th>
			            
			            <th style="text-align:center">Q3</th>
			            <th style="text-align:center">Q4</th>
			            
			           
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>
				<tr>
					<td style="font-weight: Bold; font-size: 18px">PERSONAL PLANNING - Intellectual Development</td>
				</tr>

			    	@if(count($subject_code_PPI))
				    	@foreach($subject_code_PPI as $score_s1)

					    	@foreach($kgrade as $grades)

						    	@if($score_s1->k_level_id == $grades->id)

							    	
										<tr style="font-size: 18px;">

							            
							            <td>{{$score_s1->KSubject->name}}</td>
							            <td style="text-align:center">
											@if($score_s1->approve_score_q1 ==1)
												{{ $score_s1->quarter_1}}	
											@endif
										</td>
										<td style="text-align:center">
											@if($score_s1->approve_score_q2 ==1)
												{{ $score_s1->quarter_2}}
											@endif
										</td>
										<td style="text-align:center">
											@if($score_s1->approve_score_q3 ==1)
												{{ $score_s1->quarter_3}}											
											@endif
										</td>
										<td style="text-align:center">
											@if($score_s1->approve_score_q4 ==1)
												{{ $score_s1->quarter_4}}
											@endif
										</td>

							      </tr>
							        
						        @endif

					        @endforeach
				        
				        @endforeach
			        @endif

				{{--English Language arts-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold;font-size: 18px">ENGLISH LANGUAGE ARTS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_ELAI))
					@foreach($subject_code_ELAI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 18px;">


									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q1 ==1)
											{{ $score_s1->quarter_1}}	
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q2 ==1)
											{{ $score_s1->quarter_2}}
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q3 ==1)
											{{ $score_s1->quarter_3}}											
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q4 ==1)
											{{ $score_s1->quarter_4}}
										@endif
									</td>

									

								</tr>




							@endif

						@endforeach

					@endforeach
				@endif

				{{--Khmer Language arts-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">KHMER LANGUAGE ARTS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_KLAI))
					@foreach($subject_code_KLAI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 18px;">


									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q1 ==1)
											{{ $score_s1->quarter_1}}	
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q2 ==1)
											{{ $score_s1->quarter_2}}
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q3 ==1)
											{{ $score_s1->quarter_3}}											
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q4 ==1)
											{{ $score_s1->quarter_4}}
										@endif
									</td>

									

								</tr>




							@endif

						@endforeach

					@endforeach
				@endif

				{{--Mathematics-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">MATHEMATICS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_MI))
					@foreach($subject_code_MI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 18px;">


									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q1 ==1)
											{{ $score_s1->quarter_1}}	
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q2 ==1)
											{{ $score_s1->quarter_2}}
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q3 ==1)
											{{ $score_s1->quarter_3}}											
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q4 ==1)
											{{ $score_s1->quarter_4}}
										@endif
									</td>

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--SOCIAL STUDIES-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">SOCIAL STUDIES - Intellectual Development</td>
				</tr>

				@if(count($subject_code_SSI))
					@foreach($subject_code_SSI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q1 ==1)
											{{ $score_s1->quarter_1}}	
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q2 ==1)
											{{ $score_s1->quarter_2}}
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q3 ==1)
											{{ $score_s1->quarter_3}}											
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q4 ==1)
											{{ $score_s1->quarter_4}}
										@endif
									</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--SCIENCE-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">SCIENCE - Intellectual Development</td>
				</tr>

				@if(count($subject_code_SI))
					@foreach($subject_code_SI as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 18px;">


									<td>{{$score_s1->KSubject->name}}</td>

									<td style="text-align:center">
										@if($score_s1->approve_score_q1 ==1)
											{{ $score_s1->quarter_1}}	
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q2 ==1)
											{{ $score_s1->quarter_2}}
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q3 ==1)
											{{ $score_s1->quarter_3}}											
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q4 ==1)
											{{ $score_s1->quarter_4}}
										@endif
									</td>

									

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif


				<tr>
					<td style="font-weight: Bold; font-size: 18px">FINE ARTS - Aesthetic and Artistic Development</td>
				</tr>

				@if(count($subject_code_FAA))
					@foreach($subject_code_FAA as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q1 ==1)
											{{ $score_s1->quarter_1}}	
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q2 ==1)
											{{ $score_s1->quarter_2}}
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q3 ==1)
											{{ $score_s1->quarter_3}}											
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q4 ==1)
											{{ $score_s1->quarter_4}}
										@endif
									</td>
									
								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--PHYSICAL EDUCATION -Physical Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">PHYSICAL EDUCATION - Physical Development</td>
				</tr>

				@if(count($subject_code_PEP))
					@foreach($subject_code_PEP as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


								<tr style="font-size: 18px;">

									<td>{{$score_s1->KSubject->name}}</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q1 ==1)
											{{ $score_s1->quarter_1}}	
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q2 ==1)
											{{ $score_s1->quarter_2}}
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q3 ==1)
											{{ $score_s1->quarter_3}}											
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q4 ==1)
											{{ $score_s1->quarter_4}}
										@endif
									</td>

								</tr>

							@endif

						@endforeach

					@endforeach
				@endif

				{{--SOCIAL RESPONSIBILITY-Social and Emotional Development--}}

				<tr>
					<td style="font-weight: Bold; font-size: 18px">SOCIAL RESPONSIBILITY-Social and Emotional Development</td>
				</tr>

				@if(count($subject_code_SRS))
					@foreach($subject_code_SRS as $score_s1)

						@foreach($kgrade as $grades)

							@if($score_s1->k_level_id == $grades->id)


							<tr style="font-size: 18px;">


									<td>{{$score_s1->KSubject->name}}</td>

									<td style="text-align:center">
										@if($score_s1->approve_score_q1 ==1)
											{{ $score_s1->quarter_1}}	
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q2 ==1)
											{{ $score_s1->quarter_2}}
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q3 ==1)
											{{ $score_s1->quarter_3}}											
										@endif
									</td>
									<td style="text-align:center">
										@if($score_s1->approve_score_q4 ==1)
											{{ $score_s1->quarter_4}}
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
						<td style="font-size: 14px; text-align:center" >Y or N</td>
						<td style="font-size: 14px; text-align:center" >Y or N</td>
						<td style="font-size: 14px; text-align:center" >Y or N</td>
					</tr>

					<tr>
						<td style="font-size: 16px">
							This student is on a modified program. (If Yes, see comment)  	
						</td>
						<td style="font-size: 14px; text-align:center" >Y or N</td>
						<td style="font-size: 14px; text-align:center" >Y or N</td>
						<td style="font-size: 14px; text-align:center" >Y or N</td>
						<td style="font-size: 14px; text-align:center" >Y or N</td>
					</tr>

			    <tr>
						<td style="font-size: 16px; font-weight: bold">Days Present</td>
						<td style="font-size: 16px; font-weight:350" contenteditable="true" class="text-center">						
						
				{{-- quarter_1 --}}
						@foreach($subject_code_PPI as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_1 && $score_s1->approve_score_q1==1)
								
									@if ($prek_absent_quarter_1>0)
										{{ floor($total_daypresent_1 - $prek_absent_quarter_1) }} / {{ $total_daypresent_1 }}
									@else
										{{ $total_daypresent_1  }} / {{ $total_daypresent_1  }}
									@endif

								@endif
							@endif	
						@endforeach
													
						</td>

						<td class="text-center" style="font-size: 16px" contenteditable="true">
				{{-- quarter_2 --}}
						@foreach($subject_code_PPI as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_2 && $score_s1->approve_score_q2==1)
								
									@if ($prek_absent_quarter_2>0)
										{{ floor($total_daypresent_2 - $prek_absent_quarter_2) }} / {{ $total_daypresent_2 }}
									@else
										{{ $total_daypresent_2  }} / {{ $total_daypresent_2  }}
									@endif

								@endif
							@endif	
						@endforeach
							
						</td>
					


						<td class="text-center" style="font-size: 16px" contenteditable="true">
				{{-- quarter_3 --}}
							@foreach($subject_code_PPI as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_3 && $score_s1->approve_score_q3==1)
								
									@if ($prek_absent_quarter_3>0)
										{{ floor($total_daypresent_3 - $prek_absent_quarter_3) }} / {{ $total_daypresent_3 }}
									@else
										{{ $total_daypresent_3  }} / {{ $total_daypresent_3  }}
									@endif

								@endif
							@endif	
						@endforeach


												
						</td>


						<td class="text-center" style="font-size: 16px" contenteditable="true">
				{{-- quarter_4 --}}
						@foreach($subject_code_PPI as $score_s1)
							@if($loop->first)
								@if ($score_s1->quarter_4 && $score_s1->approve_score_q4==1)
								
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


	@include('admin.student.print.report_card.prek_yearly_report_card_footer')



</page>


<!-- <page size="A4" layout="portrait"></page> -->


	</main>


</body>
</html>







