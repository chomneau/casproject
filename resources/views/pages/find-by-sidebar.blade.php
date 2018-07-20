<div class="col-md-3 col-sm-12 pull-left">
    {{--Category--}}
    <div class="bs-component">
        <ul class="list-group">
            <li class="list-group-item text-center text-uppercase" style="background-color: #F8F4F4">
                <a href="">
                    <strong>Job by Categories</strong></a>
            </li>

                @if(count($countCategory))
                    @foreach($countCategory as $countCategories)
                        <a href="{{ route('jobByCategory', ['id'=>$countCategories->id]) }}">
                            <li class="list-group-item" style="font-size: 16px; padding-bottom: 15px; padding-top: 15px">
                                {{ $countCategories->name }}
                                <span class="badge">
                                    {{ $countCategories->job_count }}
                                </span>
                            </li>
                        </a>
                    @endforeach
                @endif


            <li class="list-group-item text-center text-uppercase" >
                <a href="{{ route('allCategory', ['id'=>$countCategories->id]) }}"><strong>View more</strong>  <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>

    {{--Job by Industry--}}
    <div class="bs-component">
        <ul class="list-group">
            <li class="list-group-item text-center text-uppercase" style="background-color: #F8F4F4">
                <a href="#"><strong>Job by industry</strong></a>
            </li>
            @if(count($industryType))
                @foreach($industryType as $countIndustries)
                    <a href="{{ route('jobByIndustry', ['id'=>$countIndustries->id]) }}">
                        <li class="list-group-item" style="font-size: 16px; padding-bottom: 15px; padding-top: 15px">
                            {{ $countIndustries->name }}
                            <span class="badge">
                                 {{ $countIndustries->company->count() }}
                            </span>
                        </li>
                    </a>
                @endforeach
            @endif
            <li class="list-group-item text-center text-uppercase" >
                <a href="{{ route('allIndustry', ['id'=>$countIndustries->id]) }}"><strong>View more</strong>  <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>

    {{--Job by Location--}}
    <div class="bs-component">
        <ul class="list-group">
            <li class="list-group-item text-center text-uppercase" style="background-color: #F8F4F4">
                <a href="#"><strong>Job by location</strong></a>
            </li>
            @if(count($locationCount))
                @foreach($locationCount as $locationCounts)
                    <a href="{{ route('jobByLocation', ['id'=>$locationCounts->id]) }}">
                        <li class="list-group-item" style="font-size: 16px; padding-bottom: 15px; padding-top: 15px">
                            {{ $locationCounts->name }}
                            <span class="badge">
                               {{ $locationCounts->job_count }}
                            </span>
                        </li>
                    </a>
                @endforeach
            @endif
            <li class="list-group-item text-center text-uppercase" >
                <a href="{{ route('allLocation') }}"><strong>View more</strong>  <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>

</div>