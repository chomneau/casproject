
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

			
					
						<span class="text-center" style="font-size: 16px; font-weight: 400;" contenteditable="true">
                        	
													{{ $student->updated_at->format('Y') }} - 
	                        {{ $student->updated_at->format('Y')+1 }}
                        			 
                        		
                    	</span> 

				</span>

				</h6>
			    <thead>
			        <tr>
			            
			            <th>Subject</th>
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
					<td style="font-weight: Bold">PERSONAL PLANNING - Intellectual Development</td>
				</tr>

			    	@if(count($subject_code_PPI))
				    	@foreach($subject_code_PPI as $score_s1)

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
					<td style="font-weight: Bold">ENGLISH LANGUAGE ARTS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_ELAI))
					@foreach($subject_code_ELAI as $score_s1)

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
					<td style="font-weight: Bold">KHMER LANGUAGE ARTS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_KLAI))
					@foreach($subject_code_KLAI as $score_s1)

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

				{{--Mathematics-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold">MATHEMATICS - Intellectual Development</td>
				</tr>

				@if(count($subject_code_MI))
					@foreach($subject_code_MI as $score_s1)

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

				{{--SOCIAL STUDIES-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold">SOCIAL STUDIES - Intellectual Development</td>
				</tr>

				@if(count($subject_code_SSI))
					@foreach($subject_code_SSI as $score_s1)

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

				{{--SCIENCE-Intellectual Development--}}

				<tr>
					<td style="font-weight: Bold">SCIENCE - Intellectual Development</td>
				</tr>

				@if(count($subject_code_SI))
					@foreach($subject_code_SI as $score_s1)

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
					<td style="font-weight: Bold">FINE ARTS - Aesthetic and Artistic Development</td>
				</tr>

				@if(count($subject_code_FAA))
					@foreach($subject_code_FAA as $score_s1)

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

				{{--PHYSICAL EDUCATION -Physical Development--}}

				<tr>
					<td style="font-weight: Bold">PHYSICAL EDUCATION - Physical Development</td>
				</tr>

				@if(count($subject_code_PEP))
					@foreach($subject_code_PEP as $score_s1)

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

				{{--SOCIAL RESPONSIBILITY-Social and Emotional Development--}}

				<tr>
					<td style="font-weight: Bold">SOCIAL RESPONSIBILITY-Social and Emotional Development</td>
				</tr>

				@if(count($subject_code_SRS))
					@foreach($subject_code_SRS as $score_s1)

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
					<td></td>
				</tr>

					<tr>
						<td style="font-size: 12px">
							This student is meeting the expected level of development for his/her age range. (If No, see comment)
						</td>
						<td style="font-size: 10.5px" >Y or N</td>
						<td style="font-size: 10.5px" >Y or N</td>
						<td style="font-size: 10.5px" >Y or N</td>
						<td style="font-size: 10.5px" >Y or N</td>
					</tr>

					<tr>
						<td style="font-size: 12px">
							This student is on a modified program. (If Yes, see comment)  	
						</td>
						<td style="font-size: 10.5px" >Y or N</td>
						<td style="font-size: 10.5px" >Y or N</td>
						<td style="font-size: 10.5px" >Y or N</td>
						<td style="font-size: 10.5px" >Y or N</td>
					</tr>

			    <tr>
						<td style="font-size: 12px; font-weight: bold">Days Present</td>
						<td style="font-size: 12px; font-weight:350" contenteditable="true" class="text-center">
						
					

								{{ $total_daypresent_1-$prek_absent_quarter_1 }} /  {{$total_daypresent_1}}

						
													
						</td>

						<td class="text-center" style="font-size: 12px" contenteditable="true">
							
						{{ $total_daypresent_2-$prek_absent_quarter_2 }} / {{ $total_daypresent_2 }}
						</td>
					


						<td class="text-center" style="font-size: 12px" contenteditable="true">
						{{ $total_daypresent_3-$prek_absent_quarter_3 }} / {{ $total_daypresent_3 }}

												
						</td>


						<td class="text-center" style="font-size: 12px" contenteditable="true">
					
							{{ $total_daypresent_4-$prek_absent_quarter_4 }} / {{$total_daypresent_4}}

							
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







