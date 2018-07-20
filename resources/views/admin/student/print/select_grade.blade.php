<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cas.edu.kh</title>
	<!-- <link rel="stylesheet" href="css.css"> -->

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

	<!-- awesom font -->

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


	<style>
		body {
            background: rgb(204,204,204); 
            }
            page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
            }
            page[size="A4"] {  
            width: 21cm;
            height: 29.7cm; 
            }
            page[size="A4"][layout="portrait"] {
            width: 29.7cm;
            height: 21cm;  
            }

            @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        }
	</style>

</head>
<body>

<page size="A4">

	<div class="container">
		<div class="row" >
			<!-- school info -->
				<div class="container" style="margin-top: 20px">
					<div class="row">
						<div class="col-sm-6 col-md-4" style="padding-left: 20px"  >
	                        <img src="{{ asset('uploads/avatar/logo.png')}}" alt="" class="img-rounded img-responsive" width="150" height="150"/>
	                    </div>
						


	                    <div class="col-sm-6 col-md-8 text-right " style="margin-top: 15px; padding-right: 30px" >
	                        <h4>CAMBODIA ADVENTIST SCHOOL</h4>
	                        <h5>TRANSCRIPT OF SECONDARY ACADEMI</h5>
	                        <h6>INTERNATIONAL PROGRAM</h6>
						</div>

					</div>
					<div class="row" style="margin-top: -20px">
						<div class="col-sm-6 col-md-12 text-right" >
							<small><cite title="San Francisco, USA">#419, Rada Road, Phum Pum Nub,<br> Sangkat Phnom Penh Thmey, Khan Sensok,<br> Phnom Penh, Cambodia <i class="glyphicon glyphicon-map-marker">
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

						<div class="col-sm-6 col-md-6" style="margin-left: -35px">
							<ul style="list-style: none;">
								<li>Name : <strong>{{ $student->last_name}} {{ $student->first_name}}</strong></li>
								<li>Progressive Book ID : <strong>{{$student->progressive_book_id}}</strong></li>
                                <li>Date of Birth : <strong>{{ $student->date_of_birth }}</strong></li>
                                <li>Admission Date: <strong>{{ $student->created_at->format('M d, Y') }}</strong></li>
                                <li>Completion Date: Jan 16, 2018</li>

							</ul>
						</div>	
          
	                    <!-- Split button -->
	               
                    </div>
					

				</div>
       
                    


			<!-- student info -->

			</div>

			<div class="row">

			<div class="col-md-6 ">

				
			<table class="table">
				<!--Table head-->
				<h6><span class="badge badge-primary badge-pill">1</span> First Semester : 2013 - 2014</h6>
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

			    	@if(count($score))
			    	@foreach($score as $scores)
			        <tr>
			            
			            <td>{{$scores->subject->name}}</td>
			            <td>{{ $scores->subject->credit}}</td>
			            <td> 

			            	{{ $scores->gpa_quarter_1 }}
							<!-- {{ ($scores->quarter_1 += $scores->quarter_2)/2 }} -->

							<!-- <?php
			            	$GPA = ($scores->quarter_1 += $scores->quarter_2)/2;
			            	if($GPA >= 93 && $GPA <=100){			           
			            		echo "A";
			            	}elseif ($GPA >= 90 && $GPA <=92 ) {
			            		echo "A-";			            	
			            	}elseif ($GPA >= 87 && $GPA <=89 ) {
			            		echo "B+";			            	
			            	}elseif ($GPA >= 83 && $GPA <=86 ) {
			            		echo "B";			            
			            	}elseif ($GPA >= 80 && $GPA <=82 ) {
			            		echo "B-";
			            	}elseif ($GPA >= 77 && $GPA <=79 ) {
			            		echo "C+";
			            	}elseif ($GPA >= 73 && $GPA <=76 ) {
			            		echo "C";
			            	}elseif ($GPA >= 70 && $GPA <=72 ) {
			            		echo "C-";
			            	}elseif ($GPA >= 67 && $GPA <=69 ) {
			            		echo "D+";
			            	}elseif ($GPA >= 63 && $GPA <=66 ) {
			            		echo "D";
			            	}elseif ($GPA >= 60 && $GPA <=62 ) {
			            		echo "D-";
			            	}elseif ($GPA >= 0 && $GPA <=59 ) {
			            		echo "F";
			            	}

							
			            	
			            	?> -->
			             



			            </td>
			            <td>
							<?php 

							if( $scores->gpa_quarter_1 === "A" ){

								echo $scores->Subject->credit*4;

							}elseif ($scores->gpa_quarter_1 === "A-") {

								echo $scores->Subject->credit*3.7;

							}elseif ($scores->gpa_quarter_1 === "B+") {

								echo $scores->Subject->credit*3.3;

							}elseif ($scores->gpa_quarter_1 === "B") {

								echo $scores->Subject->credit*3.0;

							}elseif ($scores->gpa_quarter_1 === "B-") {

								echo $scores->Subject->credit*2.7;

							}elseif ($scores->gpa_quarter_1 === "C+") {

								echo $scores->Subject->credit*2.3;

							}elseif ($scores->gpa_quarter_1 === "C") {

								echo $scores->Subject->credit*2.0;

							}elseif ($scores->gpa_quarter_1 === "C-") {

								echo $scores->Subject->credit*1.7;

							}elseif ($scores->gpa_quarter_1 === "D+") {

								echo $scores->Subject->credit*1.3;

							}elseif ($scores->gpa_quarter_1 === "D") {

								echo $scores->Subject->credit*1.0;

							}elseif ($scores->gpa_quarter_1 === "D-") {

								echo $scores->Subject->credit*0.7;

							}elseif ($scores->gpa_quarter_1 === "F") {

								echo $scores->Subject->credit*0.0;

							}


							?>
							
			            </td>
			        </tr>
			        
			        @endforeach
			        @endif

			        

			        
			    </tbody>
			    <!--Table body-->

			</table>
			<!--Table-->



			
		</div>


		<div class="col-md-6 ">

				
			<table class="table">
				<!--Table head-->
				<h6><span class="badge badge-primary badge-pill">2</span> Second Semester : 2013 - 2014</h6>
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
			        <tr>
			            
			            <td>English</td>
			            <td>0.50</td>
			            <td>A-</td>
			            <td>1.85</td>
			        </tr>
			        <tr>
			            
			            <td>Physic</td>
			            <td>0.50</td>
			            <td>A-</td>
			            <td>1.85</td>
			        </tr>
			        <tr>
			            
			            <td>Geo</td>
			            <td>0.50</td>
			            <td>A-</td>
			            <td>1.85</td>
			        </tr>
			        <tr>
			            
			            <td>History</td>
			            <td>0.50</td>
			            <td>A-</td>
			            <td>1.85</td>
			        </tr>
			    </tbody>
			    <!--Table body-->

			</table>
			<!--Table-->



			</div>
		</div>
	</div>
	<!--Table-->



</page>


<!-- <page size="A4" layout="portrait"></page> -->


	
</body>
</html>




