@extends('layout.app')
@section('main')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Designation Master</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                                <li class="breadcrumb-item active">Designation</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-xl-4 col-md-5">
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <form action="" method="post" id="designation_add_form" data-url="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <label for="input-master_designation_name">Designation Name</label>
                                            <input type="text" class="form-control" id="input-master_designation_name"
                                                placeholder="Enter Designation name" name="master_designation_name">
                                        </div>

                                        <div class="mt-3">
                                            <div class="row">
                                                <div class="col-lg-8">
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
                            <form action="" method="post" id="designation_edit_form" data-url="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <label for="edit-master_designation_name">Designation Name</label>
                                            <input type="text" class="form-control" id="edit-master_designation_name"
                                                placeholder="Enter Designation name" name="master_designation_name">
                                            <input type="hidden" name="" id="edit-designation_id">
                                        </div>

                                        <div class="mt-3">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <button class="btn btn-success" type="submit">
                                                        update
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
                    <div class="card card-h-100">
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
        // ADD DESIGNATION VALIDATION
        const validator = new window.JustValidate("#designation_add_form");

        validator
            .addField("#input-master_designation_name", [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 3,
                },
                {
                    rule: "maxLength",
                    value: 20,
                },
            ])
            .onSuccess((event) => {
                // event.currentTarget.submit();
                event.preventDefault();

                var designationName = $("#input-master_designation_name").val();
                var designationID = $("#input-designation_id").val();

                var formData = {
                    designationName: designationName,
                    designationID: designationID,
                };

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    type: "POST",
                    url: "/designation_store",
                    data: formData,
                    beforeSend: function() {
                        $(".preloader").fadeIn();
                    },
                    success: function(response) {
                        console.log(response);
                        $(".preloader").fadeOut();

                        if (response.status === 201) {
                            Swal.fire({
                                title: "Success",
                                text: response.message, // Use the message from the server
                                icon: "success",
                                customClass: {
                                    popup: "swal-custom-popup", // Add a custom class
                                },
                            });

                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                customClass: {
                                    popup: "swal-custom-popup", // Apply the custom class for the toast
                                },
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                },
                            });

                            Toast.fire({
                                icon: "success",
                                title: response.message, // Use the message from the server
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "An unexpected error occurred.",
                                icon: "error",
                                customClass: {
                                    popup: "swal-custom-popup", // Add a custom class
                                },
                            });
                        }

                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function(xhr, status, error) {
                        $(".preloader").fadeOut();
                        console.error(xhr.responseText);
                        // Optionally display error notification
                    },
                });
            });


        // EDIT FORM VALIDATION
        const editvalidator = new window.JustValidate("#designation_edit_form");

        editvalidator
            .addField("#edit-master_designation_name", [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 3,
                },
                {
                    rule: "maxLength",
                    value: 20,
                },
            ])
            .onSuccess((event) => {
                // event.currentTarget.submit();
                event.preventDefault();

                var designationName = $("#edit-master_designation_name").val();
                var designationID = $("#edit-designation_id").val();

                var formData = {
                    designationName: designationName,
                    designationID: designationID,
                };

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    type: "POST",
                    url: "/designation_update",
                    data: formData,
                    beforeSend: function() {
                        $(".preloader").fadeIn();
                    },
                    success: function(response) {
                        console.log(response);
                        $(".preloader").fadeOut();

                        if (response.status === 200) {
                            Swal.fire({
                                title: "Success",
                                text: response.message, // Use the message from the server
                                icon: "success",
                                customClass: {
                                    popup: "swal-custom-popup", // Add a custom class
                                },
                            });

                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                customClass: {
                                    popup: "swal-custom-popup", // Apply the custom class for the toast
                                },
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                },
                            });

                            Toast.fire({
                                icon: "success",
                                title: response.message, // Use the message from the server
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "An unexpected error occurred.",
                                icon: "error",
                                customClass: {
                                    popup: "swal-custom-popup", // Add a custom class
                                },
                            });
                        }

                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function(xhr, status, error) {
                        $(".preloader").fadeOut();
                        console.error(xhr.responseText);

                    },
                });
            });
    </script>
@endsection
