


@extends('layouts.app')

@section('content')
    @include('user.headBlank')
    <div class="container" style="margin-top: 1em">
        <div class="row">
            <div class="col-md-3 pull-left">
                @include('user.userSidebar')
            </div>

            <div class="col-md-9 pull-right">
                {!! Form::open(['action' => 'PagesController@store', 'class'=>'form-horizontal']) !!}
                    {{ Form::label('email', 'Email', ['class' => 'awesome'])  }}
                    {{ Form::text('email', '', ['placeholder'=>'email'] )  }}
                {!! Form::close() !!}
            </div>

            @include('inc.logoSlider')



        </div>
    </div>



@endsection
