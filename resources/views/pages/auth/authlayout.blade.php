<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Bull Machines</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Bull Machines Admin  Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/new/bull-machine-logo.png">

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    {{-- CUSTOM CSS --}}
    <link href="/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />
    {{-- SWEET ALERT --}}
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="index.html" class="d-block auth-logo">
                                        <img src="/assets/images/new/bull-machine-logo.png" alt=""
                                            height="28"> <span class="logo-txt"></span>
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0">Welcome Back !</h5>
                                        <p class="text-muted mt-2">Sign in to continue</p>
                                    </div>
                                    <form class="mt-4 pt-2" action="" data-url="" enctype="multipart/form-data"
                                        id="initial_login_form">
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text" class="form-control" id="input-user_login_id"
                                                placeholder="Enter user ID" name="phonenumber">
                                            <label for="input-username">User ID</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                        </div>

                                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                            <input type="password" class="form-control pe-5" id="password-input_login"
                                                placeholder="Enter Password" name="password">

                                            <button type="button"
                                                class="btn btn-link position-absolute h-100 end-0 top-0"
                                                id="password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="input-password">Password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-dark w-100 waves-effect waves-light" type="submit"
                                                id="user_Log_in">Log In</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->
                <div class="col-xxl-9 col-lg-8 col-md-7">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay"></div>
                        <!-- end bubble effect -->
                        {{-- <div class="row justify-content-center align-items-end">
                            <div class="col-xl-7">
                                <div class="p-0 p-sm-4 px-xl-0">
                                    <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div
                                            class="carousel-indicators auth-carousel carousel-indicators-rounded justify-content-center mb-0">
                                            <button type="button" data-bs-target="#reviewcarouselIndicators"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1">
                                                <img src="/assets/images/new/bull-plant.png"
                                                    class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                            </button>
                                            <button type="button" data-bs-target="#reviewcarouselIndicators"
                                                data-bs-slide-to="1" aria-label="Slide 2">
                                                <img src="assets/images/users/avatar-2.jpg"
                                                    class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                            </button>
                                            <button type="button" data-bs-target="#reviewcarouselIndicators"
                                                data-bs-slide-to="2" aria-label="Slide 3">
                                                <img src="assets/images/users/avatar-3.jpg"
                                                    class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                            </button>
                                        </div>
                                        <!-- end carouselIndicators -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="testi-contain text-center text-white">
                                                    <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                    <h4 class="mt-4 fw-medium lh-base text-white">“I feel confident
                                                        imposing change
                                                        on myself. It's a lot more progressing fun than looking back.
                                                        That's why
                                                        I ultricies enim
                                                        at malesuada nibh diam on tortor neaded to throw curve balls.”
                                                    </h4>
                                                    <div class="mt-4 pt-1 pb-5 mb-5">
                                                        <h5 class="font-size-16 text-white">Richard Drews
                                                        </h5>
                                                        <p class="mb-0 text-white-50">Web Designer</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <div class="testi-contain text-center text-white">
                                                    <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                    <h4 class="mt-4 fw-medium lh-base text-white">“Our task must be to
                                                        free ourselves by widening our circle of compassion to embrace
                                                        all living
                                                        creatures and
                                                        the whole of quis consectetur nunc sit amet semper justo. nature
                                                        and its beauty.”</h4>
                                                    <div class="mt-4 pt-1 pb-5 mb-5">
                                                        <h5 class="font-size-16 text-white">Rosanna French
                                                        </h5>
                                                        <p class="mb-0 text-white-50">Web Developer</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <div class="testi-contain text-center text-white">
                                                    <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                    <h4 class="mt-4 fw-medium lh-base text-white">“I've learned that
                                                        people will forget what you said, people will forget what you
                                                        did,
                                                        but people will never forget
                                                        how donec in efficitur lectus, nec lobortis metus you made them
                                                        feel.”</h4>
                                                    <div class="mt-4 pt-1 pb-5 mb-5">
                                                        <h5 class="font-size-16 text-white">Ilse R. Eaton</h5>
                                                        <p class="mb-0 text-white-50">Manager
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end carousel-inner -->
                                    </div>
                                    <!-- end review carousel -->
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="assets/libs/pace-js/pace.min.js"></script>

    <script src="assets/js/pages/pass-addon.init.js"></script>

    <script src="assets/js/pages/feather-icon.init.js"></script>

    {{-- JUST VALIDATE --}}
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    {{-- SWEET ALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        // ADD CATEGORY VALIDATION
        const validator = new window.JustValidate("#initial_login_form");

        validator
            .addField("#input-user_login_id", [{
                rule: "required",
            }, ])
            .addField("#password-input_login", [{
                rule: "required",
            }, ])
            .onSuccess((event) => {
                // event.currentTarget.submit();
                event.preventDefault();

                var userid = $("#input-user_login_id").val();
                var password = $("#password-input_login").val();

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    url: "/login",
                    method: "POST",
                    data: {
                        userid: userid,
                        password: password,
                    },
                    success: function(response) {
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

                            setTimeout(function() {
                                window.location.href = "/dashboard";
                            }, 1500);

                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response.message || "An unexpected error occurred.",
                                icon: "error",
                            });
                            console.log(response.message);
                        }
                    },
                    error: function(data) {
                        Swal.fire("Error!", "Log Out failed", "success");
                    },
                });
            });
    </script>

</body>

</html>
