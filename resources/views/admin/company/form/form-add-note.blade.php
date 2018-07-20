<div class="bs-example" >
    {{--<!-- Small modal -->--}}
    {{--<button class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Small modal</button>--}}

    <div id="smallModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-commenting-o fa-lg" aria-hidden="true"></i> add note</h4>
                </div>
                <form action="{{ route('company.note', ['id'=>$company->id]) }}" method="post" class="form-group">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="panel">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="panel">
                            <label for="title">Body</label>
                            <textarea name="body" id="" cols="20" rows="10" class="form-control"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).read(function () {
        $('.ourItem').each(function () {
            $(this).click(function (event) {
                var text = $(this).text();
                console.log(text);
            });
        });
    });
</script>