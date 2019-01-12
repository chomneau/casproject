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
        
                <!-- start content -->


                <div class="row" >
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">

                             
                            <h3>
                                Staff's Contact              
                            </h3>

                            <div class="dropdown-divider" style="margin-bottom: 20px"></div>
                            
                           

                            
                            <div class="container">
                                
                                <div class="row">

                                    @foreach($staff as $staffs)

                                    <div class="col-sm-3">
                                        <div class="card">
                                            <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                                            <div class="avatar">
                                                <img src="{{ asset($staffs->Adminprofile->avatar) }}" alt="" />
                                            </div>
                                            <div class="content">
                                                <p> 
                                                    <span class="font-weight-bold">
                                                        {{ $staffs->name }} 
                                                        
                                                    </span>  

                                                </p>
                                                <p>
                                                    <a href="{{ route('staff.profile', ['student_id'=>$students->id, 'staff_id'=>$staffs->id] )}}" class="btn btn-info ">

                                                        View Profile

                                                    </a>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @endforeach

                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>


                <!-- end content -->

            </div>

        </div>
    </main>     


    
    <script type="text/javascript" src="{{ asset('colortheme/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('colortheme/bundle.js') }}"></script>

</body>

</html>