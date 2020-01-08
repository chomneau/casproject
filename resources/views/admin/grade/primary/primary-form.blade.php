<div class="bs-example" >
    <div id="add-category" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="title">
                        <i class="fa fa-tasks" aria-hidden="true"></i> Add a new grade for primary school</h4>
                </div>
                <form action="{{ route('grade.primary.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" id="id">
                        <input type="text" name="grade" class="form-control" placeholder="Add a new grade here" required autofocus>
                        <br>
                        <label for="order">Order Number</label>
                        <input type="number" name="order" id="order" class="form-control" placeholder="Enter order number" required autofocus>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Add Grade</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>