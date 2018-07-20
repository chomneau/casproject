{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

@extends('layouts.app')
@section('content')
    @include('inc.search')
    <div class="container" style="margin-top: 2em">
        <div class="row">
            @include('pages.find-by-sidebar')

            {{--Listing job in the right side--}}

            <div class="col-md-9 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-size: 16px; color: #879dbf ">
                        Job by industry
                        {{--<i class="fa fa-chevron-right" style="color:#7190ba " aria-hidden="true"></i>--}}
                        <i class="fa fa-angle-right fa-lg" style="color:#b4b6ba" aria-hidden="true"></i>

                        {{ $jobIndustry->name }}

                    </div>
                    <div class="panel-body">
                        @if(count($jobByIndustry))
                            @foreach($jobByIndustry as $jobByIndustries)
                                <div class="row">

                                    <div class="col-md-2 col-sm-12">
                                        <div style="margin-left: 12px">
                                            <a href="{{ route('singleJob',['id'=>$jobByIndustries->id, 'company_id'=>$jobByIndustries->company->id]) }}">
                                                <img src="{{ asset($jobByIndustries->company->logo) }} " alt="" style=" width: 80px; height: 75px " ></a>
                                        </div>
                                    </div>


                                    <div class="col-md-10 col-sm-12">
                                        <div class="bs-component">
                                            <div class="list-group">
                                                <a href="{{ route('singleJob',['id'=>$jobByIndustries->id, 'company_id'=>$jobByIndustries->company->id]) }}" >
                                                    <p style="font-size: 18px"> {{ $jobByIndustries->jobTitle }}</p>
                                                </a>
                                                <div class=" pull-right" style="margin-top: 0px; margin-right: 10px; color:#C97975">
                                                    <i class="fa fa-calendar-times-o" aria-hidden="true"></i> closing date:
                                                    {{ Carbon\Carbon::createFromTimestamp(strtotime($jobByIndustries->deadLine))->toFormattedDateString()}}
                                                </div>

                                                <a href="#" >
                                                    <p style="font-size: 14px"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                                        {{ $jobByIndustries->company->companyName }}
                                                        <small style="color: #8a92a0">|
                                                            {{ Carbon\Carbon::createFromTimestamp(strtotime($jobByIndustries->created_at))->diffForHumans() }}
                                                        </small>


                                                    </p>
                                                </a>
                                                <hr style="margin-bottom: -3px; margin-top:5px ">

                                                <div class="row">

                                                    <div class="col-md-3 col-sm-12">
                                                        <h5 style="color: #0DC2C9"><i class="fa fa-map-marker" aria-hidden="true"></i>

                                                            {{ $jobByIndustries->location->name }}
                                                        </h5>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        <a href="#" data-toggle="tooltip" title="Deadline!">
                                                            <h5 style="color: #0DC2C9"><i class="fa fa-id-card-o" aria-hidden="true"></i>

                                                                @foreach($countCategory as $countCategories)
                                                                    @if($countCategories->id == $jobByIndustries->category_id)
                                                                        {{ $countCategories->name }}
                                                                    @endif
                                                                @endforeach

                                                            </h5>

                                                            {{--<h5 style="color: #C97975">--}}

                                                                {{--<i class="fa fa-calendar-times-o" aria-hidden="true"></i>--}}

                                                                {{--{{ Carbon\Carbon::createFromTimestamp(strtotime($jobByIndustries->deadLine))->toFormattedDateString()}}--}}
                                                                {{--{{ Carbon\Carbon::createFromTimestamp(strtotime($jobs->deadLine))->addDays(30)->diffForHumans()}}--}}
                                                                {{--{{ Carbon\Carbon::now()->addDays(30)->diffForHumans()}}--}}

                                                            {{--</h5>--}}
                                                        </a>

                                                        <script>
                                                            $(document).ready(function(){
                                                                $('[data-toggle="tooltip"]').tooltip();
                                                            });
                                                        </script>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        {{--<h5 style="color: #0DC2C9"><i class="fa fa-id-card-o" aria-hidden="true"></i>--}}

                                                            {{--@foreach($countCategory as $countCategories)--}}
                                                                {{--@if($countCategories->id == $jobByIndustries->category_id)--}}
                                                                    {{--{{ $countCategories->name }}--}}
                                                                {{--@endif--}}
                                                            {{--@endforeach--}}

                                                        {{--</h5>--}}
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        <h5 style="color: #0DC2C9; margin-left: -30px"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            @foreach($contractType as $contractTypes)
                                                                @if($contractTypes->id == $jobByIndustries->contractType_id)
                                                                    {{ $contractTypes->name }}
                                                                @endif
                                                            @endforeach

                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @else
                            <h3 style="color: #2a85a0">Whooope! We are sorry, there is no job by this industry!</h3>
                            <div style="margin-bottom: 81.5em"></div>
                        @endif
                            <div class="text-right">
                                {!! $jobByIndustry->links() !!}
                            </div>
                        {{--@component('components.who')--}}
                        {{--@endcomponent--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
