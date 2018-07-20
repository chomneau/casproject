
<div class="well bs-component">

    {{--<form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">--}}
        {{csrf_field()}}
        <fieldset>
            <legend>MY RESUME</legend>
            <div class="panel-body">
                <div class="view-cv">
                    <p> {!! Auth::user()->profile->bio !!} </p>
                </div>

                <div class="panel-body">
                <legend>
                    EXPERIENCES
                    <span class="small" style="margin-right: 2em" >
                        <a href="#" class="pull-right" data-toggle="modal" data-target="#squarespaceModal">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Add Experience
                        </a>
                    </span>
                </legend>

                    <div class="row">
                        @if(count($experience))
                            @foreach($experience as $exper)
                        <div class="col-md-8 col-sm-8 view-cv">

                            <h3 style="color: #1f648b">{{ $exper->job_position }}
                                <span class="small" style="padding-left: 15px">
                                    <a href="{{ route('mycv.edit', ['id'=>$exper->id ]) }}"  >
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                </span>
                                <span class="small danger" style="padding-left: 15px">
                                    <a href="{{ route('mycv.delete', ['id'=>$exper->id]) }}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                </span>
                            </h3>
                    {{--Company name--}}
                            <h3 style="color: #636b6f; font-size: 16px; padding-top: -25px" >
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                {{ $exper->company_name }} |  {{ $exper->contract_type }}
                            </h3>

                    {{--Industry type--}}
                            <p>
                                <i class="fa fa-building-o" aria-hidden="true"></i>
                                <strong>Industy :</strong>  {{ $exper->industry_type }} |
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ $exper->location }}
                            </p>

                        </div>


                        <div class="col-md-4 col-sm-4 cv-date">
                            <span class="pull-right">{{ substr($exper->start_month, 0, 3) }}, {{ $exper->start_year }} - {{ substr($exper->end_month, 0, 3) }}, {{ $exper->end_year }}</span>
                        </div>


                         <div class="description col-md-12 ">

                                   {!! $exper->description !!}
                             {{--{{ $exper->description }}--}}
                         </div>
                        @endforeach
                    @endif
                    </div>

                </div>

                @include('user.cv.add-experience')

                {{--Education--}}

                <div class="panel-body">
                    <legend>
                        EDUCATION
                        <span class="small" style="margin-right: 2em" >
                            <a href="#" class="pull-right" data-toggle="modal" data-target="#edu-squarespaceModal">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Add Education
                            </a>
                        </span>

                    </legend>
                    <div class="row">
                        @if(count($education))
                            @foreach($education as $edu)
                                <div class="col-md-8 col-sm-8 view-cv">
                                    <h3 style="color: #1f648b">
                                        {{ $edu->school_name }}
                                        <span class="small" style="padding-left: 15px">
                                            <a href="{{route('education.edit', ['id'=>$edu->id])}}" >
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                Edit
                                            </a>
                                        </span>
                                        <span class="small danger" style="padding-left: 15px">
                                            <a href="{{ route('education.delete', ['id'=>$edu->id]) }}">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                Delete
                                            </a>
                                        </span>
                                    </h3>
                                    <h3 style="color: #286090; font-size: 16px">
                                        Degree: {{ $edu->degree }} of {{ $edu->study_field }} |
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $edu->location }}
                                    </h3>


                                    <h3 style="color: #286090; font-size: 16px; margin-top: -2px">
                                        Description :
                                    </h3>
                                    <div class="description col-md-12 ">
                                        {!! $edu->description !!}
                                    </div>

                                </div>

                                <div class="col-md-4 col-sm-4 cv-date">
                                    <span class="pull-right">
                                        {{ substr($edu->start_month, 0, 3) }}, {{ $edu->start_year }} - {{ substr($edu->end_month, 0, 3) }}, {{ $edu->end_year }}</span>
                                </div>


                            @endforeach
                        @endif
                    </div>

                </div>

                @include('user.cv.add-experience')
                {{--create education--}}
                @include('user.education.form-create')



            </div>
        </fieldset>

    {{--</form>--}}
</div>


