@extends('layout.app')
@section('main')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Role Master</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                                <li class="breadcrumb-item active">Role</li>
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
                            <form action="" method="post" id="role_add_form" data-url="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <label for="input-master_role_name">Role Name</label>
                                            <input type="text" class="form-control" id="input-master_role_name"
                                                placeholder="Enter Role name" name="master_role_name">
                                        </div>

                                        <div class="mt-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button class="btn btn-success" type="submit" id="btn_role_create">
                                                        Save
                                                    </button>
                                                </div>
                                                {{-- <div class="col-lg-3">
                                                    <button class="btn btn-secondary" type="button"
                                                        id="btn_branch_update_clear">
                                                        Clear
                                                    </button>
                                                </div> --}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="" method="post" id="role_edit_form" data-url="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <label for="edit-master_role_name">Role Name</label>
                                            <input type="text" class="form-control" id="edit-master_role_name"
                                                placeholder="Enter Role name" name="master_role_name">
                                            <input type="hidden" name="" id="edit-role_id">
                                        </div>

                                        <div class="mt-3">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <button class="btn btn-success" type="submit" id="btn_role_update">
                                                        Update
                                                    </button>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button class="btn btn-secondary" type="button"
                                                        id="btn_role_update_clear">
                                                        Clear
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="" method="post" id="role_assign_form" data-url="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mt-3">
                                            <label for="assign-master_role_name">Role Name</label>
                                            <input type="text" class="form-control" id="assign-master_role_name"
                                                placeholder="Enter Role name" name="assign_role_name" disabled>
                                            <input type="hidden" name="" id="assign-role_id">
                                        </div>

                                        <div class="mt-3">
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input class="form-check-input permissionassign" type="checkbox"
                                                        value="{{ $permission->id }}" id="flexCheckroleassign">
                                                    <label class="form-check-label" for="flexCheckroleassign">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="mt-3">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <button class="btn btn-success" type="submit" id="btn_role_update">
                                                        Update
                                                    </button>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button class="btn btn-secondary" type="button"
                                                        id="btn_role_assign_clear">
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
        const validator = new window.JustValidate("#role_add_form");

        validator
            .addField("#input-master_role_name", [{
                    rule: "required",
                    errorMessage: "Role name is required",
                },
                {
                    rule: "minLength",
                    value: 3,
                    errorMessage: "Role name must be at least 3 characters",
                },
                {
                    rule: "maxLength",
                    value: 20,
                    errorMessage: "Role name must be less than 20 characters",
                },
            ])
            .onSuccess((event) => {
                event.preventDefault();
                const roleName = $("#input-master_role_name").val();

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                // AJAX Submission
                $.ajax({
                    type: "POST",
                    url: "/role_store",
                    data: {
                        roleName: roleName,
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


        const editvalidator = new window.JustValidate("#role_edit_form");

        editvalidator
            .addField("#edit-master_role_name", [{
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

                var roleName = $("#edit-master_role_name").val();
                var roleID = $("#edit-role_id").val();

                var formData = {
                    roleName: roleName,
                    roleID: roleID,
                };

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    type: "POST",
                    url: "/role_update",
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

        $(document).on('submit', '#role_assign_form', function(event) {
            event.preventDefault();

            var roleName = $("#assign-master_role_name").val();
            var roleID = $("#assign-role_id").val();
            var permissionId = [];

            // Collect all checked permission IDs
            $(".permissionassign:checked").each(function() {
                permissionId.push($(this).val());
            });

            var formData = {
                roleName: roleName,
                roleID: roleID,
                permissionId: permissionId,
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: "/role_assign",
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
                            text: response.message,
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
                            title: response.message,
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: "An unexpected error occurred.",
                            icon: "error",
                            customClass: {
                                popup: "swal-custom-popup",
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


        $(document).on('click', '#btn_role_update_clear', function() {
            $('#role_edit_form').hide();
            $('#role_add_form').show();
            $('#edit-role_id').val('');
        })

        $(document).on('click', '#btn_role_assign_clear', function() {
            $('#role_assign_form').hide();
            $('#role_add_form').show();
            $('#assign-role_id').val('');
        })
    </script>
@endsection
