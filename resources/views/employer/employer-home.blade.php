
@extends('layouts.app')

@section('content')
    @include('user.headBlank')
    <div class="container" style="margin-top: 1em">
        <div class="row">
            <div class="col-md-3 pull-left">
                @include('employer.employerSidebar')
            </div>
            {{--@include('inc.message')--}}
            <div class="col-md-9 pull-right">
                {{--start show--}}
                <div class="well bs-component">
                    {{--<form class="form-horizontal" action="home/profile" method="post">--}}

                    {!! Form::open( ['action' => 'ProfileController@store', 'class'=>'form-horizontal']) !!}
                    <fieldset>
                        <legend>COMPANY PROFILE</legend>
                        <div class="container">
                            <div class="row">
                                {{--Left side--}}
                                <div class="col-lg-4 col-sm-12">
                                    <div class="panel-body" >
                                        <ul id="item-list-display">

                                            <li style="font-size: 22px">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                               Company :  {{ $employer->company->companyName }}
                                            </li>
                                            <li class="list-style">
                                                Email : <span style="padding-left: 10px">{{ $employer->company->email }}</span>
                                            </li>
                                            <li class="item-list" >
                                                Created date : <span style="padding-left: 6px">{{ date('M j, Y', strtotime($employer->company->created_at)) }}</span>
                                                {{--Sample : {{ Carbon::now()->subSeconds($user->profile->created_at)->diffForHumans() }}--}}

                                            </li>
                                            <li class="item-list" >
                                                Location :  {{$employer->company->location_id}}
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                                {{--Right side--}}
                                <div class="col-lg-4 col-sm-12">
                                    <div class="panel-body" >
                                        <ul id="item-list-display" style="padding-left: 5px; ">

                                            <li style="font-size: 22px">
                                                <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                                Contact
                                            </li>
                                            <li>
                                                <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>
                                                <span style="padding-left: 13px">{{$employer->company->phone}}</span>

                                            </li>
                                            <li>

                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                <span style="padding-left: 10px">{{$employer->email}}</span>

                                            </li>
                                            <li>
                                                <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                                <span style="padding-left: 10px">{{$employer->company->address}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <div class="panel-body">
                        <legend>ABOUT COMPANY</legend>
                        <div class="about-me">
                            <p>{!! $employer->company->about !!}</p>

                        </div>
                    </div>



                </div>



                @component('components.who')
                @endcomponent

                {{--end show--}}


            </div>

            @include('inc.logoSlider')



        </div>
    </div>



@endsection
