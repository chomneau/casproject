
    <div class="well bs-component" style="margin-bottom: 2em">
        {!!Form::open(['action' => 'AdminController@postjob','method' => 'POST'])!!}
        {{ Form::label('Label', null, ['class' => 'control-label']) }}
        {{Form::bsText('JobTitle','',['placeholder' => 'Job Title'])}}
        {{Form::bsTextArea('Job Description','',['placeholder' => 'Job Description'])}}
        {{Form::bsTextArea('Position Requirements','',['placeholder' => 'Position Requirements'])}}
        {{Form::bsTextArea('About the Company','',['placeholder' => 'About the Company'])}}
        {{Form::bsText('website','',['placeholder' => 'Company Website'])}}
        {{Form::bsText('email','',['placeholder' => 'Contact Email'])}}
        {{Form::bsText('phone','',['placeholder' => 'Contact Phone'])}}
        {{Form::bsText('address','',['placeholder' => 'Business Address'])}}

        {{Form::bsSubmit('submit', ['class'=>'btn btn-primary pull-right'])}}

        {!! Form::close() !!}

    </div>


