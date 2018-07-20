<div class="bs-example" >
    <div id="add-category" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-tasks" aria-hidden="true"></i> Add a new subject to primary and secondary</h4>
                </div>
                <form action="{{ route('subject.primary.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label for="exampleInputEmail1">Subject name</label>
                        <input type="text" name="name" class="form-control" placeholder="Add subject here" required autofocus>
                    </div>
                    <div class="modal-body">
                        <label for="exampleInputEmail1">Subject Code</label>
                        <input type="text" name="subject_code" class="form-control" placeholder="Add subject code here" required autofocus>
                    </div>

                    <div class="modal-body">
                        <label for="exampleInputEmail1">Subject to Grade</label>
                        <select name="grade_id" id="" class="form-control" required>
                            <option value="">--select grade--</option>
                            @if(count($primaryGrade))
                                @foreach($primaryGrade as $primaryGrades)
                                    <option value="{{ $primaryGrades->id }} ">{{ $primaryGrades->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add subject</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>