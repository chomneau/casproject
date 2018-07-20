<div class="panel panel-default">
<div class="photo-profile">
    <img src="{{ asset(Auth::user()->StudentProfile->photo) }}" alt="" class="img-circle thumbnail">
</div>
        <div class="panel-body" >
            <ul id="item-list" style="padding-left: 15px; ">
                <li><a href="{{route('home.profile')}}" class="text-center text-capitalize" style="font-size:17px; color: #0b97c4; margin-left: 35px">
                        {{ Auth::user()->StudentProfile->first_name }} {{ Auth::user()->StudentProfile->last_name }}</a></li>
                <li>
                    <a href="{{route('user.profile', ['id'=>Auth::user()->StudentProfile->id])}}">
                        <i class="fa fa-pencil" aria-hidden="true" style="color: #0BB9BF"></i>
                        Grade 1
                    </a>
                </li>
                <li>
                    <a href="{{route('mycv.index')}}">
                        <i class="fa fa-address-book-o" aria-hidden="true" style="color: #0BB9BF"></i>
                        Grade 2
                    </a>
                </li>
            </ul>
        </div>
</div>