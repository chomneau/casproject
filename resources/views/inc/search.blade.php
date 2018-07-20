<link href="{{ asset('css/searchStyle.css') }}" rel="stylesheet">
<div class="search">
    <div class="slogon">
        <h1 class="text-center" style="color: #17E7EF ;padding-top: 2em;font-family: 'Anton', sans-serif; letter-spacing: 2px;">FIND YOUR DREAM JOB TODAY!</h1>
    </div>


    <div class="container" style="padding-top: 2em">
        <div class="row">
            {{--<div class="col-lg-2 col-md-2 col-sm-12"></div>--}}
            {{--<div class="search_style col-lg-8 col-md-8 col-sm-12 col-lg-offset-2 col-md-offset-2">--}}
                {{--<input type="text" class="form-control" id="inputSuccess" placeholder="Keyword">--}}
                {{--<button class="btn btn-default" name="search"><i class="fa fa-search" aria-hidden="true"></i> search</button>--}}
            {{--</div>--}}

            <form class="form-wrapper cf" action="{{route('result')}}" method="get">
                <input type="text" name="query" placeholder="Search here..." required>
                <button type="submit">Search</button>
            </form>

            {{--select category--}}
            {{--<div class="search_style col-lg-3 col-md-3 col-sm-12 ">--}}
                {{--<select class="form-control" id="select">--}}
                    {{--<option value="accounting">Accounting</option>--}}
                    {{--<option value="it">IT Programing</option>--}}
                    {{--<option value="marketing">Marketing</option>--}}
                {{--</select>--}}
            {{--</div>--}}
            {{--search button--}}
            {{--<div class="search_style col-lg-2 col-md-2 col-sm-12">--}}
                {{--<button class="btn btn-default" name="search"><i class="fa fa-search" aria-hidden="true"></i> search</button>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2 col-md-2 col-sm-12"></div>--}}
        </div>

    </div>

</div>