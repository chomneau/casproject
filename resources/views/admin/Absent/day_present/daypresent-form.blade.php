<div class="bs-example" >
    <div id="add-category" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="title">
                        <i class="fa fa-tasks" aria-hidden="true"></i> Add quarter for day present</h4>
                </div>
                <form action="{{ route('daypresent.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" id="id">
                        <input type="text" name="quarter_name" class="form-control" placeholder="Add a new quarter for day present" required autofocus>
                    </div>

                    <div class="modal-body">
                        <input type="number" name="quarter_day_present" class="form-control" placeholder="Number of day present per quarter" required autofocus>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Add Now</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>