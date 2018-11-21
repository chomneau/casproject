

<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 5em">
    <div>
        <div class="x_title">
            <h2>Assignments</h2>

            <div class="clearfix"></div>
        </div>
        <ul class="list-unstyled top_profiles scroll-view">
            @foreach($assignment as $assignments)

                <li class="media event">
                    <a href="{{ route('student.assignment.detail', ['student_id'=>$students->id, 'assignment_id'=>$assignments->id]) }}">

                <p class="pull-left border-aero profile_thumb">
                    <i class="fa fa-user aero"></i>
                </p>
                <div class="media-body">
                    <p class="title" href="#"><strong>{{ $assignments->title }}</strong> posted by teacher <span><strong>{{ $assignments->teacher->first_name }} {{ $assignments->teacher->last_name }} </strong></span></p>
                    <p style="color: #2B2B2B">


                    <?php
                    $string = $assignments->description;
                    if(strlen($string)>300){
                        echo substr($assignments->description, 0,300)."...";
                    }else{
                        echo substr($assignments->description, 0,200);
                    }
                    ?>
                    </p>
                    <p> <small> {{ $assignments->created_at->diffForHumans() }} </small>
                    </p>
                </div>
                </a>
            </li>

            @endforeach
        </ul>
    </div>
</div>

