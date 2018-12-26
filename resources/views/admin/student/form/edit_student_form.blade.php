
<div class="step1" style="margin-top: -30px">
    <div class="row">
        <div class="col-md-6 {{ $errors->has('firstName') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}" autofocus id="firstname" placeholder="first name">
        </div>
        <div class="col-md-6 {{ $errors->has('photo') ? ' has-error' : '' }}">
            <label for="logo">Student Photo</label>
            <input type="file" name="photo" class="form-control" value="{{ old('photo') }}" autofocus placeholder="student photo" >
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 {{ $errors->has('lastName') ? ' has-error' : '' }}">
            <label for="contactPerson">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}" required autofocus placeholder="last name">
        </div>

        <div class="col-md-6 {{ $errors->has('type') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Sex</label>
            <select name="gender" id="" class="form-control" required>
                <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
                {{--@if(count($grade))--}}
                    {{--@foreach($grade as $grades)--}}
                        {{--<option value="{{ $grades->id }} ">{{ $grades->grade_name }}</option>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Date of Birth</label>
            <div class="daterangepicker dropdown-menu ltr single opensright show-calendar picker_2 xdisplay"><div class="calendar left single" style="display: block;"><div class="daterangepicker_input"><input class="input-mini form-control active" type="text" name="daterangepicker_start" value="" style="display: none;"><i class="fa fa-calendar glyphicon glyphicon-calendar" style="display: none;"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">25</td><td class="off available" data-title="r0c1">26</td><td class="off available" data-title="r0c2">27</td><td class="off available" data-title="r0c3">28</td><td class="off available" data-title="r0c4">29</td><td class="off available" data-title="r0c5">30</td><td class="weekend available" data-title="r0c6">1</td></tr><tr><td class="weekend available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="weekend available" data-title="r1c6">8</td></tr><tr><td class="weekend available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="weekend available" data-title="r2c6">15</td></tr><tr><td class="weekend available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="today active start-date active end-date available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="weekend available" data-title="r3c6">22</td></tr><tr><td class="weekend available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="weekend available" data-title="r4c6">29</td></tr><tr><td class="weekend available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="off available" data-title="r5c2">1</td><td class="off available" data-title="r5c3">2</td><td class="off available" data-title="r5c4">3</td><td class="off available" data-title="r5c5">4</td><td class="weekend off available" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar right" style="display: none;"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value="" style="display: none;"><i class="fa fa-calendar glyphicon glyphicon-calendar" style="display: none;"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Nov 2016</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">30</td><td class="off available" data-title="r0c1">31</td><td class="available" data-title="r0c2">1</td><td class="available" data-title="r0c3">2</td><td class="available" data-title="r0c4">3</td><td class="available" data-title="r0c5">4</td><td class="weekend available" data-title="r0c6">5</td></tr><tr><td class="weekend available" data-title="r1c0">6</td><td class="available" data-title="r1c1">7</td><td class="available" data-title="r1c2">8</td><td class="available" data-title="r1c3">9</td><td class="available" data-title="r1c4">10</td><td class="available" data-title="r1c5">11</td><td class="weekend available" data-title="r1c6">12</td></tr><tr><td class="weekend available" data-title="r2c0">13</td><td class="available" data-title="r2c1">14</td><td class="available" data-title="r2c2">15</td><td class="available" data-title="r2c3">16</td><td class="available" data-title="r2c4">17</td><td class="available" data-title="r2c5">18</td><td class="weekend available" data-title="r2c6">19</td></tr><tr><td class="weekend available" data-title="r3c0">20</td><td class="available" data-title="r3c1">21</td><td class="available" data-title="r3c2">22</td><td class="available" data-title="r3c3">23</td><td class="available" data-title="r3c4">24</td><td class="available" data-title="r3c5">25</td><td class="weekend available" data-title="r3c6">26</td></tr><tr><td class="weekend available" data-title="r4c0">27</td><td class="available" data-title="r4c1">28</td><td class="available" data-title="r4c2">29</td><td class="available" data-title="r4c3">30</td><td class="off available" data-title="r4c4">1</td><td class="off available" data-title="r4c5">2</td><td class="weekend off available" data-title="r4c6">3</td></tr><tr><td class="weekend off available" data-title="r5c0">4</td><td class="off available" data-title="r5c1">5</td><td class="off available" data-title="r5c2">6</td><td class="off available" data-title="r5c3">7</td><td class="off available" data-title="r5c4">8</td><td class="off available" data-title="r5c5">9</td><td class="weekend off available" data-title="r5c6">10</td></tr></tbody></table></div></div><div class="ranges" style="display: none;"><div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div></div>
            </div>
            <fieldset>
                <div class="xdisplay_inputx form-group has-feedback">
                    <input type="text" name="date_of_birth" value="{{ $student->date_of_birth }}" class="form-control has-feedback-left" id="single_cal2" placeholder="date of birth" aria-describedby="inputSuccess2Status2" required>
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                    <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                </div>
            </fieldset>
            {{--end dateline picker--}}
        </div>

        <div class="col-md-6 {{ $errors->has('student_id') ? ' has-error' : '' }}">
            <label for="studentID">Student ID</label>
            <input type="text" name="student_id" class="form-control" value="{{ $student->card_id }}" required autofocus placeholder="student ID" >
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 {{ $errors->has('national') ? ' has-error' : '' }}">
            <label for="email">Nationality</label>
            <input type="text" name="nationality" class="form-control" value="{{ $student->nationality }}" required autofocus placeholder=" Nationality" >
        </div>

        <div class="col-md-6 {{ $errors->has('progressiveBookId') ? ' has-error' : '' }}">
            <label for="email">Status</label>

            <select name="status" id="" class="form-control" required>
                <option value="{{ $student->status }}">{{ $student->status }}</option>
                <option value="New">New</option>
                <option value="Old">Old</option>
                <option value="Graduated">Graduated</option>
                <option value="Quit">Quit</option>
            </select>
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 {{ $errors->has('grade_id') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Grade</label>
            <select name="grade_id" id="" class="form-control" required>
                @if(count($gradeProfile))
                    @foreach($gradeProfile as $grades)
                        <option value="{{ $grades->id }}"
                                @if($student->grade_profile_id  == $grades->id) selected @endif
                        >{{ $grades->name }}</option>
                    @endforeach
                @endif


            </select>
        </div>
        <div class="col-md-6 {{ $errors->has('career') ? ' has-error' : '' }}">
            <label for="occupation">Place of Birth</label>
            <input type="text" name="place_of_birth" class="form-control" value="{{ $student->place_of_birth }}" required autofocus placeholder=" place of birth" >
        </div>

    </div>

    <h4 style="margin-top: 3em; color: #03b5b5">PARENTS INFO</h4>
    <hr style="margin-top: -9px">
    <div class="row">
        <div class="col-md-6 {{ $errors->has('father_name') ? ' has-error' : '' }}">
            <label for="email">Father's name</label>
            <input type="text" name="father_name" class="form-control" value="{{ $student->father_name }}"  autofocus placeholder="Father's name" >
        </div>
        <div class="col-md-6 {{ $errors->has('career') ? ' has-error' : '' }}">
            <label for="occupation">Father's occupation</label>
            <input type="text" name="father_occupation" class="form-control" value="{{ $student->father_occupation }}"  autofocus placeholder="Father's occupation" >
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 {{ $errors->has('mother_name') ? ' has-error' : '' }}">
            <label for="email">Mother's name</label>
            <input type="text" name="mother_name" class="form-control" value="{{ $student->mother_name }}"  autofocus placeholder="mother name" >
        </div>
        <div class="col-md-6 {{ $errors->has('mother_occupation') ? ' has-error' : '' }}">
            <label for="occupation">Mother's occupation</label>
            <input type="text" name="mother_occupation" class="form-control" value="{{ $student->mother_occupation }}"  autofocus placeholder="mother's occupation" >
        </div>

    </div>

    <div class="row">
        
        <div class="col-md-6 {{ $errors->has('father_phone') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Father's mobile number</label>
            <input type="text" name="father_phone" class="form-control" value="{{ $student->father_phone }}"  autofocus placeholder="father phone" >
        </div>

        <div class="col-md-6 {{ $errors->has('mother_phone') ? ' has-error' : '' }}">
            <label for="mother_phone">Mother's mobile number</label>
            <input type="text" name="mother_phone" class="form-control" value="{{ $student->mother_phone }}"  autofocus placeholder="Mother phone" >
        </div>

    </div>

    <div class="row">

        <div class="col-md-6 {{ $errors->has('father_email') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Father's email</label>
            <input type="email" name="father_email" class="form-control" value="{{ $student->father_email }}" autofocus placeholder="Father email">
        </div>

        <div class="col-md-6 {{ $errors->has('mother_email') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Mother's email</label>
            <input type="email" name="mother_email" class="form-control" value="{{ $student->mother_email }}" autofocus placeholder="Mother email">
        </div>

        
    </div>


    <div class="row">

        <div class="col-md-12 {{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $student->address }}"  autofocus placeholder="Current address">
        </div>
    </div>




</div>

