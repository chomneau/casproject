

<div class="step1" style="margin-top: -30px">
    <div class="row">
        <div class="col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" autofocus id="title" placeholder="Title">
        </div>
        <div class="col-md-12 {{ $errors->has('description') ? ' has-error' : '' }}" style="margin-top: 20px">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>



        <div class="col-md-12 {{ $errors->has('grade_id') ? ' has-error' : '' }}" style="top:15px;left: 10px;padding-right: 18px;padding-left: 0px;">
            <label for="grade">Select Grade</label>
            <select name="gradeProfile" id="" class="form-control" required>
                <option value="">--select grade--</option>
                @if(count($gradeProfile))
                    @foreach($gradeProfile as $grades)
                        <option value="{{ $grades->id }} ">{{ $grades->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>



        <div class="col-md-12 {{ $errors->has('file_name') ? ' has-error' : '' }}" style="margin-top: 20px">
            <label for="logo">Upload Assignment Document(optional)</label>
            <input type="file" name="file_name" class="form-control" value="{{ old('file_name') }}" autofocus placeholder="assignment file" >
        </div>
    </div>

</div>

