// LOGOUT

$(document).ready(function () {
    $(document).on("click", "#user_Log_off", function () {
        Swal.fire({
            title: "Are you sure?",
            text: "You want to Log Out?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Log Out",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });

                // AJAX Submission
                $.ajax({
                    type: "post",
                    url: "/logout",
                    beforeSend: function () {
                        $(".preloader").fadeIn();
                    },
                    success: function (response) {
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

                            setTimeout(function () {
                                window.location.href = "/";
                            }, 1500);
                        } else {
                            Swal.fire({
                                title: "Error",
                                text:
                                    response.message ||
                                    "An unexpected error occurred.",
                                icon: "error",
                            });
                            console.log(response.message);
                        }
                    },
                    error: function (xhr) {
                        $(".preloader").fadeOut();

                        Swal.fire({
                            title: "Error",
                            text:
                                xhr.responseJSON?.message ||
                                "An error occurred.",
                            icon: "error",
                        });

                        // setTimeout(function () {
                        //     window.location.reload();
                        // }, 1500);
                    },
                });
            }
        });
    });
});

// TOGGLE PASSWORD IN EMPLOYEE CREATION

$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    input = $(this).parent().find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

// APPEND VALUES ON INPUT FIELDS ON COUNTRY MASTER

function handleCountryClick(countryId, countryName) {
    $("#input-country_name").val(countryName);
    $("#input-country_id").val(countryId);
}

$(document).ready(function () {
    $("#branch_edit_form").hide();
    $("#designation_edit_form").hide();
    $("#role_edit_form").hide();
    $("#permission_edit_form").hide();
    $("#role_assign_form").hide();
    $("#segment_edit_form").hide();
    $("#application_edit_form").hide();
    $("#horsepower_edit_form").hide();

    // APPEND VALUES ON INPUT FIELDS ON STATE MASTER

    window.handleStateClick = function (stateId, stateName, countryId) {
        $("#input-state_id").val(stateId);
        $("#input-master_state_name").val(stateName);
        $("#master_state_country_select").val(countryId);
    };

    // APPEND VALUES ON INPUT FIELDS ON DISTRICT MASTER

    window.handleDistrictClick = function (stateId, districtName, districtID) {
        $("#input-district_id").val(districtID);
        $("#input-master_district_name").val(districtName);
        $("#master_district_state_select").val(stateId);
    };

    // APPEND VALUES ON INPUT FIELDS ON PANCHAYAT MASTER

    window.handlePanchayatClick = function (
        panchayatId,
        panchayatName,
        districtID
    ) {
        $("#input-panchayat_id").val(panchayatId);
        $("#input-master_panchayat_name").val(panchayatName);
        $("#master_panchayat_district_select").val(districtID);
    };

    // APPEND VALUES ON INPUT FIELDS ON DESIGNATION MASTER

    window.handledesignationClick = function (designationId, designationName) {
        $("#input-designation_id").val(designationId);
        $("#input-master_designation_name").val(designationName);
    };

    // APPEND VALUES ON INPUT FIELDS ON BRANCH MASTER

    window.handleBranchClick = function (branchId, branchName) {
        $("#edit-branch_id").val(branchId);
        $("#edit-master_branch_name").val(branchName);
        $("#branch_add_form").hide();
        $("#branch_edit_form").show();
    };

    window.handleRoleNameClick = function (roleId, roleName) {
        $("#edit-role_id").val(roleId);
        $("#edit-master_role_name").val(roleName);
        $("#role_add_form").hide();
        $("#role_edit_form").show();
    };

    window.handlePermissionNameClick = function (permissionId, permissionName) {
        $("#edit-permission_id").val(permissionId);
        $("#edit-master_permission_name").val(permissionName);
        $("#permission_add_form").hide();
        $("#permission_edit_form").show();
    };

    window.handleSegmentClick = function (segmentId, segmentName) {
        $("#edit-segment_id").val(segmentId);
        $("#edit-master_segment_name").val(segmentName);
        $("#segment_add_form").hide();
        $("#segment_edit_form").show();
    };

    window.handleApplicationClick = function (
        applicationId,
        applicationName,
        segmentId
    ) {
        $("#edit-application_id").val(applicationId);
        $("#edit-master_application_name").val(applicationName);
        $("#edit-master_segment_select").val(segmentId);
        $("#application_add_form").hide();
        $("#application_edit_form").show();
    };

    window.handleHorsepowerClick = function (horsepowerId, horsepowerName) {
        $("#edit-horsepower_id").val(horsepowerId);
        $("#edit-master_horsepower_name").val(horsepowerName);
        $("#horsepower_add_form").hide();
        $("#horsepower_edit_form").show();
    };

    window.assignPermissionTrigger = function (roleId, roleName) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/role_assign_fetch",
            data: {
                roleId: roleId,
            },
            beforeSend: function () {
                $(".preloader").fadeIn();
            },
            success: function (response) {
                console.log(response);
                $(".preloader").fadeOut();

                if (response.status === 200) {
                    var assignedPermissions = response.data;

                    // Iterate through all checkboxes
                    $(".form-check-input.permissionassign").each(function () {
                        var permissionId = $(this).val();

                        // Check or uncheck the checkbox based on the assigned permissions
                        if (
                            assignedPermissions.includes(parseInt(permissionId))
                        ) {
                            $(this).prop("checked", true);
                        } else {
                            $(this).prop("checked", false);
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "Unable to fetch assigned permissions.",
                        icon: "error",
                    });
                }
            },
            error: function (xhr, status, error) {
                $(".preloader").fadeOut();
                console.error(xhr.responseText);
            },
        });

        // Set role name and ID in the form inputs
        $("#assign-role_id").val(roleId);
        $("#assign-master_role_name").val(roleName);

        // Show the role assign form and hide others
        $("#role_add_form").hide();
        $("#role_edit_form").hide();
        $("#role_assign_form").show();
    };

    // Reset branch_id when branch_name is cleared
    document
        .getElementById("input-master_branch_name")
        .addEventListener("input", function () {
            if (this.value === "") {
                $("#input-branch_id").val(""); // Clear the branch ID
            }
        });
});

