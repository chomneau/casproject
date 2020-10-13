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
                            <h2>Upload Student Grade File</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form role="form" class="form-group" action="{{ route('teacher.gradefile.post',['teacher_id'=>$teacher->id]) }}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <section>
                                        <div class="wizard">

                                            <div class="tab-content">
                                                <div class="tab-pane active" role="tabpanel" id="step1">
                                                    

                                                  <div class="step1" style="margin-top: -30px">
                                                    <div class="row">
                                                        <div class="col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                                                            <label for="title">Student Grade file Title</label>
                                                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" autofocus id="title" placeholder="Title">
                                                        </div>
                                                        <div class="col-md-12 {{ $errors->has('description') ? ' has-error' : '' }}" style="margin-top: 20px">
                                                            <label for="description">Description</label>
                                                            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                                        </div>



                                                        <div class="col-md-12 {{ $errors->has('grade_id') ? ' has-error' : '' }}" style="top:15px;left: 10px;padding-right: 18px;padding-left: 0px;">
                                                            <label for="grade">Select Grade</label>
                                                            <select name="gradeProfile" id="" class="form-control" required>
                                                                <option value="">--select grade--</option>
                                                                @if(count($gradeProfile))
                                                                    @foreach($gradeProfile as $grades)
                                                                        <option value="{{ $grades->id }} ">{{ $grades->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>



                                                        <div class="col-md-12 {{ $errors->has('file_name') ? ' has-error' : '' }}" style="margin-top: 20px">
                                                            <label for="logo">Upload Student Grade File Document(optional)</label>
                                                            <input type="file" name="file_name" class="form-control" value="{{ old('file_name') }}" autofocus placeholder="assignment file" >
                                                        </div>
                                                    </div>

                                                  </div>


                                                    <ul class="list-inline pull-right">
                                                        <li><button type="submit" class="btn btn-primary" style=" margin-top: 10px;margin-right: -5px">Upload Now</button></li>
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