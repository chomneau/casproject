{{--@include('admin.admin-layout.sectionstyle')--}}



<div class="right_col" role="main">
    <div class="clearfix"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Post a new job <small>Sessions</small></h2>
                        <div class="clearfix"></div>
                    </div>



                    <div class="x_content">
                        <form action="{{ route('employer.createjob.postjob', ['id'=>$company->id]) }}" method="post">
                            {{csrf_field()}}

                            <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="wizard">
                                       <div class="tab-content">
                                           <div class="tab-pane active" role="tabpanel" id="step1" style="margin-top: -25px">
                                               @include('employer.job.components.job-description')
                                               @include('employer.job.components.job-detail')
                                               @include('employer.job.components.job-preferred-candidate')
                                               <ul class="list-inline pull-right">
                                                   <li><button type="submit" class="btn btn-primary next-step">Post now</button></li>
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

