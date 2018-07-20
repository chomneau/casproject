
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Create New job</h3>
        </div>
    </div>
    <div class="clearfix"></div>


    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Wizards <small>Sessions</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form role="form" class="form-group" action="{{ route('createjob.store') }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <section>
                                    <div class="wizard">
                                        <div class="wizard-inner">
                                            <div class="connecting-line"></div>
                                            <ul class="nav nav-tabs" role="tablist">

                                            <li role="presentation" class="active">
                                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                            <span class="round-tab">
                                            <i class="glyphicon glyphicon-folder-open"></i>
                                            </span>
                                            </a>
                                            </li>

                                            <li role="presentation" class="disabled">
                                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                            <span class="round-tab">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            </span>
                                            </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                            <span class="round-tab">
                                            <i class="glyphicon glyphicon-picture"></i>
                                            </span>
                                            </a>
                                            </li>

                                            <li role="presentation" class="disabled">
                                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                            <span class="round-tab">
                                            <i class="glyphicon glyphicon-ok"></i>
                                            </span>
                                            </a>
                                            </li>
                                            </ul>
                                        </div>


                                        <div class="tab-content">
                                            <div class="tab-pane active" role="tabpanel" id="step1">
                                                @include('admin.job.components.edit-job-description')
                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn btn-primary next-step">Next</button></li>
                                                </ul>
                                            </div>

                                            {{--start step 2--}}
                                            <div class="tab-pane" role="tabpanel" id="step2">
                                                @include('admin.job.components.edit-job-detail')
                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                    <li><button type="button" class="btn btn-primary next-step">Next</button></li>
                                                </ul>
                                            </div>
                                            {{--end step 2--}}

                                            {{--start step 3--}}
                                            <div class="tab-pane" role="tabpanel" id="step3">

                                                @include('admin.job.components.job-preferred-candidate')
                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                    <li><input type="submit" name="submit" class="btn btn-primary btn-info-full" value="Finish"></li>

                                                </ul>
                                            </div>

                                            {{--end step 3--}}


                                            {{--start step 4--}}
                                            {{--<div class="tab-pane" role="tabpanel" id="complete">--}}
                                            {{--<div class="step44">--}}
                                            {{--<h5>Completed</h5>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}

                                            {{--end step 4--}}
                                            {{--<div class="clearfix"></div>--}}
                                            {{--</div>--}}
                                            {{--<input type="submit" name="submit">--}}

                                        </div>
                                </section>
                            </div>
                            <div class="col-md-1"></div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>