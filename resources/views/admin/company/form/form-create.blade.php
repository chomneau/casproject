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

    <div class="step1" style="margin-top: -20px">
            <div class="row">
                <div class="col-md-6 {{ $errors->has('companyName') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" name="companyName" class="form-control" value="{{ old('companyName') }}" required autofocus id="exampleInputEmail1" placeholder="company Name">
                </div>
                <div class="col-md-6 {{ $errors->has('logo') ? ' has-error' : '' }}">
                    <label for="logo">Company Logo</label>
                    <input type="file" name="logo" class="form-control" value="{{ old('logo') }}" required autofocus placeholder="Email" required>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 {{ $errors->has('contactPerson') ? ' has-error' : '' }}">
                    <label for="contactPerson">Contact person</label>
                    <input type="text" name="contactPerson" class="form-control" value="{{ old('contactPerson') }}" required autofocus placeholder="Contact person">
                </div>

                <div class="col-md-6 {{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Type</label>
                    <select name="companyType" id="" class="form-control" required>
                        <option value="">--select company type--</option>
                        @if(count($companyType))
                            @foreach($companyType as $companyTypes)
                                <option value="{{ $companyTypes->id }} ">{{ $companyTypes->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 {{ $errors->has('industryType') ? ' has-error' : '' }}">
                    <label for="industryType">Industry type</label>
                    <select name="industryType" id="" class="form-control" required>
                        <option value="">--select job Category--</option>
                        @if(count($industryType))
                            @foreach($industryType as $industryTypes)
                                <option value="{{ $industryTypes->id }} ">{{ $industryTypes->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="Email" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 {{ $errors->has('employeeSize') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Number of Employees</label>
                    <select name="employeeSize" id="" class="form-control" required>
                        <option value="">--select employee size--</option>
                        @if(count($employeeSize))
                            @foreach($employeeSize as $employeeSizes)
                                <option value="{{ $employeeSizes->id }} ">{{ $employeeSizes->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-md-6 {{ $errors->has('location') ? ' has-error' : '' }}">
                    <label for="location">Company location</label>
                    <select name="location" id="" class="form-control" required>
                        <option value="">--select location--</option>
                        @if(count($location))
                            @foreach($location as $locations)
                                <option value="{{ $locations->id }} ">{{ $locations->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 {{ $errors->has('employeeSize') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required autofocus placeholder="Phone" required>
                </div>
                <div class="col-md-6 {{ $errors->has('website') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Website (url)</label>
                    <input type="url" name="website" class="form-control" value="{{ old('website') }}" required autofocus placeholder="company website (url)">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 {{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" required autofocus placeholder="Company address">
                </div>
            </div>

        <div class="row">
            <div class="col-md-12 {{ $errors->has('about') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">About Company</label>
                <textarea name="about" id="" cols="15" rows="8" class="form-control" >{{ $errors->has('about') ? ' has-error' : '' }}</textarea>
            </div>
        </div>
    </div>
{{--end step 1--}}
        <div class="step-22">

        </div>

