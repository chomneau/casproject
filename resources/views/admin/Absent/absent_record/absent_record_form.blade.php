<div class="bs-example">
    <div id="add-category" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-tasks" aria-hidden="true"></i> Record absent</h4>
                </div>
                <form action="{{ route('absentRecord.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <label for="exampleInputEmail1">Select absent type</label>
                        <select name="grade_id" id="" class="form-control" required>
                                <option value="">--select absent type--</option>
                                @if(count($absent))
                                    @foreach($absent as $absents)
                                        <option value="{{ $absents->id }} ">{{ $absents->absent_type }}</option>
                                    @endforeach
                                @endif
                            </select>
                    </div>
                    <div class="modal-body">
                        <label for="exampleInputEmail1">Reason</label>
                        <input type="text" name="subject_code" class="form-control" placeholder="Reason" required autofocus>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>