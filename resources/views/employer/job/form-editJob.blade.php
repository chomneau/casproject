
<div class="right_col" role="main">
    <div class="clearfix"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Job <small>Sessions</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('employer.createjob.update', ['id'=>$job->id,'company_id'=>$company->id]) }}" method="post">
                            {{csrf_field()}}

                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="wizard">
                                    <div class="tab-content">
                                        <div class="tab-pane active" role="tabpanel" id="step1" style="margin-top: -25px">
                                            @include('employer.job.components.edit-job-description')
                                            @include('employer.job.components.edit-job-detail')
                                            @include('employer.job.components.edit-job-preferred-candidate')
                                            <hr>
                                            <ul class="list-inline pull-right" style="margin-bottom: 3em">
                                                <li><button type="submit" class="btn btn-primary next-step">update now</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

