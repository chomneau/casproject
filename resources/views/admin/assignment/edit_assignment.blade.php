@extends('admin.admin-layout.main')
@section('content')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">

            </div>
        </div>
        <div class="clearfix"></div>


        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Upload Assignment</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form role="form" class="form-group" action="{{ route('teacher.assignment.update',['teacher_id'=>$teacher->id, 'assignment_id'=>$assignments->id]) }}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <section>
                                        <div class="wizard">

                                            <div class="tab-content">
                                                <div class="tab-pane active" role="tabpanel" id="step1">
                                                    @include('admin.assignment.edit_assignment_form')

                                                    <ul class="list-inline pull-right">
                                                        <li><button type="submit" class="btn btn-primary" style=" margin-top: 10px;margin-right: -5px">Post</button></li>
                                                    </ul>
                                                </div>

                                                {{--end step 4--}}
                                                <div class="clearfix"></div>
                                            </div>
                                            {{--<input type="submit" name="submit">--}}

                                            @include('admin.inc.formError')
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
@endsection