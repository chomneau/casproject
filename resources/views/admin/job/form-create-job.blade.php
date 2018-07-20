{{--@include('admin.admin-layout.sectionstyle')--}}
{{--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
{{--<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>--}}

{{--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>--}}
{{--<script>--}}
    {{--tinymce.init({ selector:'textarea',--}}
        {{--plugins: "link",--}}
        {{--menu: 'disable',--}}
        {{--plugins: "lists",--}}
        {{--toolbar: "numlist bullist",--}}
        {{--//plugin:"advlist",--}}
        {{--browser_spellcheck: true,--}}
    {{--});--}}
{{--</script>--}}


<div class="right_col" role="main">
    <div class="clearfix"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Post a new job <small>Sessions</small></h2>
                        <div class="clearfix"></div>
                    </div>



                    <div class="x_content">
                        <form action="{{ route('createjob.postjob', ['id'=>$company->id]) }}" method="post">
                            {{csrf_field()}}

                            <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="wizard">
                                       <div class="tab-content">
                                           <div class="tab-pane active" role="tabpanel" id="step1" style="margin-top: -25px">
                                               @include('admin.job.components.job-description')
                                               @include('admin.job.components.job-detail')
                                               @include('admin.job.components.job-preferred-candidate')
                                               <ul class="list-inline pull-right">
                                                   <li><button type="submit" class="btn btn-primary">Post now</button></li>
                                               </ul>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                            <div class="col-md-1"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

