<!--Grade 10-->
<div class="row">
  <div class="col-md-6 ">
      <table class="table table-sm">
        <!--Table head-->
        <h6><span class="badge badge-primary badge-pill">1</span> First Semester : 

                    @foreach($score_grade_10 as $score_s1)

                        @if ($loop->first) 
                        
                          <span class="text-center" style="font-size: 16px; font-weight: 400;" contenteditable="true">
                          
                          {{ $score_s1->created_at->format('Y') }} - 
                          {{ $score_s1->created_at->format('Y')+1 }}
                          </span> 

                        @endif

                    @endforeach

                    <span style="color:#5d95ef" class="pull-right">
                    @foreach($score_grade_10 as $score_s1)

                        @if ($loop->first) 
                            {{ $score_s1->grade->grade_name }} 
                        @endif

                    @endforeach

                </span>


        </h6>
          <thead>
              <tr>
                  
                  <th>Subject</th>
                  <th>CRED</th>
                  <th>GRD</th>			            
                  <th>PTS</th>
              </tr>
          </thead>
          <!--Table head-->

          <!--Table body-->
          <tbody>

            @if(count($score_grade_10))
              @foreach($score_grade_10 as $score_s1)

                @foreach($grade as $grades)

                  @if($score_s1->grade_id == $grades->id)                    
                      <tr>                          
                          <td style="font-size: 12px; font-weight: bold">{{$score_s1->Subject->name}}</td>
                          @if($score_s1->approve_score_q1==1 && $score_s1->approve_score_q2==1)
                            <td style="font-size: 12px; font-weight: bold">
                              {{ ($score_s1->Subject->credit)/2}}</td>
                            <td style="font-size: 12px; font-weight: bold"> 
                              {{ $score_s1->gpa_quarter_1 }}                         
                            </td>
                            <td style="font-size: 12px; font-weight: bold">
                              {{ round($score_s1->pts_1,2) }}                     
                            </td>
                          @endif    
                      </tr>

                    @endif

                  @endforeach
                
                @endforeach
              @endif

              <tr>
            <th style="font-size: 12px; font-weight: bold">SEMESTER CREDIT</th>
            <th style="font-size: 12px; font-weight: bold">
              @foreach($score_grade_10 as $score_s1)
                @if ($loop->first) 
                  @if($score_s1->approve_score_q1==1 && $score_s1->approve_score_q2==1)
                    {{ $credit_grade_10 }}
                  @endif
                @endif
              @endforeach
            </th>
            <th style="font-size: 12px; font-weight: bold"> SEMESTER GPA</th>
            <th style="font-size: 12px; font-weight: bold">

            @if($credit_grade_10 <= 0)
              <span>0.00</span>
            @else
              @foreach($score_grade_10 as $score_s1)
                @if ($loop->first) 
                  @if($score_s1->approve_score_q1==1 && $score_s1->approve_score_q2==1)
                    {{ number_format($sum_pts_1_grade_10/$credit_grade_10, 2, '.', '') }}
                  @endif
                @endif  
              @endforeach  
            @endif
            </th>
          </tr>
  
          </tbody>
          <!--Table body-->

      </table>
      <!--Table-->
      
    </div>


    <div class="col-md-6 ">

        
      <table class="table table-sm">
        <!--Table head-->
        <h6><span class="badge badge-primary badge-pill">2</span> Second Semester : 
        
        @foreach($score_grade_10 as $score_s1)

          @if ($loop->first) 
          
            <span class="text-center" style="font-size: 16px; font-weight: 400;" contenteditable="true">
                          
              {{ $score_s1->created_at->format('Y') }} - 
              {{ $score_s1->created_at->format('Y')+1 }}
            </span> 

          @endif

        @endforeach

                <span style="color:#5d95ef" class="pull-right">
                    @foreach($score_grade_10 as $score_s1)

                        @if ($loop->first) 
                            {{ $score_s1->grade->grade_name }} 
                        @endif

                    @endforeach

        </h6>
          <thead>
              <tr>
                  
                  <th>Subject</th>
                  <th>CRED</th>
                  <th>GRD</th>			            
                  <th>PTS</th>
              </tr>
          </thead>
          <!--Table head-->

          <!--Table body-->
          <tbody>
              @if(count($score_grade_10))
              @foreach($score_grade_10 as $score_s1)

                @foreach($grade as $grades)

                  @if($score_s1->grade_id == $grades->id)
                      <tr>                         
                          <td style="font-size: 12px; font-weight: bold">{{$score_s1->Subject->name}}</td>
                          @if($score_s1->approve_score_q3==1 && $score_s1->approve_score_q4==1)
                            <td style="font-size: 12px; font-weight: bold">
                              {{ ($score_s1->Subject->credit)/2 }}</td>
                            <td style="font-size: 12px; font-weight: bold" > 
                              {{ $score_s1->gpa_quarter_2 }}
                            </td>
                            <td style="font-size: 12px; font-weight: bold" >
                              {{ round($score_s1->pts_2,2) }}                     
                            </td>
                          @endif
                          
                      </tr>
                                         
                    @endif

                  @endforeach
                
                @endforeach
              @endif


              <tr>
            <th style="font-size: 12px; font-weight: bold">SEMESTER CREDIT</th>
            <th style="font-size: 12px; font-weight: bold">
              @foreach($score_grade_10 as $score_s1)
                @if ($loop->first) 
                  @if($score_s1->approve_score_q3==1 && $score_s1->approve_score_q4==1)
                    {{ $credit_grade_10 }}
                  @endif
                @endif  
              @endforeach
            </th>



            <th style="font-size: 12px; font-weight: bold">SEMESTER GPA</th>
            <th style="font-size: 12px; font-weight: bold">

            @if($credit_grade_10 <= 0)
              <span>0.00</span>
            @else
              @foreach($score_grade_10 as $score_s1)
              @if ($loop->first) 
                @if($score_s1->approve_score_q3==1 && $score_s1->approve_score_q4==1)
                  {{ number_format($sum_pts_2_grade_10/$credit_grade_10, 2, '.', '') }}
                @endif
              @endif  
              @endforeach  
            @endif
            </th>            
          </tr>
          </tbody>
          <!--Table body-->

      </table>
      <!--Table-->

    </div>
</div>	
<!--------------end grade 10 ---------------->