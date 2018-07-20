<h4>Preferred Candidate</h4>
<hr>
{{--<div class="step3">--}}
        <div class="row">
            <div class="col-md-6">
                <label for="level">Level</label>
                <select name="level" id="" class="form-control" required>
                    <option value="">--select level--</option>
                    @if(count($level))
                        @foreach($level as $levels)
                            <option value="{{ $levels->id }}">{{ $levels->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label for="degree">Degree</label>
                <select name="degree" id="" class="form-control" required>
                    <option value="">--select degree--</option>
                    @if(count($degree))
                        @foreach($degree as $degrees)
                            <option value="{{ $degrees->id }}">{{ $degrees->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    <div class="space"style="margin-top: 10px"></div>
        <div class="row">
            <div class="col-md-6">
                <label for="experience">Experience</label>
                <select name="experience" id="" class="form-control" required>
                    <option value="">--select experience--</option>
                    @if(count($preExperience))
                        @foreach($preExperience as $preExperiences)
                            <option value="{{ $preExperiences->id }}">{{ $preExperiences->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-md-6">
                <label for="language">Language Skills</label>
                <input type="text" name="language" class="form-control" id="exampleInputEmail1" placeholder="(Ex: English, French)" required>
                <p>List a maximum of 5 languages required for this position. seperate each skill by a comma ( Ex: English, French )</p>
            </div>

        </div>

    {{--</div>--}}


