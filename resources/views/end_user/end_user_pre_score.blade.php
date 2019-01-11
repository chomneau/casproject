<main class="main-content bgc-grey-100" >
    <div id="mainContent">
        <div class="container-fluid" >

            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-40 mB-20" style="margin-bottom: 3em;">
                        <h4 class="c-grey-900 mB-20">Student Score Record</h4>
                        
                        <div class="table-wrapper-scroll-y">
                            

                        
                        <table class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Subjects</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Quarter 1</th>
                                    <th scope="col">Quarter 2</th>
                                    
                                    <th scope="col">Quarter 3</th>
                                    <th scope="col">Quarter 4</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($prekScores)) @foreach( $prekScores as $prekScore)

                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $prekScore->KSubject->name }}</td>
                                    <td>{{ $prekScore->KLevel->name }}</td>
                                    <td>{{ $prekScore->quarter_1 }}</td>
                                    <td>{{ $prekScore->quarter_2 }}</td>
                                    
                                    <td>{{ $prekScore->quarter_3 }}</td>
                                    <td>{{ $prekScore->quarter_4 }}</td>
                                            

                                </tr>
                                @endforeach @endif


                            </tbody>
                        </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>