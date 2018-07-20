<div class="panel panel-default">
    <div class="photo-profile">
        {{--<img src="{{ asset(Auth::user()->profile->avatar) }}" alt="" class="img-circle thumbnail">--}}
        {{--<h4 class="text-center text-uppercase" style="color: #4a4e5b">{{ Auth::user()->name }}</h4>--}}
        {{--<p class="text-center text-info" style="color: #69EDF2">Web Developer at Toll Free Telecom(Cambodia)</p>--}}
    </div>
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading" style="background-color: #0DC2C9; margin-top: 1em">--}}

    {{--</div>--}}
    <div class="panel-body" >
        <ul id="item-list" style="padding-left: 5px; ">
            <li><a href="{{route('home.profile')}}" class="text-center text-capitalize" style="font-size:20px ">
                    {{--{{ Auth::user()->name }}</a></li>--}}
            <li>
                {{--<a href="{{route('user.profile', ['id'=>Auth::user()->profile->id])}}">--}}
                    <i class="fa fa-pencil" aria-hidden="true" style="color: #0BB9BF"></i>
                    Edit Company Profile
                </a>
            </li>
            <li>
                <a href="{{route('mycv.index')}}">
                    <i class="fa fa-address-book-o" aria-hidden="true" style="color: #0BB9BF"></i>
                    Job posted
                </a>
            </li>
            <li>
                <a href="{{ route('user.uploadcv')}}">
                    <i class="fa fa-upload" aria-hidden="true" style="color: #0BB9BF"></i>
                    Post new job
                </a>
            </li>
        </ul>
    </div>
    {{--</div>--}}
</div>