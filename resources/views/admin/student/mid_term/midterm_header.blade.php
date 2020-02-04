<div class="container" style="margin-top: 10px">
  <div class="row">
    <div class="col-sm-6 col-md-4" style="padding-left: 20px"  >
                  <img src="{{ asset('uploads/avatar/logo.png')}}" alt="" class="img-rounded img-responsive" width="120" height="120"/>
              </div>
    


              <div class="col-sm-6 col-md-8 text-right " style="margin-top: 5px; padding-right: 30px" >
                  <h4>CAMBODIA ADVENTIST SCHOOL</h4>
                  <h5>MIDTERM</h5>
                  
    </div>

  </div>
  <div class="row" style="margin-top: -25px; font-size: 14px">
    <div class="col-sm-6 col-md-12 text-right" >
      <p><cite title="San Francisco, USA">#419, St. Rada, Phum Tum Nub,<br> Sangkat Phnom Penh Thmey, Khan Sensok,<br> Phnom Penh, Cambodia </cite></p>
                 <p>
                   Tel : (855)12 946 041
                   <br>
                     Email : info@cas.edu.kh
                     <br />
                     
                     <a href="http://cas.edu.kh">website : www.cas.edu.kh
                     </a>
                     <br />
                 </p>

    </div>
  </div>
  
  <div class="row" style="margin-top: -8em;">

    <div class="col-sm-6 col-md-5" style="margin-left: -30px">

      
      <div class="table-responsive" style="margin-left: 2em">
        <table class="table table-sm table-borderless" >
          
          <tbody >
            <tr style="border: none">
              <th scope="row" style="font-size: 16px">Student Name</th>
              <td>:</td>
              <td>
                <span style="font-size: 16px ">
                  {{ $student->last_name}}, 
                  {{ $student->first_name}}
                </span>
              </td>
              
              
              
            </tr>
            <tr>
              <th scope="row" style="font-size: 16px">
                Student ID
              </th>
              <td>:</td>
              <td style="font-size: 16px">
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