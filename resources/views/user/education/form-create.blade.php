@include('layouts.sectionstyle')
<!-- line modal -->
<div class="modal fade" id="edu-squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Create your education</h3>
            </div>
            <div class="modal-body">

                <form action="{{route('education.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="firstName">School Name*</label>
                                <input type="text" name="school_name" value="" class="form-control" id="inputDefault" placeholder="school name" required autofocus>
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="Industry">Degree Level*</label>
                                <select class="form-control" id="select" name="degree" required autofocus>
                                    <option value="">Select the degree level you achieved</option>
                                    <option value="High School or equivalent">High School or equivalent</option>
                                    <option value="Vocational training">Vocational training</option>
                                    <option value="Certification (Diploma)">Certification (Diploma)</option>
                                    <option value="Bachelor's degree">Bachelor's degree</option>
                                    <option value="Master's degree">Master's degree</option>
                                    <option value="Other">Other</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="location">City / Province*</label>
                                <div class="form-group">
                                    <select class="form-control" id="select" name="location">
                                        <option value="Banteay Meanchey">Banteay Meanchey</option>
                                        <option value="Battambang">Battambang</option>
                                        <option value="Kampong Cham">Kampong Cham</option>
                                        <option value="Kampong Chhnang">Kampong Chhnang</option>
                                        <option value="Kampong Speu">Kampong Speu</option>
                                        <option value="Kampong Thom">Kampong Thom</option>
                                        <option value="Kampot">Kampot</option>
                                        <option value="Kandal">Kandal</option>
                                        <option value="Kep">Kep</option>
                                        <option value="Koh Kong">Koh Kong</option>
                                        <option value="Kratié">Kratié</option>
                                        <option value="Mondulkiri">Mondulkiri</option>
                                        <option value="Oddar Meanchey">Oddar Meanchey</option>
                                        <option value="Pailin">Pailin</option>
                                        <option value="Phnom Penh" selected >Phnom Penh</option>
                                        <option value="Preah Sihanouk">Preah Sihanouk</option>
                                        <option value="Preah Vihear">Preah Vihear</option>
                                        <option value="Pursat">Pursat</option>
                                        <option value="Prey Veng">Prey Veng</option>
                                        <option value="Ratanakiri">Ratanakiri</option>
                                        <option value="Siem Reap">Siem Reap</option>
                                        <option value="Stung Treng">Stung Treng</option>
                                        <option value="Svay Rieng">Svay Rieng</option>
                                        <option value="Takéo">Takéo</option>
                                        <option value="Tboung Khmum">Tboung Khmum</option>

                                    </select>
                                </div>

                            </div>


                        </div>
                        {{--end right columm--}}

                        <div class="col-md-6 col-sm-12" style="padding-left: 2em">
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label" for="lastName">Field of Study*</label>
                                    <input type="text" name="study_field" class="form-control" id="inputDefault" required autofocus placeholder="field of your study">
                                </div>
                                <div class="col-md-6 col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label" for="inputDefault">Start month*</label>
                                        {!! Form::selectMonth('start_month', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group {{ $errors->has('start_year') ? ' has-error' : '' }}">
                                        <label class="control-label" for="address">Start Year*</label>
                                        {!! Form::selectRange('start_year', 2030, 1950, null, array('class'=>'form-control', 'required autofocus')) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label" for="inputDefault">End month*</label>
                                        {!! Form::selectMonth('end_month', null, array('class'=>'form-control')) !!}

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="address">End year*</label>
                                        {!! Form::selectRange('end_year', 2030, 1950, null, array('class'=>'form-control', 'required autofocus')) !!}
                                    </div>
                                </div>
                            </div>



                        </div>



                        <div style="margin-top: 40px">
                            {{--<label for="textArea" class="col-lg-6 text-left">About Yourself</label>--}}

                        </div>

                        <div class="col-lg-12 ">
                            <label class="control-label" for="address">Description </label>
                            <textarea class="form-control" rows="9" name="description" id="textArea"></textarea>
                            <span class="help-block">* Optional</span>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1">
                                <button type="submit" class="btn btn-primary pull-right">Add now</button>
                            </div>
                        </div>

                    </fieldset>

                </form>
            </div>


        </div>
    </div>
</div>