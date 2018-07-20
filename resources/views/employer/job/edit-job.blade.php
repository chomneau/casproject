{{--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
{{--<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>--}}

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


@extends('admin.admin-layout.main')
@section('content')
    @include('employer.job.form-editJob')
@endsection