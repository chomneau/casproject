
<div class="well bs-component" style="margin-bottom: 2em">

        <h3>Add Job Location</h3>
        <hr>
        {!!Form::open(['action' => 'postsController@storeLocation','method' => 'POST'])!!}

        {{Form::bsText('job_location','',['placeholder' => 'Job Title'])}}
        {{Form::bsText('user_id','',['placeholder' => 'user_id'])}}
        {{Form::bsSubmit('submit', ['class'=>'btn btn-primary pull-right'])}}
        <div style="margin-top: 4em"></div>

        {!! Form::close() !!}







</div>


