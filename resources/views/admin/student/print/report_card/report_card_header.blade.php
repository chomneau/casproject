<div class="container" style="margin-top: 20px">
					<div class="row">
						<div class="col-sm-6 col-md-4" style="padding-left: 20px"  >
	                        <img src="{{ asset('uploads/avatar/logo.png')}}" alt="" class="img-rounded img-responsive" width="150" height="150"/>
	                    </div>
						


	                    <div class="col-sm-6 col-md-8 text-right " style="margin-top: 10px; padding-right: 30px" >
	                        <h4>CAMBODIA ADVENTIST SCHOOL</h4>
	                        <h5>YEARLY REPORT</h5>
	                        
						</div>

					</div>
					<div class="row" style="margin-top: -25px">
						<div class="col-sm-6 col-md-12 text-right" >
							<small><cite title="San Francisco, USA">#419, St. Rada, Phum Tum Nub,<br> Sangkat Phnom Penh Thmey, Khan Sensok,<br> Phnom Penh, Cambodia <i class="glyphicon glyphicon-map-marker">
			                   </i></cite></small>
			                   <p>
			                   	<i class="glyphicon glyphicon-gift"></i>Tel : (855)12 946 041
			                   	<br>
			                       <i class="glyphicon glyphicon-envelope"></i>Email : info@cas.edu.kh
			                       <br />
			                       <i class="glyphicon glyphicon-globe"></i>
			                       <a href="http://cas.edu.kh">website : www.cas.edu.kh
			                       </a>
			                       <br />
			                   </p>

						</div>
					</div>
					
					<div class="row" style="margin-top: -6em;">

						<div class="col-sm-6 col-md-5" style="margin-left: -35px">

							
							<div class="table-responsive" style="margin-left: 2em">
							  <table class="table table-sm table-borderless">
							    
							    <tbody>
							      <tr>
							        <th scope="row">Student Name</th>
							        <td>:</td>
							        <td>
							        	{{ $student->last_name}}, 
										{{ $student->first_name}}
									</td>
							        
							        
							        
							      </tr>
							      <tr>
							        <th scope="row">
							        	Student ID
							        </th>
							        <td>:</td>
							        <td>
							        	{{ $student->card_id }}
							        </td>
							        
							        
							      </tr>
							      
							      
							    </tbody>
							  </table>
							</div>


						</div>	
          
	                    <!-- Split button -->
	        </div>
					
				</div>