@include('end_user.head_style')
<body class="app" style="overflow-y: scroll; height:700px;">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
            loader.classList.add('fadeOut');
            }, 300);
        });
    </script>

    {{-- sidebar --}}
    @include('end_user.end_user_sidebar')

    <div class="page-container"  >
        {{-- top sidebar --}}
    @include('end_user.end_user_topSidebar')
    @include('end_user.student_profile')
    </div>

    <script type="text/javascript" src="{{ asset('colortheme/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('colortheme/bundle.js') }}"></script>


<script src="{{ asset('js/toastr.min.js') }}"></script>

<script>
    @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
    @endif

    @if(Session::has('error'))
        toastr.error("{{Session::get('error')}}")
    @endif
</script>

</body>

</html>