
<div class="well bs-component">
    <div class="bootstrap-iso">
            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <legend>STUDENT PROFILE </legend>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="firstName">First Name*</label>
                            <input type="text" name="firstName" value="{{ Auth::user()->profile->first_name}}" class="form-control" id="inputDefault" placeholder="នាម​ខ្លួន">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="lastName">Last Name*</label>
                            <input type="text" name="lastName" value="{{ Auth::user()->profile->last_name}}" class="form-control" id="inputDefault" placeholder="នាម​ត្រកូល">
                        </div>
                    </div>
                </div>
                {{--end row--}}
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="inputDefault">Sex*</label>
                            <select class="form-control" id="select" name="sex">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->email}}" name="email" id="inputEmail" placeholder="អ៊ីម៉ែល">
                        </div>
                    </div>
                </div>
                {{--end row--}}
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="birthday">Date Of Birth*</label>
                            <div class="input-group">
                                <input class="form-control" id="datepicker" value="{{ Auth::user()->profile->date_of_birth}}" name="date_of_birth" placeholder="MM/DD/YYYY" type="text"/>
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="address">Phone*</label>
                            <input type="number" class="form-control" value="{{ Auth::user()->profile->phone}}" name="phone" id="phone" placeholder="លេខទូរសព័្ទ">
                        </div>
                    </div>
                </div>
                {{--end row--}}

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">Upload new photo</label>
                            <input type="file" id="BSbtninfo" name="avatar" class="form-control">
                            <script>
                                $('#BSbtninfo').filestyle({
                                    buttonName : 'btn-info',
                                    buttonText : 'Select a File'
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="phone">Nationality*</label>
                            <input type="TEXT" class="form-control" value="{{ Auth::user()->profile->nationality}}" name="nationality" id="address" placeholder="សញ្ជាតិ">
                        </div>
                    </div>

                </div>


                {{--end row--}}
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="phone">Address*</label>
                            <input type="TEXT" class="form-control" value="{{ Auth::user()->profile->address}}" name="address" id="address" placeholder="ទីលំនៅបច្ចុប្បន្ន">
                        </div>
                    </div>

                </div>
                {{--end row--}}

                <div class="row" style="margin-top: 20px">
                    <div class="col-md-12">
                        <legend>CAREER EXPECTATION <span style="font-family: 'Hanuman', serif; color: #0b97c4">(បំណងសម្រាប់​ការងារ​ចង់ធ្វើ)</span></legend>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="location">Position*</label>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ Auth::user()->profile->position}}" name="position" id="address" placeholder="មុខតំណែង">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="location">Location*</label>
                            <div class="form-group">
                                <select name="location" id="heard" class="form-control" required>
                                    <option value=""​>--ទីតាំងបំរើការងារ--</option>
                                    {{-- @if(count($location))
                                        @foreach($location as $locations)
                                            <option value="{{ $locations->id }}"
                                                    @if(Auth::user()->profile->location_id  == $locations->id)
                                                    selected
                                                    @endif
                                            >{{ $locations->name }}</option>
                                        @endforeach
                                    @endif --}}
                                </select>
                            </div>

                        </div>
                    </div>

                </div>
                {{--end row--}}

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="location">Expected Salary*</label>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ Auth::user()->profile->expected_salary}}" name="expected_salary" id="address" placeholder="ប្រាក់ខែរំពឹងទុក">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="location">Experience*</label>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ Auth::user()->profile->experience}}" name="experience" id="address" placeholder="ចំនួន​បទពិសោធន៍">
                            </div>

                        </div>
                    </div>
                </div>
                {{--end row--}}

                <div class="row" style="margin-top: 20px">
                    <div class="col-md-12">
                        <legend>UPLOAD YOUR CV AND COVER LETTER <span style="font-family: 'Hanuman', serif; color: #0b97c4">(ភ្ជាប់​ប្រវត្តិរូបសង្ខេប​របស់អ្នក)</span></legend>

                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="name">Upload your CV*</label>
                            <input type="file" id="BSbtninfo" name="cv" class="form-control">
                            <script>
                                $('#BSbtninfo').filestyle({
                                    buttonName : 'btn-info',
                                    buttonText : 'Select a File'
                                });
                            </script>
                        </div>
                    </div>

                </div>
                {{--end row--}}

                {{--<div class="row">--}}
                    {{--<div class="col-lg-12 ">--}}
                         {{--<textarea class="form-control" rows="5" name="bio" id="textArea" required autofocus>--}}
                              {{--{{ Auth::user()->profile->bio}}--}}
                         {{--</textarea>--}}
                        {{--<span class="help-block">Describe about yourself</span>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="pull-right" style="margin-bottom: 50px">
                    <input type="submit" name="submit" value="update" class="btnSubmit pull-right" >
                </div>

                <div class="" style="margin-bottom: 50px"></div>

            </form>
        </div>
    </div>



                            {{--<div class="well bs-component">--}}

                                {{--<div class="bootstrap-iso">--}}
                                {{--<form action="{{ route('user.profile.update', ['id'=>Auth::user()->profile->id])}}" method="post" enctype="multipart/form-data">--}}
                                    {{--<form action="{{ route('user.profile.update', ['id'=>Auth::user()->id]) }}" method="post" enctype="multipart/form-data">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<fieldset>--}}
                                        {{--<legend>EDIT PROFILE</legend>--}}

                                        {{--<div class="col-md-6 col-sm-12">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label class="control-label" for="firstName">First Name</label>--}}
                                                {{--<input type="text" name="firstName" value="{{ Auth::user()->profile->first_name}}" class="form-control" id="inputDefault" placeholder="First Name">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label class="control-label" for="lastName">Last Name</label>--}}
                                                {{--<input type="text" name="lastName" value="{{ Auth::user()->profile->last_name}}" class="form-control" id="inputDefault" placeholder="Last Name">--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group">--}}
                                                {{--<label class="control-label" for="inputDefault">Sex*</label>--}}
                                                {{--<select class="form-control" id="select" name="sex">--}}
                                                    {{--<option value="male">Male</option>--}}
                                                    {{--<option value="female">Female</option>--}}
                                                    {{--<option value="other">Other</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="email">Email</label>--}}
                                                {{--<input type="text" class="form-control" value="{{ Auth::user()->email}}" name="email" id="inputEmail" placeholder="Enter your Email">--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                        {{--end right columm--}}

                                        {{--<div class="col-md-6 col-sm-12" style="padding-left: 2em">--}}
                                             {{--<div class="form-group">--}}
                                                 {{--<label class="control-label" for="birthday">Date Of Birth*</label>--}}
                                                 {{--<div class="input-group">--}}
                                                     {{--<input class="form-control" id="datepicker" value="{{ Auth::user()->profile->date_of_birth}}" name="date_of_birth" placeholder="MM/DD/YYYY" type="text"/>--}}
                                                     {{--<div class="input-group-addon">--}}
                                                         {{--<i class="fa fa-calendar">--}}
                                                         {{--</i>--}}
                                                     {{--</div>--}}
                                                 {{--</div>--}}
                                             {{--</div>--}}

                                            {{--<div class="form-group">--}}
                                                {{--<label class="control-label" for="address">Phone*</label>--}}
                                                {{--<input type="number" class="form-control" value="{{ Auth::user()->profile->phone}}" name="phone" id="phone" placeholder="Enter phone number">--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group">--}}
                                                  {{--<label class="control-label" for="phone">Address*</label>--}}
                                                  {{--<input type="TEXT" class="form-control" value="{{ Auth::user()->profile->address}}" name="address" id="address" placeholder="Enter address">--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group">--}}
                                                    {{--<label class="control-label" for="location">City / Province*</label>--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<select class="form-control" id="select" name="location">--}}
                                                            {{--<option value="Banteay Meanchey">Banteay Meanchey</option>--}}
                                                        {{--</select>--}}
                                                    {{--</div>--}}

                                                {{--</div>--}}
                                            {{--</div>--}}

                                        {{--<div class="form-group">--}}
                                            {{--<label for="name">Upload new photo</label>--}}
                                            {{--<input type="file" id="BSbtninfo" name="avatar" class="form-control">--}}

                                            {{--<script>--}}
                                                {{--$('#BSbtninfo').filestyle({--}}
                                                    {{--buttonName : 'btn-info',--}}
                                                    {{--buttonText : ' Select a File'--}}
                                                {{--});--}}
                                            {{--</script>--}}
                                        {{--</div>--}}


                                        {{--<div style="margin-top: 40px">--}}
                                            {{--<label for="textArea" class="col-lg-6 text-left">About me</label>--}}

                                        {{--</div>--}}

                                            {{--<div class="col-lg-12 ">--}}
                                                {{--<textarea class="form-control" rows="5" name="bio" id="textArea" required autofocus>--}}
                                                    {{--{{ Auth::user()->profile->bio}}--}}
                                                {{--</textarea>--}}
                                                {{--<span class="help-block">Describe about yourself</span>--}}
                                            {{--</div>--}}

                                        {{--<div class="form-group">--}}
                                            {{--<div class="col-lg-10 col-lg-offset-1">--}}
                                                {{--<input type="submit" value="submit">--}}
                                                {{--<input type="submit" name="submit" value="update" class="btn btn-primary pull-right">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                    {{--</fieldset>--}}

                                {{--</form>--}}
                             {{--</div>--}}
                                {{--end of bootstrap-iso--}}
                            {{--</div>--}}


                            {{----}}
                            {{----}}
                            {{----}}
                            
                            
                            
                            
                            
                            
                            
                            
                            {{--@section('styles')--}}
                                {{--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">--}}
                            {{--@endsection--}}

                            {{--@section('scripts')--}}
                                {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>--}}

                                {{--<script>--}}
                                    {{--$(document).ready(function() {--}}
                                        {{--$('#textArea').summernote();--}}
                                    {{--});--}}
                                {{--</script>--}}






