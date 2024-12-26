@extends('layout.app')
@section('main')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dealer Creation</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dealer</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-md-5">
                    <div class="card">
                        <!-- card body -->
                        <div class="card-body">
                            <form action="" method="post" id="dealer_creation_form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <label for="input-dealer_name">Dealer Name</label>
                                            <input type="text" class="form-control" id="input-dealer_name"
                                                placeholder="Enter Dealer name" name="dealername">
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_code">Dealer Code</label>
                                            <input type="text" class="form-control" id="input-dealer_code"
                                                placeholder="Enter Employee Code" name="dealer_code">
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_designation">Designation</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="input-dealer_designation">
                                                <option selected>Open this select menu</option>
                                                {{-- @foreach ($designations as $designation)
                                                    <option value="{{ $designation->id }}">
                                                        {{ $designation->designation_name }}</option>
                                                @endforeach --}}
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_department_name">Department</label>
                                            <input type="text" class="form-control" id="input-dealer_department_name"
                                                placeholder="Enter Department name" name="department_name">
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-mobile_num">Mobile No</label>
                                            <input type="text" class="form-control" id="input-dealer_mobile_num"
                                                placeholder="Enter Mobile Number" name="mobile_num">
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-emp_address">Address</label>
                                            <textarea name="" cols="15" rows="3" class="form-control" id="input-dealer_address"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-email_address">E-mail</label>
                                            <input type="text" class="form-control" id="input-dealer_email_address"
                                                placeholder="Enter Email address" name="email_address">
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-DOB">DOB</label>
                                            <input type="date" class="form-control" id="input-dealer_DOB"
                                                placeholder="Enter DOB" name="emp_DOB">
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-doj">DOJ</label>
                                            <input type="date" class="form-control" id="input-dealer_doj"
                                                placeholder="Enter Department name" name="employee_doj">
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dol">DOL</label>
                                            <input type="date" class="form-control" id="input-dealer_dol"
                                                placeholder="Enter Mobile Number" name="employee_dol">
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_branch">Branch</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="input-dealer_branch">
                                                <option selected>Open this select menu</option>
                                                @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_reportsto">Reports To</label>
                                            {{-- <select class="form-select" aria-label="Default select example"
                                                id="input-emp_reportsto">
                                                <option selected>Open this select menu</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}">{{ $employee->emp_name }}</option>
                                                @endforeach
                                            </select> --}}
                                            <select class="form-select" aria-label="Default select example"
                                                id="input-dealer_reportsto">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        {{-- <div class="mt-3">
                                            <label for="input-dealer_role">Role</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="input-dealer_role">
                                                <option selected>Open this select menu</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}

                                        <hr>
                                        <div class="mt-3">
                                            <h5 class="underline">
                                                <u>Territory</u>
                                            </h5>
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_country">Country</label>
                                            <select class="form-select input-dealer_country"
                                                aria-label="Default select example" id="input-dealer_country">
                                                <option selected>Open this select menu</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="mt-3">
                                            <label for="input-emp_state">State</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="input-emp_state">
                                                <option selected>Open this select menu</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <div class="mt-3">
                                            <label for="input-dealer_state">State</label>
                                            <select class="form-select input-dealer_state"
                                                aria-label="Default select example" id="input-dealer_state">
                                                <option selected disabled>Open this select menu</option>
                                            </select>
                                        </div>

                                        <div class="mt-3">
                                            <label for="input-dealer_district">District</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="input-dealer_district">
                                                <option selected>Open this select menu</option>
                                                {{-- @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->district_name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_base_district">Base District</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="input-dealer_base_district">
                                                <option selected>Open this select menu</option>
                                                {{-- @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->district_name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_home_district">Home District</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="input-dealer_home_district">
                                                <option selected>Open this select menu</option>
                                                {{-- @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->district_name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <hr>
                                        <div class="mt-3">
                                            <h5 class="underline">
                                                <u>Login Details</u>
                                            </h5>
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_login_id">Login ID</label>
                                            <input type="text" class="form-control" id="input-dealer_login_id"
                                                placeholder="Enter Login ID" name="dealer_login_id">
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_password">Password</label>
                                            <input type="password" class="form-control" id="input-dealer_password"
                                                placeholder="Enter password" name="dealer_password">
                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-dealer_confirm_password">Confirm Password</label>
                                            <input type="password" class="form-control"
                                                id="input-dealer_confirm_password" placeholder="Enter confirm password"
                                                name="dealer_confirm_password">
                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                        </div>
                                        <div class="mt-3">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <button class="btn btn-success" type="submit">
                                                        Save
                                                    </button>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button class="btn btn-secondary">
                                                        Clear
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div><!-- end row-->


        </div>
        <!-- container-fluid -->
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
@section('scripts')
    <script>
        const validator = new window.JustValidate("#dealer_creation_form");

        validator
            .addField("#input-dealer_name", [{
                    rule: "required",
                    errorMessage: "Dealer name is required",
                },
                {
                    rule: "minLength",
                    value: 3,
                    errorMessage: "Dealer name must be at least 3 characters",
                },
                {
                    rule: "maxLength",
                    value: 20,
                    errorMessage: "Dealer name must be less than 20 characters",
                },
            ])
            .addField("#input-dealer_code", [{
                    rule: "required",
                    errorMessage: "Dealer Code is required",
                },
                {
                    rule: "minLength",
                    value: 3,
                    errorMessage: "Dealer code must be at least 3 characters",
                },
                {
                    rule: "maxLength",
                    value: 20,
                    errorMessage: "Dealer code must be less than 20 characters",
                },
            ])
            .addField("#input-dealer_designation", [{
                rule: "required",
                errorMessage: "Employee designation is required",
            }, ])
            .addField("#input-dealer_department_name", [{
                    rule: "required",
                    errorMessage: "Department is required",
                },
                {
                    rule: "minLength",
                    value: 3,
                    errorMessage: "Department name must be at least 3 characters",
                },
                {
                    rule: "maxLength",
                    value: 20,
                    errorMessage: "Department name must be less than 20 characters",
                },
            ])
            .addField("#input-dealer_mobile_num", [{
                    rule: "required",
                    errorMessage: "Mobile Number is required",
                },
                {
                    rule: "minLength",
                    value: 10,
                    errorMessage: "Mobile Number must be at least 3 characters",
                },
                {
                    rule: "maxLength",
                    value: 10,
                    errorMessage: "Mobile Number must be less than 20 characters",
                },
            ])
            .addField("#input-dealer_email_address", [{
                    rule: "required",
                    errorMessage: "Email is required",
                },
                {
                    rule: 'email',
                    errorMessage: 'Please enter a valid email address',
                },
            ])
            .addField("#input-dealer_address", [{
                    rule: "required",
                    errorMessage: "Address is required",
                },
                {
                    rule: "minLength",
                    value: 10,
                    errorMessage: "Address must be at least 3 characters",
                },
                {
                    rule: "maxLength",
                    value: 50,
                    errorMessage: "Address must be less than 50 characters",
                },
            ])
            .addField("#input-dealer_DOB", [{
                rule: "required",
                errorMessage: "DOB is required",
            }, ])
            .addField("#input-dealer_doj", [{
                rule: "required",
                errorMessage: "DOJ is required",
            }, ])
            .addField("#input-dealer_branch", [{
                rule: "required",
                errorMessage: "Branch is required",
            }, ])
            .addField("#input-dealer_reportsto", [{
                rule: "required",
                errorMessage: "Reports to is required",
            }, ])
            // .addField("#input-dealer_role", [{
            //     rule: "required",
            //     errorMessage: "Role is required",
            // }, ])
            .addField("#input-dealer_country", [{
                rule: "required",
                errorMessage: "Country is required",
            }, ])
            .addField("#input-dealer_state", [{
                rule: "required",
                errorMessage: "State is required",
            }, ])
            .addField("#input-dealer_district", [{
                rule: "required",
                errorMessage: "District is required",
            }, ])
            .addField("#input-dealer_base_district", [{
                rule: "required",
                errorMessage: "Base District is required",
            }, ])
            .addField("#input-dealer_home_district", [{
                rule: "required",
                errorMessage: "Home District is required",
            }, ])
            .addField("#input-dealer_login_id", [{
                    rule: "required",
                    errorMessage: "Login id is required",
                },
                {
                    rule: "minLength",
                    value: 3,
                    errorMessage: "Login id must be at least 3 characters",
                },
                {
                    rule: "maxLength",
                    value: 20,
                    errorMessage: "Login id must be less than 20 characters",
                },
            ])
            .addField("#input-dealer_password", [{
                    rule: "required",
                    errorMessage: "Employee password is required",
                },
                {
                    rule: "minLength",
                    value: 8,
                    errorMessage: "Employee password must be at least 8 characters",
                },
                {
                    rule: "maxLength",
                    value: 20,
                    errorMessage: "Employee password must be less than 20 characters",
                },
            ])
            .addField("#input-dealer_confirm_password", [{
                rule: "required",
                errorMessage: "Confirm password is required",
            }, ])
            .onSuccess((event) => {
                event.preventDefault();
                const dealerName = $("#input-dealer_name").val();
                const dealercode = $("#input-dealer_code").val();
                const dealerDesignation = $("#input-dealer_designation").val();
                const dealerDepartment = $("#input-dealer_department_name").val();
                const dealerMobile = $("#input-dealer_mobile_num").val();
                const dealerEmail = $("#input-dealer_email_address").val();
                const dealerAddress = $("#input-dealer_address").val();
                const dealerDOB = $("#input-dealer_DOB").val();
                const dealerDOJ = $("#input-dealer_doj").val();
                const dealerBranch = $("#input-dealer_branch").val();
                const dealerReportsto = $("#input-dealer_reportsto").val();
                // const dealerRole = $("#input-dealer_role").val();
                const dealerCountry = $("#input-dealer_country").val();
                const dealerState = $("#input-dealer_state").val();
                const dealerDistrict = $("#input-dealer_district").val();
                const dealerBaseDistrict = $("#input-dealer_base_district").val();
                const dealerHomeDistrict = $("#input-dealer_home_district").val();

                const dealer_login_id = $("#input-dealer_login_id").val();
                const dealer_password = $("#input-dealer_password ").val();
                const dealer_confirm_password = $("#input-dealer_confirm_password").val();



                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                // AJAX Submission
                $.ajax({
                    type: "POST",
                    url: "/dealer_store",
                    data: {
                        dealerName: dealerName,
                        dealercode: dealercode,
                        dealerDesignation: dealerDesignation,
                        dealerDepartment: dealerDepartment,
                        dealerMobile: dealerMobile,
                        dealerEmail: dealerEmail,
                        dealerAddress: dealerAddress,
                        dealerDOB: dealerDOB,
                        dealerDOJ: dealerDOJ,
                        dealerBranch: dealerBranch,
                        dealerReportsto: dealerReportsto,
                        dealerCountry: dealerCountry,
                        dealerState: dealerState,
                        dealerDistrict: dealerDistrict,
                        dealerBaseDistrict: dealerBaseDistrict,
                        dealerHomeDistrict: dealerHomeDistrict,
                        dealer_login_id: dealer_login_id,
                        dealer_password: dealer_password,
                        dealer_confirm_password: dealer_confirm_password,
                    },
                    beforeSend: function() {
                        $(".preloader").fadeIn();
                    },
                    success: function(response) {
                        $(".preloader").fadeOut();

                        if (response.status === 201) {
                            Swal.fire({
                                title: "Success",
                                text: response
                                    .message,
                                icon: "success",
                                customClass: {
                                    popup: "swal-custom-popup",
                                },
                            });

                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                customClass: {
                                    popup: "swal-custom-popup",
                                },
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                },
                            });

                            Toast.fire({
                                icon: "success",
                                title: response
                                    .message,
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response.message || "An unexpected error occurred.",
                                icon: "error",
                            });

                            console.log(response.message)
                        }

                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function(xhr) {
                        $(".preloader").fadeOut();

                        Swal.fire({
                            title: "Error",
                            text: xhr.responseJSON?.message || "An error occurred.",
                            icon: "error",
                        });

                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);

                        console.log(xhr.responseJSON?.message);
                    },
                });
            });


        // const editvalidator = new window.JustValidate("#");

        // editvalidator
        //     .addField("#edit-master_branch_name", [{
        //             rule: "required",
        //         },
        //         {
        //             rule: "minLength",
        //             value: 3,
        //         },
        //         {
        //             rule: "maxLength",
        //             value: 20,
        //         },
        //     ])
        //     .onSuccess((event) => {
        //         // event.currentTarget.submit();
        //         event.preventDefault();

        //         var branchName = $("#edit-master_branch_name").val();
        //         var branchID = $("#edit-branch_id").val();

        //         var formData = {
        //             branchName: branchName,
        //             branchID: branchID,
        //         };

        //         $.ajaxSetup({
        //             headers: {
        //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        //             },
        //         });

        //         $.ajax({
        //             type: "POST",
        //             url: "/branch_update",
        //             data: formData,
        //             beforeSend: function() {
        //                 $(".preloader").fadeIn();
        //             },
        //             success: function(response) {
        //                 console.log(response);
        //                 $(".preloader").fadeOut();

        //                 if (response.status === 200) {
        //                     Swal.fire({
        //                         title: "Success",
        //                         text: response
        //                             .message,
        //                         icon: "success",
        //                         customClass: {
        //                             popup: "swal-custom-popup",
        //                         },
        //                     });

        //                     const Toast = Swal.mixin({
        //                         toast: true,
        //                         position: "top-end",
        //                         showConfirmButton: false,
        //                         timer: 1500,
        //                         timerProgressBar: true,
        //                         customClass: {
        //                             popup: "swal-custom-popup",
        //                         },
        //                         didOpen: (toast) => {
        //                             toast.onmouseenter = Swal.stopTimer;
        //                             toast.onmouseleave = Swal.resumeTimer;
        //                         },
        //                     });

        //                     Toast.fire({
        //                         icon: "success",
        //                         title: response
        //                             .message,
        //                     });
        //                 } else {
        //                     Swal.fire({
        //                         title: "Error",
        //                         text: "An unexpected error occurred.",
        //                         icon: "error",
        //                         customClass: {
        //                             popup: "swal-custom-popup", // Add a custom class
        //                         },
        //                     });
        //                 }

        //                 setTimeout(function() {
        //                     window.location.reload();
        //                 }, 1500);
        //             },
        //             error: function(xhr, status, error) {
        //                 $(".preloader").fadeOut();
        //                 console.error(xhr.responseText);
        //             },
        //         });
        //     });


        // $(document).on('click', '#btn_branch_update_clear', function() {
        //     $('#branch_edit_form').hide();
        //     $('#branch_add_form').show();
        //     $('#edit-branch_id').val('');
        // })
    </script>
@endsection
