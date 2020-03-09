@include('admin.student.print.header_style')
<body class="d-flex flex-column" style="min-height: 100vh">
	<main class="flex-fill">

		<page size="A4">

			<div class="container">
				<div class="row" >
		<!-- school info -->
				@include('admin.student.print.student_info')

		<!-- include grade 9 -->

				@include('admin.student.print.cgpa.transcript_by_grade_template.template_grade_9')

		<!-- include grade 10 -->
				@include('admin.student.print.cgpa.transcript_by_grade_template.template_grade_10')
				
		<!-- include cumulative template -->
			
			<table class="table table-sm">
				<thead>
					<tr>									
						<th colspan="2" class="pull-right" style="margin-right:4em">CUMULATIVE  CREDIT
						<span style="margin-left:10px">
							@foreach($score_grade_10 as $score_s1)
								@if($score_s1->approve_score_q1==1 && $score_s1->approve_score_q2 == 1 && $score_s1->approve_score_q3==1 && $score_s1->approve_score_q4==1)
									{{ round($total_credit,2) }}
								@endif
							@endforeach
						</span>	
						</th>
						<th></th>
						
						<th colspan="2" class="pull-right">CUMULATIVE  GPA 
							<span style="margin-left:16px">
									@if($CGPA > 0 )
										@foreach($score_grade_10 as $score_s1)
											@if($score_s1->approve_score_q1==1 && $score_s1->approve_score_q2==1 && $score_s1->approve_score_q3==1 && $score_s1->approve_score_q4==1)
											{{ round($CGPA, 2)}}
											@endif
										@endforeach	
									@else
										<span>0.00</span>
									@endif
							</span>	
						</th>
					</tr>
				</thead>
			</table>	
			
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




