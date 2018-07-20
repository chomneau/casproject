<div class="col-md-4 col-sm-12 pull-left">
    {{--Category--}}
    <div class="bs-component">
        <ul class="list-group">
            <li class="list-group-item text-center text-uppercase" style="background-color: #F8F4F4">
                <h4 style="font-weight: bold">
                    <a href="#">Related jobs</a>
                </h4>

            </li>

                <div class="row">
            @if(count($similarJob))
                @foreach($similarJob as $simJob)
                    <a href="{{ route('singleJob',['id'=>$simJob->id, 'company_id'=>$simJob->company->id]) }}" target="_blank">
                     <li class="list-group-item" style="padding-top: 10px;padding-bottom: 6em;padding-left: 0px;margin-left: 15px;right: 0px;left: 0px;padding-right: 0px;margin-right: 15px;" >
                        <div class="col-md-3">
                            <div style="margin-top: 10px; width: 60px; height: 60px">
                                <img src="{{ asset($simJob->company->logo) }} " alt="" style=" max-width: 100%; max-height: 100%" >
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h4 style="color: #0b97c4; margin-bottom:5px; margin-top: 5px; padding-top: 10px ">
                                @if(strlen($simJob->jobTitle)>=18)

                                    {{ substr($simJob->jobTitle, 0, 18) }} ...

                                @else
                                    {{ substr($simJob->jobTitle, 0, 18) }}

                                @endif

                                <i class="pull-right fa fa-chevron-circle-right" aria-hidden="true" style="padding-top: 10px"></i>
                            </h4>

                            <span style="margin-bottom: -5px;  color: #abbbd8;">
                                {{ $simJob->company->companyName }}

                            </span>
                        </div>
                    </li>
                    </a>
                @endforeach
            @endif



                </div>




            <li class="list-group-item text-center text-uppercase" >
                <a href="#"><strong>View more</strong>  <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>


</div>