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
						<td style="font-size: 12px; font-weight:350" class="text-center">
						
					

								{{ $total_daypresent_1-$prek_absent_quarter_1 }} /  {{$total_daypresent_1}}

						
													
						</td>

						<td class="text-center" style="font-size: 12px">
							
						{{ $total_daypresent_2-$prek_absent_quarter_2 }} / {{ $total_daypresent_2 }}
						</td>
					


						<td class="text-center" style="font-size: 12px">
						{{ $total_daypresent_3-$prek_absent_quarter_3 }} / {{ $total_daypresent_3 }}

												
						</td>


						<td class="text-center" style="font-size: 12px" >
					
							{{ $total_daypresent_4-$prek_absent_quarter_4 }} / {{$total_daypresent_4}}

							
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







