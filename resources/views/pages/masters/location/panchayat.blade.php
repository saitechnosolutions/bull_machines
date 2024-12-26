@extends('layout.app')
@section('main')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Panchayat Master</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Locations</a></li>
                                <li class="breadcrumb-item active">Panchayat</li>
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
                            <form action="" method="post" id="panchayat_add_form" data-url="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <label for="master_panchayat_district_select">Choose District</label>
                                            <select class="form-select" id="master_panchayat_district_select"
                                                aria-label="Default select example">
                                                <option selected>Choose District</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->district_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <label for="input-master_panchayat_name">Panchayat Name</label>
                                            <input type="text" class="form-control" id="input-master_panchayat_name"
                                                placeholder="Enter Panchayat name" name="master_panchayat_name">
                                            <input type="hidden" name="" id="input-panchayat_id">
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
        // ADD CATEGORY VALIDATION
        const validator = new window.JustValidate("#panchayat_add_form");

        validator
            .addField("#input-master_panchayat_name", [{
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
            .addField("#master_panchayat_district_select", [{
                rule: "required",
            }, ])
            .onSuccess((event) => {
                // event.currentTarget.submit();
                event.preventDefault();

                var panchayatName = $("#input-master_panchayat_name").val();
                var panchayatID = $("#input-panchayat_id").val();
                var district = $("#master_panchayat_district_select").val();

                var formData = {
                    panchayatName: panchayatName,
                    panchayatID: panchayatID,
                    district: district,
                };

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    type: "POST",
                    url: "/panchayat_store",
                    data: formData,
                    beforeSend: function() {
                        $(".preloader").fadeIn();
                    },
                    success: function(response) {
                        console.log(response);
                        $(".preloader").fadeOut();
                        if (response == 201) {
                            Swal.fire({
                                title: "Success",
                                text: "Panchayat added Successfully",
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
                                title: "Panchayat added Successfully",
                            });
                        } else {
                            Swal.fire({
                                title: "Success",
                                text: "Panchayat Updated Successfully",
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
                                title: "Panchayat updated Successfully",
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
    </script>
@endsection
