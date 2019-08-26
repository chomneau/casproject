@extends('admin.admin-layout.main')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      

    </div>
    
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Staff Absent</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          

          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            

                <form role="form" class="form-group" action="{{ route('admin.updateStaff.absent', ['staffAbsent_id'=>$staffAbsent->id, 'admin_id'=>$admin->id, 'staff_id'=>$staff->id]) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                
                 
                      
                    <div class="form-group">
                        <label for="absent" class="col-form-label">Absent Type:</label>
                        <select name="absenttype" id="absenttype" class="form-control " >
                        <option value="{{ $staffAbsent->absent_type}}">{{ $staffAbsent->absent_type}}</option>
                        <option value="Personal">Personal</option>
                        <option value="Sick Leave">Sick Leave</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="number_day" class="col-form-label">Number of Days:</label>
                            <input type="number" name="numberday" class="form-control rounded numberday" value="{{ $staffAbsent->number_day }}" placeholder="0.00" required >
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="from" class="col-form-label">From:</label>
                            <input type="date" name="from" class="form-control rounded from" id="from" value="{{ $staffAbsent->from }}" required >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to" class="col-form-label">To:</label>
                            <input type="date" name="to" class="form-control rounded to" id="to" value="{{$staffAbsent->to}}" 
                                required >
                            </div>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <label for="reason" class="col-form-label">Reason:</label>
                    <input type="text" name="reason" class="form-control rounded reason" id="reason" value="{{$staffAbsent->reason}}" >
                    </div>
                   
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary updateButton" value="Update Absent" >                  
                </div> 
                
              </form>
            </div>
            <div class="col-md-2"></div>
          </div>
          {{-- end row --}}

        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

	

@endsection