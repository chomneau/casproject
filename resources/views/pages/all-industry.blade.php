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

            <div class="col-md-8 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" style="font-size: 18px; ;color: #8d9193 ">Browse Jobs by industries</div>
                    <div class="row" style="margin-top: 20px; margin-right: 20px; margin-left: 20px">
                        @if(count($industryType))
                            @foreach($industryType as $industryTypes)
                                <div class="col-md-6"  style="padding-top: -50px">
                                    <div class="bs-component">

                                        <ul class="list-group">
                                            <a href="{{ route('jobByIndustry', ['id'=>$industryTypes->id]) }}">
                                                <li class="list-group-item" style="font-size: 16px; padding-bottom: 15px; padding-top: 15px">
                                                    {{ $industryTypes->name }}
                                                    <span class="badge">
                                                        {{ $industryTypes->company->count() }}
                                                    </span>
                                                </li>
                                            </a>
                                        </ul>



                                    </div>
                                </div>
                            @endforeach

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
