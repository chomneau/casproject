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
                    <div class="panel-heading text-center" style="font-size: 18px; ;color: #8d9193 ">Browse jobs by categories</div>
                    <div class="row" style="margin-top: 20px; margin-right: 20px; margin-left: 20px">
                        @if(count($allCategory))
                            @foreach($allCategory as $allCategories)
                                <div class="col-md-6"  style="padding-top: -50px">
                                    <div class="bs-component">
                                        <ul class="list-group">
                                            <a href="{{ route('jobByCategory', ['id'=>$allCategories->id]) }}">
                                                <li class="list-group-item" style="font-size: 16px; padding-bottom: 15px; padding-top: 15px">
                                                    {{ $allCategories->name }}
                                                    <span class="badge">
                                                            {{ $allCategories->job_count }}
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
