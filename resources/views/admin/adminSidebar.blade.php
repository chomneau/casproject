
<div class="photo-profile">
    <img src="http://placehold.it/360x240" alt="" class="img-circle thumbnail">
    <h4 class="text-center text-uppercase" style="color: #F8F4F4">{{ Auth::user()->name }} </h4>
    <p class="text-center text-info" style="color: #69EDF2">Authorized: Admin role</p>
</div>
<div class="panel panel-default" style="margin-top: -7em">
    <div class="panel-heading" style="background-color: #0DC2C9; margin-top: 1em">

    </div>
    <div class="panel-body" style="background-color: #0DC2C9">
        <ul id="item-list" style="padding-left: 5px">
            <li>
                <a href="#">
                </a></li>
            <li>
            <li>
                <a href="{{ route('admin.category') }}"><i class="fa fa-address-book-o" aria-hidden="true"></i>
                    category</a></li>
            <li>
                <a href="{{ route('admin.postjob') }}"><i class="fa fa-pencil" aria-hidden="true"></i>
                    Post a job</a></li>
            <li>
                <a href="{{ route('admin.viewLocation') }}"><i class="fa fa-address-book-o" aria-hidden="true"></i>
                    View job location</a></li>


            <li><a href="#"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                    View Company</a></li>
            <li><a href="#"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                    View Company</a></li>
        </ul>
    </div>
</div>


{{--{{ route('admin.joblocation') }}--}}