
@extends('layouts.app')

@section('content')
@include('user.headBlank')
<div class="container" style="margin-top: 1em">
    <div class="row">
        <div class="col-md-3 pull-left">
            @include('user.userSidebar')
        </div>
        {{--@include('inc.message')--}}
        <div class="col-md-9 pull-right">
            {{--start show--}}
            <div class="well bs-component">
                {{--<form class="form-horizontal" action="home/profile" method="post">--}}

                <!-- {!! Form::open( ['action' => 'ProfileController@store', 'class'=>'form-horizontal']) !!} -->
                <fieldset>
                    <legend>MY PROFILE</legend>

                        <div class="row">
                            {{--Left side--}}
                            <div class="col-md-4 col-sm-12">
                                <div class="panel-body" >
                                    <ul id="item-list-display">

                                        <li style="font-size: 22px">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                {{ $user->studentProfile->first_name }} {{ $user->studentProfile->last_name }}
                                        </li>
                                        <li class="list-style">
                                                Sex : <span style="padding-left: 10px">{{ $user->studentProfile->sex }}</span>
                                        </li>
                                        <li class="item-list" >
                                                DOB : <span style="padding-left: 6px">{{ date('M j, Y', strtotime($user->studentProfile->date_of_birth)) }}</span>

                                                ({{ floor((time() - strtotime($user->studentProfile->date_of_birth)) / 31556926) }} years old)
                                        </li>
                                        <li class="item-list" >
                                            Nationality :  {{$user->studentProfile->nationality}}
                                        </li>

                                    </ul>
                                </div>

                            </div>
                            <div class="col-md-2 col-sm-12"></div>
                            {{--Right side--}}
                            <div class="col-md-4 col-sm-12">
                                <div class="panel-body" >
                                    <ul id="item-list-display" style="padding-left: 5px; width:350px ">

                                        <li style="font-size: 22px">
                                            <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                            Contact
                                        </li>
                                        <li>
                                            <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>
                                            <span style="padding-left: 13px">{{$user->studentProfile->phone}}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <span style="padding-left: 10px">{{$user->email}}</span>

                                        </li>
                                        <li>
                                            <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                            <span style="padding-left: 10px">{{$user->studentProfile->address}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>


                </fieldset>

                    


                {{--CV and COVER LETER--}}
                <fieldset>
                <legend>STUDENT SCORE RECORD</legend>
                <div class="row">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Grade</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                       
                        </tbody>
                    </table>
                    {{--end table--}}
                    </div>

                </fieldset>
            </div>


            {{--@component('components.who')--}}
            {{--@endcomponent--}}
            {{--end show--}}
        </div>
        {{--@include('inc.logoSlider')--}}
    </div>
</div>



@endsection
