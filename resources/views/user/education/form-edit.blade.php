@include('layouts.sectionstyle')

<div class="well bs-component">
    <div class="bootstrap-iso">

                <form action="{{ route('education.update', ['id'=>$education->id]) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="firstName">School Name*</label>
                                <input type="text" name="school_name" value="{{ $education->school_name }}" class="form-control" id="inputDefault" placeholder="school name" required autofocus>
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="Industry">Degree Level*</label>
                                {{--<select class="form-control" id="select" name="degree" required autofocus>--}}
                                    {{--<option value="">Select the degree level you achieved</option>--}}
                                    {{--<option value="High School or equivalent">High School or equivalent</option>--}}
                                    {{--<option value="Vocational training">Vocational training</option>--}}
                                    {{--<option value="Certification (Diploma)">Certification (Diploma)</option>--}}
                                    {{--<option value="Bachelor's degree">Bachelor's degree</option>--}}
                                    {{--<option value="Master's degree">Master's degree</option>--}}
                                    {{--<option value="Other">Other</option>--}}

                                {{--</select>--}}

                                {{ Form::select('degree',[
                                    'High School or equivalent' => 'High School or equivalent',
                                    'Certification (Diploma)' => 'Certification (Diploma)',
                                    'Bachelor\'s degree' => 'Bachelor\'s degree',
                                    'Master\'s degree' => 'Master\'s degree'
                                    ], $education->degree, ['class'=>'form-control', 'id'=>'select'] )
                                }}

                            </div>

                            <div class="form-group">
                                <label class="control-label" for="location">City / Province*</label>
                                <div class="form-group">
                                    {{--<select class="form-control" id="select" name="location">--}}
                                        {{--<option value="Banteay Meanchey">Banteay Meanchey</option>--}}
                                        {{--<option value="Battambang">Battambang</option>--}}
                                        {{--<option value="Kampong Cham">Kampong Cham</option>--}}
                                        {{--<option value="Kampong Chhnang">Kampong Chhnang</option>--}}
                                        {{--<option value="Kampong Speu">Kampong Speu</option>--}}
                                        {{--<option value="Kampong Thom">Kampong Thom</option>--}}
                                        {{--<option value="Kampot">Kampot</option>--}}
                                        {{--<option value="Kandal">Kandal</option>--}}
                                        {{--<option value="Kep">Kep</option>--}}
                                        {{--<option value="Koh Kong">Koh Kong</option>--}}
                                        {{--<option value="Kratié">Kratié</option>--}}
                                        {{--<option value="Mondulkiri">Mondulkiri</option>--}}
                                        {{--<option value="Oddar Meanchey">Oddar Meanchey</option>--}}
                                        {{--<option value="Pailin">Pailin</option>--}}
                                        {{--<option value="Phnom Penh" selected >Phnom Penh</option>--}}
                                        {{--<option value="Preah Sihanouk">Preah Sihanouk</option>--}}
                                        {{--<option value="Preah Vihear">Preah Vihear</option>--}}
                                        {{--<option value="Pursat">Pursat</option>--}}
                                        {{--<option value="Prey Veng">Prey Veng</option>--}}
                                        {{--<option value="Ratanakiri">Ratanakiri</option>--}}
                                        {{--<option value="Siem Reap">Siem Reap</option>--}}
                                        {{--<option value="Stung Treng">Stung Treng</option>--}}
                                        {{--<option value="Svay Rieng">Svay Rieng</option>--}}
                                        {{--<option value="Takéo">Takéo</option>--}}
                                        {{--<option value="Tboung Khmum">Tboung Khmum</option>--}}

                                    {{--</select>--}}

                                    {{ Form::select('location',[
                                    'Banteay Meanchey' => 'Banteay Meanchey',
                                    'Battambang' => 'Battambang',
                                    'Kampong Cham' => 'Kampong Cham',
                                    'Kampong Chhnang' => 'Kampong Chhnang',
                                    'Kampong Speu' => 'Kampong Speu',
                                    'Kampong Thom' => 'Kampong Thom',
                                    'Kampot' => 'Kampot',
                                    'Kandal' => 'Kandal',
                                    'Kep' => 'Kep',
                                    'Koh Kong' => 'Koh Kong',
                                    'Kratié' => 'Kratié',
                                    'Mondulkiri' => 'Mondulkiri',
                                    'Oddar Meanchey' => 'Oddar Meanchey',
                                    'Pailin' => 'Pailin',
                                    'Phnom Penh' => 'Phnom Penh',
                                    'Preah Sihanouk' => 'Preah Sihanouk',
                                    'Preah Vihear' => 'Preah Vihear',
                                    'Pursat' => 'Pursat',
                                    'Prey Veng' => 'Prey Veng',
                                    'Ratanakiri' => 'Ratanakiri',
                                    'Siem Reap' => 'Siem Reap',
                                    'Stung Treng' => 'Stung Treng',
                                    'Svay Rieng' => 'Svay Rieng',
                                    'Takéo' => 'Takéo',
                                    'Tboung Khmum' => 'Tboung Khmum',
                                    ], $education->location, ['class'=>'form-control', 'id'=>'select'] )
                                }}

                                </div>

                            </div>


                        </div>
                        {{--end right columm--}}

                        <div class="col-md-6 col-sm-12" style="padding-left: 2em">
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label" for="lastName">Field of Study*</label>
                                    <input type="text" name="study_field" value="{{ $education->study_field }}" class="form-control" id="inputDefault" required autofocus placeholder="field of your study">
                                </div>
                                <div class="col-md-6 col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label" for="inputDefault">Start month*</label>
                                        {!! Form::selectMonth('start_month', $education->start_month, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group {{ $errors->has('start_year') ? ' has-error' : '' }}">
                                        <label class="control-label" for="address">Start Year*</label>
                                        {!! Form::selectRange('start_year', 2030, 1950, $education->start_year, array('class'=>'form-control', 'required autofocus')) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label" for="inputDefault">End month*</label>
                                        {!! Form::selectMonth('end_month', $education->end_month, array('class'=>'form-control')) !!}

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="address">End year*</label>
                                        {!! Form::selectRange('end_year', 2030, 1950, $education->end_year, array('class'=>'form-control', 'required autofocus')) !!}
                                    </div>
                                </div>




                            </div>



                        </div>



                        <div style="margin-top: 40px">
                            {{--<label for="textArea" class="col-lg-6 text-left">About Yourself</label>--}}

                        </div>

                        <div class="col-lg-12 ">
                            <label class="control-label" for="address">Description </label>
                            <textarea class="form-control" rows="9" name="description" id="textArea">{{ $education->description }}</textarea>
                            <span class="help-block">* Optional</span>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1">
                                <button type="submit" class="btn btn-primary pull-right">update now</button>
                            </div>
                        </div>

                    </fieldset>

                </form>
            </div>
    </div>
