@include('end_user.head_style')
<body class="app">
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

    <div class="page-container" >
    
    {{-- top sidebar --}}
    @include('end_user.end_user_topSidebar')

    <main class="main-content bgc-grey-100" style="overflow-y: scroll; height:700px;">
        <div id="mainContent">
            <div class="container-fluid">

                <div class="row" >
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">

                        

                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset($staff->Adminprofile->avatar) }}" width="300" height="300" style="border-radius:50%; border: 6px solid rgb(113, 222, 222); margin-top: 25px; margin-left: 20px" alt="profile" />
                            </div>

                            <div class="col-md-8">
                                <table class="table borderless font-weight-bold" >
                                        <tbody>
                                            <h2>{{ $staff->name }} </h2>
                                        </tbody>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td> :</td>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td> :</td>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <td>Position</td>
                                            <td> :</td>
                                            <td>{{ $staff->Adminprofile->position}}</td>

                                        </tr>
                                        <tr>
                                          <td>Degree</td>
                                          <td> :</td>
                                          <td></td>

                                        </tr>

                                        

                                        <tr>
                                            <td style="border-bottom: 0 ">Phone</td>
                                            <td> :</td>
                                            <td>{{ $staff->Adminprofile->phone}}</td>

                                        </tr>

                                        <tr>
                                            <td >Email</td>
                                            <td> :</td>
                                            <td>{{ $staff->email}}</td>

                                        </tr>

                                      </table>
                            </div>
                        </div>


                        </div>
                    </div>
                </div>

                

            </div>

        </div>
    </main>     


    
    <script type="text/javascript" src="{{ asset('colortheme/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('colortheme/bundle.js') }}"></script>

</body>

</html>