$(document).ready(function () {
    var branchname = $("#input-master_branch_name").val();
    if (branchname == "") {
        $("#input-branch_id").val("");
    }
});

// EMPLOYEE STATE FETCH

$(document).on("change", "#input-emp_country", function () {
    var country_id = $(this).val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/fetch_state",
        data: {
            country_id: country_id,
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();

            if (response.status === 200) {
                // Clear existing options in the state dropdown
                $("#input-emp_state").empty();

                // Add a placeholder option
                $("#input-emp_state").append(
                    "<option selected disabled>Select a state</option>"
                );

                // Append states dynamically
                response.data.forEach(function (state) {
                    $("#input-emp_state").append(
                        `<option value="${state.id}">${state.state_name}</option>`
                    );
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });

            setTimeout(function () {
                window.location.reload();
            }, 1500);
        },
    });
});

// EMPLOYEE DISTRICT FETCH

$(document).on("change", "#input-emp_state", function () {
    var state_id = $(this).val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/fetch_district",
        data: {
            state_id: state_id,
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();

            if (response.status === 200) {
                // Clear existing options in the state dropdown
                $("#input-emp_district").empty();

                // Add a placeholder option
                $("#input-emp_district").append(
                    "<option selected disabled>Select a state</option>"
                );

                // Append states dynamically
                response.data.forEach(function (district) {
                    $("#input-emp_district").append(
                        `<option value="${district.id}">${district.district_name}</option>`
                    );
                    $("#input-emp_base_district").append(
                        `<option value="${district.id}">${district.district_name}</option>`
                    );
                    $("#input-emp_home_district").append(
                        `<option value="${district.id}">${district.district_name}</option>`
                    );
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });

            setTimeout(function () {
                window.location.reload();
            }, 1500);
        },
    });
});

// DEALER STATE FETCH

$(document).on("change", "#input-dealer_country", function () {
    var country_id = $(this).val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/fetch_state",
        data: {
            country_id: country_id,
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();

            if (response.status === 200) {
                // Clear existing options in the state dropdown
                $("#input-dealer_state").empty();

                // Add a placeholder option
                $("#input-dealer_state").append(
                    "<option selected disabled>Select a state</option>"
                );

                // Append states dynamically
                response.data.forEach(function (state) {
                    $("#input-dealer_state").append(
                        `<option value="${state.id}">${state.state_name}</option>`
                    );
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });

            setTimeout(function () {
                window.location.reload();
            }, 1500);
        },
    });
});

// DEALER DISTRICT FETCH

$(document).on("change", "#input-dealer_state", function () {
    var state_id = $(this).val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/fetch_district",
        data: {
            state_id: state_id,
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();

            if (response.status === 200) {
                // Clear existing options in the state dropdown
                $("#input-dealer_district").empty();

                // Add a placeholder option
                $("#input-dealer_district").append(
                    "<option selected disabled>Select a state</option>"
                );

                // Append states dynamically
                response.data.forEach(function (district) {
                    $("#input-dealer_district").append(
                        `<option value="${district.id}">${district.district_name}</option>`
                    );
                    $("#input-dealer_base_district").append(
                        `<option value="${district.id}">${district.district_name}</option>`
                    );
                    $("#input-dealer_home_district").append(
                        `<option value="${district.id}">${district.district_name}</option>`
                    );
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });

            setTimeout(function () {
                window.location.reload();
            }, 1500);
        },
    });
});
