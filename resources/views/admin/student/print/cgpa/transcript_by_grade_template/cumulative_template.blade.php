	<table class="table table-sm">
			<thead>
				<tr>									
					<th colspan="2" class="pull-right" style="margin-right:4em">CUMULATIVE  CREDIT
					<span style="margin-left:10px">
						{{ round($total_credit,2) }}
					</span>	
					</th>
					<th></th>
					
					<th colspan="2" class="pull-right">CUMULATIVE  GPA 
						<span style="margin-left:16px">
								@if($CGPA > 0 )
									{{ round($CGPA, 2)}}
								@else
									<span>0.00</span>
								@endif
						</span>	
					</th>
				</tr>
			</thead>
	</table>