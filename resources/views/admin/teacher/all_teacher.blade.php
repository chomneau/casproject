@extends('admin.admin-layout.main')
@section('content')

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Teacher's Contact</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

			<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        
                      </div>

                      <div class="clearfix"></div>

				<div class="row">
					@foreach($teacher as $teachers)
						

                      <div class="col-md-6 col-sm-6 col-xs-12 profile_details" style="padding-left: 15px">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            
                            <div class="left col-xs-6">
                            	<table class="table borderless" >
                            	<tbody>
                              		<h2>{{ $teachers->first_name }} {{ $teachers->last_name }}</h2>
                              	</tbody>
                              	<tr>
                              		<td>Date of Birth</td>
                              		<td> :</td>
                              		<td>{{ $teachers->date_of_birth }}</td>

                              	</tr>
                              	<tr>
                              		<td>Gender</td>
                              		<td> :</td>
                              		<td>{{ $teachers->gender}}</td>

                              	</tr>
                              	<tr>
                              		<td>Position</td>
                              		<td> :</td>
                              		<td>{{ $teachers->position}}</td>

                              	</tr>
                                <tr>
                                  <td>Degree</td>
                                  <td> :</td>
                                  <td>{{ $teachers->degree}}</td>

                                </tr>

                                <tr>
                                  <td>Homeroom Teacher for</td>
                                  <td> :</td>
                                  <td>
                                      @foreach($gradeProfile as $gradeProfiles)

                                        @if($teachers->grade_profile_id == $gradeProfiles->id)

                                          {{ $gradeProfiles->name }}

                                        @endif

                                      @endforeach 



                                          {{ $teachers->grade_profile_id }}


                                        

                                      


                                      
                                    </td>

                                </tr>

                              	<tr>
                              		<td style="border-bottom: 0 ">Phone</td>
                              		<td> :</td>
                              		<td>{{ $teachers->phone}}</td>

                              	</tr>

                              	<tr>
                              		<td >Email</td>
                              		<td> :</td>
                              		<td>{{ $teachers->email}}</td>

                              	</tr>

                              </table>
                            </div>
                            <div class="right col-xs-5 text-center pull-right" style="margin-top: 30px;">
                              <img src="{{ asset($teachers->photo) }}" alt="" class="img-circle" width="150" height="150" style="margin-left: 10px">
                            </div>
                            
                          </div>

                          <div class="col-xs-12 bottom text-center">
                            
                            <div class="col-xs-12 col-sm-6 emphasis pull-right">
                              <a href="{{ route('teacher.edit', ['admin_id'=>Auth()->user()->id, 'teacher_id'=>$teachers->id]) }}" type="button" class="btn btn-success btn-dm"> update profile </a>
                              <!-- <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button> -->
                            </div>
                          </div>

                        </div>
                      </div>

                    @endforeach  
					</div>
                      

                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->




	

		

	

@endsection