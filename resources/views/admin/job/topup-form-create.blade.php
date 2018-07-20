<div class="bs-example" >
    <div id="post-smallModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="title">
                        <i class="fa fa-tasks" aria-hidden="true"></i> Post a new Job</h4>
                </div>
                <form action="{{ route('createjob.postjob', ['id'=>$company->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                @include('admin.job.components.job-description')
                                @include('admin.job.components.job-detail')
                                @include('admin.job.components.job-preferred-candidate')
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer" style="margin-bottom: 3em">
                        <button type="submit" class="btn btn-primary" >Post Now</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>