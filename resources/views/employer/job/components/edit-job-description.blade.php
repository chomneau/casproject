{{--<div class="step1">--}}
    <div class="row">
        <div class="form-group col-md-12">
            <label for="jobTitle">Job Title</label>
            <input type="text" name="jobTitle" value="{{ $job->jobTitle }}" class="form-control" id="jobTitle" placeholder="Job Title" required autofocus>
        </div>
        <div class="form-group col-md-12">
            <label for="jobDescription">Job Description</label>
            <textarea name="jobDescription" id="jobDescription" cols="15" rows="8" class="form-control" required autofocus>
                {{ $job->jobDescription }}
            </textarea>
        </div>

        <div class="col-md-12">
            <label for="jobRequirement">Job Requirement</label>
            <textarea name="jobRequirement" id="jobRequirement" cols="15" rows="8" class="form-control" required autofocus>
                {{ $job->jobRequirement }}
            </textarea>
        </div>
    </div>
{{--</div>--}}






