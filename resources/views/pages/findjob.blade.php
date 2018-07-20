{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

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
                    <div class="panel-heading" style="font-size: 18px; ;color: #1b6d85 ">LATEST JOBS</div>
                    <div class="panel-body">
                        @if(count($job))
                            @foreach($job as $jobs)
                                <div class="row">

                                    <div class="col-md-2 col-sm-12">
                                        <div style="margin-left: 12px; width: 80px; height: 75px">
                                            <a href="{{ route('singleJob',['id'=>$jobs->id, 'company_id'=>$jobs->company->id]) }}">
                                                <img src="{{ asset($jobs->company->logo) }} " alt="" style=" max-width: 100%; max-height: 100% " ></a>
                                        </div>
                                    </div>


                                    <div class="col-md-10 col-sm-12">
                                        <div class="bs-component">
                                            <div class="list-group">
                                                <a href="{{ route('singleJob',['id'=>$jobs->id, 'company_id'=>$jobs->company->id]) }}" >
                                                    <p style="font-size: 18px"> {{ $jobs->jobTitle }}</p>
                                                </a>
                                                {{--<button class="mybtn pull-right" style="margin-top: -20px">--}}
                                                    {{--<a href="{{ route('singleJob',['id'=>$jobs->id, 'company_id'=>$jobs->company->id]) }}" >View now</a>--}}
                                                <div class=" pull-right" style="margin-top: 0px;margin-right: 10px; color:#C97975">
                                                    <i class="fa fa-calendar-times-o" aria-hidden="true"></i> closing date:
                                                    {{ Carbon\Carbon::createFromTimestamp(strtotime($jobs->deadLine))->toFormattedDateString()}}
                                                </div>
                                                {{--</button>--}}
                                                <a href="#" >
                                                     <p style="font-size: 14px"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                                        {{ $jobs->company->companyName }}
                                                         <small style="color: #8a92a0">|
                                                         {{ Carbon\Carbon::createFromTimestamp(strtotime($jobs->created_at))->diffForHumans() }}
                                                         </small>


                                                     </p>
                                                </a>
                                                <hr style="margin-bottom: -3px; margin-top:5px ">

                                                    <div class="row">

                                                        <div class="col-md-3 col-sm-12">
                                                            <h5 style="color: #0DC2C9"><i class="fa fa-map-marker" aria-hidden="true"></i>

                                                                {{ $jobs->location->name }}
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            {{----}}
                                                            {{--<a href="#" data-toggle="tooltip" title="Deadline!">--}}
                                                                {{--<h5 style="color: #C97975">--}}
                                                                {{--<i class="fa fa-calendar-times-o" aria-hidden="true"></i> closing date:--}}
                                                                {{--{{ Carbon\Carbon::createFromTimestamp(strtotime($jobs->deadLine))->toFormattedDateString()}}--}}
                                                                {{--{{ Carbon\Carbon::createFromTimestamp(strtotime($jobs->deadLine))->addDays(30)->diffForHumans()}}--}}
                                                                {{--{{ Carbon\Carbon::now()->addDays(30)->diffForHumans()}}--}}

                                                                {{--</h5>--}}
                                                            {{--</a>--}}

                                                            {{--<script>--}}
                                                                {{--$(document).ready(function(){--}}
                                                                    {{--$('[data-toggle="tooltip"]').tooltip();--}}
                                                                {{--});--}}
                                                            {{--</script>--}}
                                                            {{----}}

                                                            <h5 style="color: #0DC2C9; margin-left: 25px"><i class="fa fa-bookmark" aria-hidden="true"></i>

                                                                @foreach($countCategory as $countCategories)
                                                                    @if($countCategories->id == $jobs->category_id)
                                                                        {{ $countCategories->name }}
                                                                    @endif
                                                                @endforeach

                                                            </h5>

                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            {{--<h5 style="color: #0DC2C9; margin-left: 25px"><i class="fa fa-bookmark" aria-hidden="true"></i>--}}

                                                                {{--@foreach($countCategory as $countCategories)--}}
                                                                    {{--@if($countCategories->id == $jobs->category_id)--}}
                                                                        {{--{{ $countCategories->name }}--}}
                                                                    {{--@endif--}}
                                                                {{--@endforeach--}}

                                                            {{--</h5>--}}
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <h5 style="color: #0DC2C9; margin-left: -30px" ><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                @foreach($contractType as $contractTypes)
                                                                    @if($contractTypes->id == $jobs->contractType_id)
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
                                {{--<div style="margin-bottom: 3.5em"></div>--}}
                        @endif
                        <div class="text-right">
                            {!! $job->links() !!}
                        </div>

                            {{--@component('components.who')--}}
                            {{--@endcomponent--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


