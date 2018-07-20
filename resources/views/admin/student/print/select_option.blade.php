
{{--This tap--}}
<div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

            <div class="col-xs-12">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home">

                        @if(count($grade))
                            @foreach($grade as $grades)

                                <li><input type="checkbox" name=""> 

                                {{$grades->grade_name}}

                                </li>

                            @endforeach
                            
                        @endif

                    </div>

                </div>                

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>