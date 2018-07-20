
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Company</h3>
        </div>
    </div>
    <div class="clearfix"></div>


    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> <small>Admin area</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form role="form" class="form-group" action="{{ route('company.update', ['id'=>$company->id]) }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <section>
                                    <div class="wizard">

                                        <div class="tab-content">
                                            <div class="tab-pane active" role="tabpanel" id="step1">
                                                @include('admin.company.form.form-edit')
                                                <ul class="list-inline pull-right">
                                                    <li><button type="submit" class="btn btn-primary next-step">Update now</button></li>
                                                </ul>
                                            </div>

                                            {{--end step 4--}}
                                            <div class="clearfix"></div>
                                        </div>
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