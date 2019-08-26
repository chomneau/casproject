


<div class="bs-example" >
    <div id="addNewAbsent" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="title">
                        <i class="fa fa-tasks" aria-hidden="true"></i> Add New Absent</h4>
                </div>
                <form action="{{ route('admin.storeStaff.absent', ['admin_id'=>$admin->id, 'staff_id'=>$staff->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" id="absent_id" name="absent_id">
                        
                    <div class="form-group">
                        <label for="absent" class="col-form-label">Absent Type:</label>
                        <select name="absent_type" class="form-control" >
                          <option value="Personal">Personal</option>
                          <option value="Sick Leave">Sick Leave</option>
                        </select>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="number_day" class="col-form-label">Number of Days:</label>
                                <input type="number" name="number_day" class="form-control rounded" id="number_day" placeholder="0.00" required >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="from" class="col-form-label">From:</label>
                                <input type="date" name="from" class="form-control rounded" id="from" required >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to" class="col-form-label">To:</label>
                                <input type="date" name="to" class="form-control rounded" id="to" >
                            </div>
                        </div>
                      </div>
                        
                      <div class="form-group">
                        <label for="reason" class="col-form-label">Reason:</label>
                        <textarea class="form-control" name="reason" id="reason" placeholder="Enter the reason..."></textarea>
                      </div>
                    </div>
                    {{-- end body --}}
                    <div class="modal-footer">
                        <button type="submit" id="save_btn" class="btn btn-primary" >Add Absent</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
