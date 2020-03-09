	<table class="table table-sm">
			<thead>
				<tr>									
					<th colspan="2" class="pull-right" style="margin-right:4em">CUMULATIVE  CREDIT
					<span style="margin-left:10px">
						{{-- @if($score_s1->approve_score_q1==1 && $score_s1->approve_score_q2==1 && $score_s1->approve_score_q3==1 && $score_s1->approve_score_q4==1) --}}
							{{ round($total_credit,2) }}
						{{-- @endif --}}
					</span>	
					</th>
					<th></th>
					
					<th colspan="2" class="pull-right">CUMULATIVE  GPA 
						<span style="margin-left:16px">
								@if($CGPA > 0 )
									{{-- @if($score_s1->approve_score_q1==1 && $score_s1->approve_score_q2==1 && $score_s1->approve_score_q3==1 && $score_s1->approve_score_q4==1) --}}
									{{ round($CGPA, 2)}}
									{{-- @endif --}}
								@else
									<span>0.00</span>
								@endif
						</span>	
					</th>
				</tr>
			</thead>
	</table>