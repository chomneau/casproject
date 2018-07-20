<div class="panel panel-default">
    <div class="panel-heading"><h3>Job Location</h3></div>
    <div class="panel-body">

        <div class="bs-docs-section">
            <div class="bs-component">
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Job Location</th>
                        <th>Create_date</th>
                        <th class="pull-right" style="margin-right: 5em">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($location))
                        @foreach($location as $joblocation)
                    <tr>

                            <td>{{$joblocation->id}}</td>
                            <td>{{$joblocation->location}}</td>
                            <td>{{$joblocation->created_at}}</td>
                            <td>
                                <div class="action pull-right">
                                    <Button class="btn btn-primary btn-sm">Edit</Button>
                                    <Button class="btn btn-danger btn-sm">Delete</Button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    @else
                        <h2>Job Location not found!</h2>
                    @endif
                    </tbody>
                </table>
            </div><!-- /example -->
        </div>

    </div>
</div>

