@extends('layouts.app')

@section('content')
    @include('user.headBlank')

    <div class="bootstrap-iso">
        <div class="container" style="margin-top: 1em">
            <div class="row">
                <div class="col-md-3 pull-left">
                    @include('user.userSidebar')
                </div>

                <div class="col-md-9 pull-right">

                    <div class="well bs-component">
                        <form action="" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <fieldset>
                                <legend>CREATE RESUME</legend>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" for="firstName">Position</label>
                                        <input type="text" name="position" value="" class="form-control" id="inputDefault" placeholder="position">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="lastName">Employer Name</label>
                                        <input type="text" name="employer_name" class="form-control" id="inputDefault" placeholder="employer name (company / organization)">
                                    </div>



                                </div>
                                {{--end right columm--}}

                                <div class="col-md-6 col-sm-12" style="padding-left: 2em">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">

                                            <div class="form-group">
                                                <label class="control-label" for="inputDefault">Start month*</label>
                                                <select class="form-control" id="select" name="start_month">
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label" for="address">Start Year*</label>
                                                <input type="number" class="form-control" name="start_year" id="phone" placeholder="Year">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">

                                            <div class="form-group">
                                                <label class="control-label" for="inputDefault">End month*</label>
                                                <select class="form-control" id="select" name="start_month">
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label" for="address">End year*</label>
                                                <input type="number" class="form-control" name="start_year" id="phone" placeholder="Year">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div style="margin-top: 40px">
                                    {{--<label for="textArea" class="col-lg-6 text-left">About Yourself</label>--}}

                                </div>

                                <div class="col-lg-12 ">
                                    <label class="control-label" for="address">Describe your duties here </label>
                                    <textarea class="form-control" rows="9" name="description" id="textArea"></textarea>
                                    <span class="help-block">Describe about Your duty</span>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                                    </div>
                                </div>

                            </fieldset>

                        </form>
                    </div>
                </div>



                @include('inc.logoSlider')

            </div>
        </div>
    </div>
@endsection

