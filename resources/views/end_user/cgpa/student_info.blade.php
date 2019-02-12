<!-- school info -->
				<div class="container" style="margin-top: 20px">
					<div class="row">
						<div class="col-sm-6 col-md-4" style="padding-left: 20px"  >
	                        <img src="{{ asset('uploads/avatar/logo.png')}}" alt="" class="img-rounded img-responsive" width="150" height="150"/>
	                    </div>
						


	                    <div class="col-sm-6 col-md-8 text-right " style="margin-top: 10px; padding-right: 30px" >
	                        <h4>CAMBODIA ADVENTIST SCHOOL</h4>
	                        <h5>TRANSCRIPT OF SECONDARY ACADEMIC</h5>
	                        <h6>INTERNATIONAL PROGRAM</h6>
						</div>

					</div>
					<div class="row" style="margin-top: -18px">
						<div class="col-sm-6 col-md-12 text-right" >
							<title="San Francisco, USA">#419, St. Rada, Phum Tum Nub,<br> Sangkat Phnom Penh Thmey, Khan Sensok,<br> Phnom Penh, Cambodia <i class="glyphicon glyphicon-map-marker">
			                   </i></cite>
			                   <p>
			                   	<i class="glyphicon glyphicon-gift"></i>Tel : (855)12 946 041
			                   	<br>
			                       <i class="glyphicon glyphicon-envelope"></i>Email : info@cas.edu.kh
			                       <br />
			                       <i class="glyphicon glyphicon-globe"></i>
			                       <a href="https://cas.edu.kh">website : www.cas.edu.kh
			                       </a>
			                       <br />
			                   </p>

						</div>
					</div>
					
					<div class="row" style="margin-top: -6em;">

						<div class="col-sm-6 col-md-6" style="margin-left: -35px">

							
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
							        <th scope="row">Sex</th>
							        <td>:</td>
							        <td>
							        	{{ $student->gender}} 				
									</td>     
							        
							      </tr>

							      <tr>
							        <th scope="row">Nationality</th>
							        <td>:</td>
							        <td>
							        	{{ $student->nationality}} 				
									</td>     
							        
							      </tr>

							      <tr>
							        <th scope="row">
							        	Date of Birth
							        </th>
							        <td>:</td>
							        <td>
							        	<?php 

							        		$date = strtotime($student->date_of_birth);

											echo $newformat = date('d-M-Y', $date);
							        	 ?>
							        </td>
							      </tr>
							      

							      <tr>
							        <th scope="row">Student ID</th>
							        <td>:</td>
							        <td>
							        	{{ $student->card_id}}
							        	
									</td>     
							        
							      </tr>

							      <tr>
							        <th scope="row">Progressive Book ID</th>
							        <td>:</td>
							        <td>
							        	{{ $student->progressive_book_id }}	
									</td>     
							      </tr>

							      

							      

							      <tr>
							        <th scope="row">
							        	Admission Date
							        </th>
							        <td>:</td>
							        <td >
							        	{{ date('d-M-Y', strtotime($student->start_date)) }}
											</td>
							        							        
							      </tr>
							      <tr>
							        <th scope="row">
							        	Completion Date
							        </th>
							        <td>:</td>
							        <td >{{ date_format($student->updated_at, 'd-M-Y')  }}</td>
							        
							        
							      </tr>
							    </tbody>
							  </table>
							</div>


						</div>	
          
	                    <!-- Split button -->
	               
                    </div>
					

				</div>
       

			<!-- student info -->

			</div>