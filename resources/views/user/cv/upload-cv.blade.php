
@extends('layouts.app')
@include('layouts.sectionstyle')
@section('content')
    @include('user.headBlank')

    <div class="bootstrap-iso">
        <div class="container" style="margin-top: 1em">
            <div class="row">
                <div class="col-md-3 pull-left">
                    @include('user.userSidebar')
                </div>

                <div class="col-md-9 pull-right">
                    <div class="well bs-component">
                        <div class="bootstrap-iso">
                            <form action="{{ route('user.uploadcvFunction') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <legend style="color: #0b97c4">Upload your CV (file Type: pdf, word only)</legend>
                                <div class="row">
                                    <div class="col-md-9 col-sm-12">
                                        <div class="form-group">
                                            <input type="file" id="BSbtninfo" name="upload" class="form-control" placeholder="upload your CV">

                                            <script>
                                                $('#BSbtninfo').filestyle({
                                                    buttonName : 'btn-info',
                                                    buttonText : ' Select a File'
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">

                                           <Button type="submit" class="btnSubmit" >
                                               <i class="fa fa-upload" aria-hidden="true" style="color: #FFFFFF"></i>
                                           Upload
                                           </Button>
                                        </div>
                                    </div>


                                </div>
                            {{--end row--}}
                            </form>
                        </div>
                    </div>

                    <div class="well bs-component">
                        {{--table--}}
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>CV name</th>
                                <th>upload date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($uploadCv))
                            @foreach($uploadCv as $uploadCvs)
                                <tr>
                                    <td>#</td>
                                    <td>{{ substr($uploadCvs->name,0, 50) }}</td>
                                    <td>{{ $uploadCvs->created_at->format('j-M-Y , g:ia') }}</td>
                                    <td>
                                        <a href="{{ route('user.cv.delete', ['id'=>$uploadCvs->id]) }}">
                                            <span class="btn btn-danger btn-sm">Delete</span>
                                        </a>
                                        {{--<span class="btn btn-success btn-sm">view</span>--}}
                                        <a href="{{ asset('uploads/cv/'.$uploadCvs->name) }}" target="_blank">
                                            <span class="btn btn-default btn-sm">download</span>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{--end table--}}
                    </div>

                </div>
                {{--end col-md-9--}}
                {{--@include('inc.logoSlider')--}}

            </div>
        </div>
    </div>