@extends('admin.admin-layout.main')

@section('content')

 @if(Auth::guard('admin')->check())

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ALL FILE LIBRARY <small></small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-right top_search">
                        <form action="{{ route('teacher.search')  }}" method='get'>
                            {{csrf_field()}}
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" placeholder="Search file name" required >
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Search</button>
                                </span>                       
                            </div>
                        </form>

                    </div>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            {{-- <h2 >
                                <span class="text-primary" style="margin-right:20px">TOTAL TEACHERS : 
                                  <b style="color:cadetblue"> {{ $teacherCount }} </b>
                                </span>
                                <span style="margin-right:20px">MALE : 
                                  <b style="color:cadetblue"> {{$teacherCountMale }} </b>
                                </span>
                                <span>FEMALE : 
                                  <b style="color:cadetblue"> {{$teacherCountFemale }}</b>
                                </span>
                              
                              </h2> --}}
                              
                            <form action="{{ route('admin.filelibrary.upload')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                  <div class="col-md-11">
                                      <input type="file" name="fileLibrary" class="form-control" >
                                  </div>
                                  <div class="col-md-1">
                                    <button class="btn btn-primary btn-md pull-right">upload</button>
                                  </div>
                                </div>
                                


                              </form>  

                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">



                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 70%">File Name</th>
                                    
                                    <th>Upload date</th>
                                    
                                    
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($fileLibrary))
                                    @foreach($fileLibrary as $library)
                                        <tr>
                                           
                                          <td>#</td>
                                            
                                            <td>
                                                <a> {{ $library->filename }}</a>
                                                
                                                <br />
                                                {{-- <small>uploaded {{ $library->created_at->diffForHumans() }}</small> --}}
                                            </td>

                                          
                                            <td>
                                                {{ date_format($library->created_at, 'd-M-Y') }}
                                            </td>
                                            
                                            
                                            
                                            <td>
                                                 
                                            <a href="{{ asset('uploads/file_library/'.$library->filename)}}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-download" aria-hidden="true"></i> Download </a>
                                                                                       
                                                
                                                <a href="{{ route('admin.filelibrary.delete', ['id'=>$library->id]) }}" class="btn btn-danger btn-sm" Onclick="return ConfirmDelete()"><i class="fa fa-trash-o"></i> Delete </a>

                                                
                                            </td>
                                        </tr>
                                  {{-- delete conformation function --}}
                                        <script>
                                            function ConfirmDelete() 
                                                {
                                                    return confirm("Are you sure you want to delete?");
                                                }
                                        </script>

                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <!-- end project list -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->




  


@endif


@endsection