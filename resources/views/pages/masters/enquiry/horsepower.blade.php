@extends('layout.app')
@section('main')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Horsepower Master</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Enquiry</a></li>
                                <li class="breadcrumb-item active">Horsepower</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-5">
                    <div class="card card-h-50">
                        <!-- card body -->
                        <div class="card-body">
                            <form action="" method="post" id="horsepower_add_form" data-url="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <label for="input-master_horsepower_name">HorsePower Name</label>
                                            <input type="text" class="form-control" id="input-master_horsepower_name"
                                                placeholder="Enter Horsepower" name="master_horsepower_name">
                                        </div>

                                        <div class="mt-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button class="btn btn-success" type="submit"
                                                        id="btn_horsepower_create">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="" method="post" id="horsepower_edit_form" data-url="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <label for="edit-master_horsepower_name">HorsePower Name</label>
                                            <input type="text" class="form-control" id="edit-master_horsepower_name"
                                                placeholder="Enter Horsepower" name="master_horsepower_name">
                                            <input type="hidden" name="" id="edit-horsepower_id">
                                        </div>

                                        <div class="mt-3">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <button class="btn btn-success" type="submit"
                                                        id="btn_horsepower_update">
                                                        Update
                                                    </button>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button class="btn btn-secondary" type="button"
                                                        id="btn_horsepower_update_clear">
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

        <!-- end page title -->





    </div>
    <!-- container-fluid -->
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
@section('scripts')
    <script>
        const validator = new window.JustValidate("#horsepower_add_form");

        validator
            .addField("#input-master_horsepower_name", [{
                    rule: "required",
                    errorMessage: "Horsepower name is required",
                },
                {
                    rule: "minLength",
                    value: 3,
                    errorMessage: "Horsepower name must be at least 3 characters",
                },
                {
                    rule: "maxLength",
                    value: 20,
                    errorMessage: "Horsepower name must be less than 20 characters",
                },
            ])
            .onSuccess((event) => {
                event.preventDefault();
                const horsepowerName = $("#input-master_horsepower_name").val();

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                // AJAX Submission
                $.ajax({
                    type: "POST",
                    url: "/horsepower_store",
                    data: {
                        horsepowerName: horsepowerName,
                    },
                    beforeSend: function() {
                        $(".preloader").fadeIn();
                    },
                    success: function(response) {
                        $(".preloader").fadeOut();

                        if (response.status === 200) {
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
                            console.log(response.message);
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
                    },
                });
            });


        const editvalidator = new window.JustValidate("#horsepower_edit_form");

        editvalidator
            .addField("#edit-master_horsepower_name", [{
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

                var horsepowerName = $("#edit-master_horsepower_name").val();
                var horsepowerID = $("#edit-horsepower_id").val();

                var formData = {
                    horsepowerName: horsepowerName,
                    horsepowerID: horsepowerID,
                };

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    type: "POST",
                    url: "/horsepower_update",
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


        $(document).on('click', '#btn_horsepower_update_clear', function() {
            $('#horsepower_edit_form').hide();
            $('#horsepower_add_form').show();
            $('#edit-horsepower_id').val('');
        })
    </script>
@endsection
