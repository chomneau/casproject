@include('layouts.sectionstyle')
<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Add New Experience</h3>
            </div>
            <div class="modal-body">

                <form action="{{route('mycv.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="firstName">Job Title</label>
                                <input type="text" name="position" value="" class="form-control" id="inputDefault" placeholder="position" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="lastName">Employer Name (Exp: Toyota co.,ltd)</label>
                                <input type="text" name="employer_name" class="form-control" id="inputDefault" required autofocus placeholder="company / organization">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="Industry">Industry Type*</label>
                                <select class="form-control" id="select" name="industry_type" required autofocus>
                                    <option value="">Select the company industry</option>
                                    <option value="Accounting and Auditing Services">Accounting and Auditing Services</option>
                                    <option value="Advertising and Public Relations">Advertising and Public Relations</option>
                                    <option value="Agriculture / Forestry / Fishing">Agriculture / Forestry / Fishing</option>
                                    <option value="Airlines and Aviation">Airlines and Aviation</option>
                                    <option value="Architecture">Architecture</option>
                                    <option value="Automotive">Automotive</option>
                                    <option value="Banking">Banking</option>
                                    <option value="Beauty/Cosmetics">Beauty/Cosmetics</option>
                                    <option value="Biotechnology / Pharmaceuticals">Biotechnology / Pharmaceuticals</option>
                                    <option value="Broadcasting / Music / Film">Broadcasting / Music / Film</option>
                                    <option value="Chemicals / Petro-chemicals">Chemicals / Petro-chemicals</option>
                                    <option value="Clothing and Textile Manufacturing">Clothing and Textile Manufacturing</option>
                                    <option value="Computer / IT">Computer / IT</option>
                                    <option value="Construction">Construction</option>
                                    <option value="Consulting">Consulting</option>
                                    <option value="Design">Design</option>
                                    <option value="Distribution / Logistics">Distribution / Logistics</option>
                                    <option value="Education">Education</option>
                                    <option value="Energy / Utilities">Energy / Utilities</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Financial Services">Financial Services</option>
                                    <option value="Food / Beverage Production">Food / Beverage Production</option>
                                    <option value="Government">Government</option>
                                    <option value="Healthcare Services">Healthcare Services</option>
                                    <option value="Hotels / Lodging">Hotels / Lodging</option>
                                    <option value="Import / Export / Trade">Import / Export / Trade</option>
                                    <option value="Insurance">Insurance</option>
                                    <option value="Internet Services">Internet Services</option>
                                    <option value="Legal Services">Legal Services</option>
                                    <option value="Manufacturing">Manufacturing</option>
                                    <option value="Medical / Hospital">Medical / Hospital</option>
                                    <option value="NGO / INGO / Non-Profit">NGO / INGO / Non-Profit</option>
                                    <option value="Performing Arts / Fine Arts">Performing Arts / Fine Arts</option>
                                    <option value="Personal and Household Services">Personal and Household Services</option>
                                    <option value="Printing / Publishing">Printing / Publishing</option>
                                    <option value="Real Estate / Property">Real Estate / Property</option>
                                    <option value="Recruitment Agencies">Recruitment Agencies</option>
                                    <option value="Restaurant / Food Services">Restaurant / Food Services</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Security / Surveillance">Security / Surveillance</option>
                                    <option value="Social Services">Social Services</option>
                                    <option value="Sports / Physical Recreation">Sports / Physical Recreation</option>
                                    <option value="Telecommunications Services">Telecommunications Services</option>
                                    <option value="Tourism / Travel Services">Tourism / Travel Services</option>
                                    <option value="Transportation / Storage">Transportation / Storage</option>
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

                            <div class="form-group">
                                <label class="control-label" for="firstName">Contract type (Ex: Full-time, part-time)</label>
                                <select class="form-control" id="select" name="contract_type" required autofocus>
                                    <option value="Full time">Full time</option>
                                    <option value="Part time">Part time</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Internship">Internship</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                        </div>



                        <div style="margin-top: 40px">
                            {{--<label for="textArea" class="col-lg-6 text-left">About Yourself</label>--}}

                        </div>

                        <div class="col-lg-12 ">
                            <label class="control-label" for="address">Describe your duties here </label>
                            <textarea class="form-control" rows="9" name="description" id="textArea"></textarea>
                            <span class="help-block">Describe about Your duty</span>
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