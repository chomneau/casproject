<!-- show sample data not from database -->

            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Grade : {{ $grade_id->name }} {{ $grade_id->grade_name }}</h4>
                        
                        <div class="row">
                            <div class="col-md-3 col-xs-3 " >
                                <div class="card">
                                  <div class="card-header text-center">
                                    <h5>Unexcused</h5>
                                  </div>
                                  <div class="card-body">
                                    <h1 class="card-title text-center">{{ $unexcused }}</h1>
                                    <p class="card-text text-center">1 Unexcused = 1 absent</p>
                                    
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-xs-3" >
                                <div class="card">
                                  <div class="card-header text-center bg-info text-white">
                                    <h5>Excused</h5>
                                  </div>
                                  <div class="card-body">
                                    <h1 class="card-title text-center">{{ $excused }}</h1>
                                    <p class="card-text text-center">1 Excused = 1 absent</p>
                                    
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-xs-3">
                                <div class="card  mb-3">
                                  <div class="card-header text-center bg-success  text-white">
                                    <h5>Tardy</h5>
                                  </div>
                                  <div class="card-body">
                                    <h1 class="card-title text-center">{{ $tardy }}</h1>
                                    <p class="card-text text-center">3 Tardy = 1 absent</p>
                                    
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-xs-3" >
                                <div class="card bg-danger text-white mb-3">
                                  <div class="card-header text-center  text-white">
                                    <h5 text text-red>Total Absent</h5>
                                  </div>
                                  <div class="card-body">
                                    <h1 class="card-title text-center">{{ $totalAbsent }}</h1>
                                    <p class="card-text text-center">Total all absent</p>
                                    
                                  </div>
                                </div>
                            </div>

                        </div>

                        
                    </div>
                </div>
            </div>


        
