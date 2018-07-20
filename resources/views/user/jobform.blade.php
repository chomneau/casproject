

@extends('layouts.app')

@section('content')
    @include('user.headBlank')
    <div class="container" style="margin-top: 1em">
        <div class="row">
            <div class="col-md-3 pull-left">
                @include('user.userSidebar')
            </div>

            <div class="col-md-9 pull-right">

                <div class="well bs-component" style="margin-bottom: 2em">
                    {!!Form::open(['action' => 'HomeController@createjob','method' => 'POST'])!!}
                    <h3>Create Job</h3>
                    {{Form::bsText('title','',['placeholder' => 'Job Title'])}}
                    {{Form::bsTextArea('des','',['placeholder' => 'Job Description'])}}

                    {{Form::bsSubmit('submit', ['class'=>'btn btn-primary pull-right'])}}

                    {!! Form::close() !!}

                </div>

            </div>

            @include('inc.logoSlider')



        </div>
    </div>



@endsection

