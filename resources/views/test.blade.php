

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
tinymce.init({ selector:'textarea',
plugins: "link",
menu: 'disable',
plugins: "lists",
toolbar: "numlist bullist",
//plugin:"advlist",
browser_spellcheck: true,
});
</script>


<form action="{{ route('storedata') }}" method="post">
    {{ csrf_field() }}
    <div class="row">
        {{--<div class="form-group col-md-12">--}}
            {{--<label for="jobTitle">Job Title</label>--}}
            {{--<input type="text" name="jobTitle" class="form-control" id="jobTitle" placeholder="Job Title" required autofocus>--}}
        {{--</div>--}}

        <div class="form-group col-md-12">
            <label for="jobDescription">Job Description</label>
            <textarea name="jobDescription" id="jobDescription" cols="15" rows="8" class="form-control" ></textarea>
        </div>

        <div class="col-md-12">
            <label for="jobRequirement">Job Requirement</label>
            <textarea name="jobRequirement" id="jobRequirement" cols="15" rows="8" class="form-control"></textarea>
        </div>
    </div>



    <textarea name="textarea" id="" cols="70" rows="20"></textarea>
    <input type="submit" name="submit" value="submit" class="btn btn-primary">
</form>