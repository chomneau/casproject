
    
    <div id="EditModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="title">
                        <i class="fa fa-tasks" aria-hidden="true"></i> Update Teacher Absent</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="sample_form" >
                        
                        {{ csrf_field() }}
                        <span id="form_result"></span>
                        <input type="hidden" class="id"  name="id">
                        
                        <div class="form-group">
                            <label for="absent" class="col-form-label">Absent Type:</label>
                            <select name="absenttype" id="absenttype" class="form-control " >
                            <option value="Personal">Personal</option>
                            <option value="Sick Leave">Sick Leave</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="number_day" class="col-form-label">Number of Days:</label>
                                    <input type="text" name="numberday" class="form-control rounded numberday" id="numberday" placeholder="0.00" required >
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="from" class="col-form-label">From:</label>
                                    <input type="text" name="from" class="form-control rounded from" id="from" value="" required >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="to" class="col-form-label">To:</label>
                                    <input type="text" name="to" class="form-control rounded to" id="to" value="" 
                                    required >
                                </div>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="reason" class="col-form-label">Reason:</label>
                            <input type="text" name="reason" class="form-control rounded reason" id="reason" value="" >
                        </div>
                    </form>    
                    </div>
                    {{-- end body --}}
                    <div class="modal-footer">
                        <button type="submit" id="save_btn" class="btn btn-primary updateButton" >Update Absent</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                
            </div>

        </div>
    </div>



