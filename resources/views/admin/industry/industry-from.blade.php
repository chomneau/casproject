<div class="bs-example" >
    <div id="add-category" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-tasks" aria-hidden="true"></i> Add a new industry type</h4>
                </div>
                <form action="{{ route('industry.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="text" name="industryType" class="form-control" placeholder="add industry type here" required autofocus>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add industry type</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>