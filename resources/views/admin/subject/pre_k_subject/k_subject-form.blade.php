<div class="bs-example" >
    <div id="add-category" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-tasks" aria-hidden="true"></i> Add a new subject</h4>
                </div>
                <form action="{{ route('subject.prek.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label for="exampleInputEmail1">Subject name</label>
                        <input type="text" name="name" class="form-control" placeholder="Add subject here" required autofocus>
                    </div>
                    

                    <div class="modal-body">
                        <label for="exampleInputEmail1">Subject Code</label>
                        <select name="subject_code" id="" class="form-control" required>
                            <option value="">--select grade--</option>
                                <optgroup label="Grade Pre-k">
                                
                                    <option value="PPI">PPI</option>
                                    <option value="ELAI">ELAI</option>
                                    <option value="KLAI">KLAI</option>
                                    <option value="MI">MI</option>
                                    <option value="SSI">SSI</option>
                                    <option value="SI">SI</option>
                                    <option value="FAA">FAA</option>
                                    <option value="PEP">PEP</option>
                                    <option value="SRS">SRS</option>

                                </optgroup>

                                <optgroup label="Grade k">
                                
                                    <option value="SD">SD</option>
                                    <option value="PD">PD</option>
                                    <option value="ART">ART</option>
                                    <option value="MUSIC">MUSIC</option>
                                    <option value="DERWS">DERWS</option>
                                    <option value="EAWSS">EAWSS</option>
                                    <option value="DERWS_KH">DERWS_KH</option>
                                    <option value="EAWSS_KH">EAWSS_KH</option>
                                    <option value="MATH">MATH</option>
                                    <option value="PEDH">PEDH</option>
                                    <option value="SCIENCE">SCIENCE</option>
                                    <option value="SS">SS</option>

                                </optgroup>
                        </select>
                    </div>




                    <div class="modal-body">
                        <label for="exampleInputEmail1">Subject to Grade</label>
                        <select name="grade_id" id="" class="form-control" required>
                            <option value="">--select grade--</option>
                            @if(count($kgrade))
                                @foreach($kgrade as $kgrades)
                                    <option value="{{ $kgrades->id }} ">{{ $kgrades->name }}</option>
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