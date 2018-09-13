                

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>K and Pre-K</h2>
                    <div class="clearfix"></div>
                  </div>
                    
                    <form action="{{ route('prek.printview', ['student_id'=>$students->id]) }}">
                        <div class="x_content">

                            <div class="form-group">
                                <div class="tab-pane active" id="home">                              

                                        @if(count($kgrade))
                                            @foreach($kgrade as $kgrades)
                                                
                                                <div class="checkbox">
                                                    <label>
                                                      <input type="radio" name="kgrade[]" class="flat" 
                                                      value="{{ $kgrades->id }}"> {{ $kgrades->name }}
                                                    </label>
                                                </div>

                                            @endforeach
                                            
                                        @endif

                                </div>

                                <div class="pull-right">
                                    <input type="submit" value="print view" class="btn btn-default btn-sm">
                                </div>

                            </div> 
      
                        </div>
                    </form>    

                </div>

            </div>
            
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Primary and Secondary</h2>
                    <div class="clearfix"></div>
                  </div>
                    <form action="{{ route('secondaryschool.printview', ['student_id'=>$students->id]) }}">

                        <div class="tab-content">
                            <div class="tab-pane active" id="home">

                                @if(count($secondaryGrade))
                                    @foreach($secondaryGrade as $secondaryGrades)

                                        
                                        <div class="checkbox">
                                            <label>
                                              <input type="radio" name="secondaryGrade[]" class="flat" 
                                              value="{{$secondaryGrades->id}}"> {{$secondaryGrades->name}}

                                            </label>
                                        </div>
                                        

                                    @endforeach
                                    
                                @endif

                            </div>

                            <div class="pull-right">
                                <input type="submit" value="print view" class="btn btn-primary btn-sm">
                            </div>

                        </div>
                     <!-- end form -->
                     </form>

                </div>
            </div>


            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Yearly report for High School</h2>
                    <div class="clearfix"></div>
                  </div>



                  <form action="{{ route('yearlyReport.highSchool', ['student_id'=>$students->id]) }}" method="get">

                    {{csrf_field()}}
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">

                            @if(count($grade))
                                @foreach($grade as $grades)

                                    
                                    <div class="checkbox">
                                        <label>
                                          <input type="radio" name="grade[]" class="flat" value="{{$grades->id}}"> 

                                          {{ $grades->grade_name }}

                                        </label>
                                    </div>
                                    

                                @endforeach
                                
                            @endif

                        </div>

                        <div class="pull-right">
                            <input type="submit" value="print view" class="btn btn-success btn-sm">
                        </div>

                    </div> 
                    
                </from>

                </div>
            </div>  


    






