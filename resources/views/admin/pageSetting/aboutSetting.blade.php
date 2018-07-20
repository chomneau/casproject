
{{--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>--}}
{{--<script>--}}
    {{--tinymce.init({ selector:'textarea',--}}
        {{--//  plugins: "link",--}}
        {{--menu: 'disable',--}}
        {{--plugins: "lists",--}}
        {{--toolbar: "numlist bullist",--}}
        {{--//plugin:"advlist",--}}
        {{--browser_spellcheck: true,--}}
    {{--});--}}
{{--</script>--}}


@extends('admin.admin-layout.main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <form role="form" class="form-group" action="{{ route('about.pageSetting') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="panel col-md-8 col-md-offset-2">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>About</h3>
                            </div>
                        </div>
                        <div class="col-md-12 {{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label for="logo">About Photo ( photo )</label>
                            <input type="file" name="photo" class="form-control" value="" placeholder="photo">
                        </div>




                        <div class="col-md-12 {{ $errors->has('Title') ? ' has-error' : '' }}" style="margin-bottom: 20px">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="address" class="form-control" value="" required autofocus placeholder="Title">
                            @if ($errors->has('Title'))
                                <span class="help-block">
                                <strong>{{ $errors->first('Title') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="col-md-12 {{ $errors->has('des') ? ' has-error' : '' }}" style="margin-bottom: 20px">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea type="text" name="about" class="form-control" placeholder="Description">

                            </textarea>
                            @if ($errors->has('about'))
                                <span class="help-block">
                                <strong>{{ $errors->first('about') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="col-md-12 " style="margin-bottom: 50px">
                            <button class="btn btn-success">

                                Save
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection