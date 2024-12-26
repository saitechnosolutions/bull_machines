<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="index.html" id="topnav-dashboard"
                            role="button">
                            <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement"
                            role="button">
                            <i data-feather="briefcase"></i>
                            <span data-key="t-elements">Elements</span>
                            <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                            aria-labelledby="topnav-uielement">
                            <div class="ps-2 p-lg-0">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div>
                                            <div class="menu-title">Elements</div>
                                            <div class="row g-0">
                                                <div class="col-lg-5">
                                                    <div>
                                                        <a href="ui-alerts.html" class="dropdown-item"
                                                            data-key="t-alerts">Alerts</a>
                                                        <a href="ui-buttons.html" class="dropdown-item"
                                                            data-key="t-buttons">Buttons</a>
                                                        <a href="ui-cards.html" class="dropdown-item"
                                                            data-key="t-cards">Cards</a>
                                                        <a href="ui-carousel.html" class="dropdown-item"
                                                            data-key="t-carousel">Carousel</a>
                                                        <a href="ui-dropdowns.html" class="dropdown-item"
                                                            data-key="t-dropdowns">Dropdowns</a>
                                                        <a href="ui-grid.html" class="dropdown-item"
                                                            data-key="t-grid">Grid</a>
                                                        <a href="ui-images.html" class="dropdown-item"
                                                            data-key="t-images">Images</a>
                                                        <a href="ui-modals.html" class="dropdown-item"
                                                            data-key="t-modals">Modals</a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div>
                                                        <a href="ui-offcanvas.html" class="dropdown-item"
                                                            data-key="t-offcanvas">Offcanvas</a>
                                                        <a href="ui-progressbars.html" class="dropdown-item"
                                                            data-key="t-progress-bars">Progress Bars</a>
                                                        <a href="ui-placeholders.html" class="dropdown-item"
                                                            data-key="t-progress-bars">Placeholders</a>
                                                        <a href="ui-tabs-accordions.html" class="dropdown-item"
                                                            data-key="t-tabs-accordions">Tabs & Accordions</a>
                                                        <a href="ui-typography.html" class="dropdown-item"
                                                            data-key="t-typography">Typography</a>
                                                        <a href="ui-video.html" class="dropdown-item"
                                                            data-key="t-video">Video</a>
                                                        <a href="ui-general.html" class="dropdown-item"
                                                            data-key="t-general">General</a>
                                                        <a href="ui-colors.html" class="dropdown-item"
                                                            data-key="t-colors">Colors</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <div class="menu-title">Extended</div>
                                            <div>
                                                <a href="extended-lightbox.html" class="dropdown-item"
                                                    data-key="t-lightbox">Lightbox</a>
                                                <a href="extended-rangeslider.html" class="dropdown-item"
                                                    data-key="t-range-slider">Range Slider</a>
                                                <a href="extended-sweet-alert.html" class="dropdown-item"
                                                    data-key="t-sweet-alert">SweetAlert 2</a>
                                                <a href="extended-session-timeout.html" class="dropdown-item"
                                                    data-key="t-session-timeout">Session Timeout</a>
                                                <a href="extended-rating.html" class="dropdown-item"
                                                    data-key="t-rating">Rating</a>
                                                <a href="extended-notifications.html" class="dropdown-item"
                                                    data-key="t-notifications">Notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid"></i><span data-key="t-apps">Masters</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce"
                                    role="button">
                                    <span data-key="t-ecommerce">Employee</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">

                                    <a href="{{ url('/employee/creation') }}" class="dropdown-item"
                                        data-key="t-products">Employee</a>
                                    <a href="{{ url('/dealer/creation') }}" class="dropdown-item"
                                        data-key="t-product-detail">Dealer</a>
                                    {{-- <a href="{{ url('/employee/orders') }}" class="dropdown-item"
                                        data-key="t-orders">Orders</a> --}}
                                    <a href="/employee/designation" class="dropdown-item"
                                        data-key="t-customers">Designation</a>
                                    <a href="/employee/branch" class="dropdown-item" data-key="t-cart">Branch</a>
                                    <a href="ecommerce-checkout.html" class="dropdown-item" data-key="t-checkout">User
                                        Device Management</a>
                                    <a href="ecommerce-shops.html" class="dropdown-item" data-key="t-shops">Organization
                                        Chart</a>
                                    <a href="{{ url('/employee/role') }}" class="dropdown-item"
                                        data-key="t-shops">Roles</a>
                                    {{-- <a href="ecommerce-add-product.html" class="dropdown-item"
                                        data-key="t-add-product">Add Product</a> --}}
                                </div>
                            </div>


                            {{-- <a href="apps-calendar.html" class="dropdown-item" data-key="t-calendar">Calendar</a>
                            <a href="apps-chat.html" class="dropdown-item" data-key="t-chat">Chat</a> --}}

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                    role="button">
                                    <span data-key="t-email">Locations</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="/locations/country" class="dropdown-item" data-key="t-inbox">Country</a>
                                    <a href="/locations/state" class="dropdown-item" data-key="t-read-email">State</a>
                                    <a href="/locations/district" class="dropdown-item"
                                        data-key="t-read-email">District</a>
                                    <a href="/locations/panchayat" class="dropdown-item"
                                        data-key="t-read-email">Panchayat</a>
                                </div>
                            </div>

                            <hr>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-tasks"
                                    role="button">
                                    <span data-key="t-tasks">Enquiry</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu overflow-auto" style="max-height: 450px;"
                                    aria-labelledby="topnav-tasks">
                                    <a href="{{ url('/enquiry/segment') }}" class="dropdown-item"
                                        data-key="t-task-list">Segment</a>
                                    <a href="{{ url('/enquiry/application') }}" class="dropdown-item"
                                        data-key="t-kanban-board">Application</a>
                                    <a href="{{ url('/enquiry/horsepower') }}" class="dropdown-item"
                                        data-key="t-create-task">HorsePower</a>
                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Productgroup</a>
                                    <a href="tasks-create.html" class="dropdown-item" data-key="t-create-task">Product
                                        Specification</a>

                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Leadsource</a>

                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Enquiry Stage</a>
                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Enquiry Status</a>

                                    <a href="tasks-create.html" class="dropdown-item" data-key="t-create-task">Reason
                                        For Loss</a>
                                    <a href="tasks-create.html" class="dropdown-item" data-key="t-create-task">CNI
                                        Reason</a>
                                    <a href="tasks-create.html" class="dropdown-item" data-key="t-create-task">NAE
                                        Reason</a>
                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Courtesy Reason</a>
                                    <a href="tasks-create.html" class="dropdown-item" data-key="t-create-task">Action
                                        Plan</a>
                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Activity Type</a>

                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-contact" role="button">
                                    <span data-key="t-contacts">BPSS</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item"
                                        data-key="t-user-grid">Bank Details</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">HorsePower</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Productgroup</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Specification</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Matrix</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Color</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Implement</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Options</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Option Matrix</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Export Matrix</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Implement Matrix</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-contact" role="button">
                                    <span data-key="t-contacts">BPSS Pricelist</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item"
                                        data-key="t-user-grid">Product Pricelist</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Implement Pricelist</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Option Pricelist</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Dealer Margin</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Salesman Margin</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Discount percentage</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">BPSS Payment Type</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Options</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Amount Deduction</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-contact" role="button">
                                    <span data-key="t-contacts">Ticket</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item"
                                        data-key="t-user-grid">Issue Category</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Known Issues</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-contact" role="button">
                                    <span data-key="t-contacts">Expenses</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item"
                                        data-key="t-user-grid">Expense Category</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Expense Type</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Daybook Details</a>
                                </div>
                            </div>


                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-contact" role="button">
                                    <span data-key="t-contacts">Target</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item"
                                        data-key="t-user-grid">Target</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Sales Target</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Yearly Target</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid"></i><span data-key="t-apps">Masters</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce"
                                    role="button">
                                    <span data-key="t-ecommerce">Employee</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">

                                    <a href="{{ url('/employee/creation') }}" class="dropdown-item"
                                        data-key="t-products">Employee</a>
                                    <a href="{{ url('/dealer/creation') }}" class="dropdown-item"
                                        data-key="t-product-detail">Dealer</a>
                                    {{-- <a href="{{ url('/employee/orders') }}" class="dropdown-item"
                                        data-key="t-orders">Orders</a> --}}
                                    <a href="/employee/designation" class="dropdown-item"
                                        data-key="t-customers">Designation</a>
                                    <a href="/employee/branch" class="dropdown-item" data-key="t-cart">Branch</a>
                                    <a href="ecommerce-checkout.html" class="dropdown-item" data-key="t-checkout">User
                                        Device Management</a>
                                    <a href="ecommerce-shops.html" class="dropdown-item" data-key="t-shops">Organization
                                        Chart</a>
                                    <a href="{{ url('/employee/role') }}" class="dropdown-item"
                                        data-key="t-shops">Roles</a>
                                    {{-- <a href="ecommerce-add-product.html" class="dropdown-item"
                                        data-key="t-add-product">Add Product</a> --}}
                                </div>
                            </div>


                            {{-- <a href="apps-calendar.html" class="dropdown-item" data-key="t-calendar">Calendar</a>
                            <a href="apps-chat.html" class="dropdown-item" data-key="t-chat">Chat</a> --}}

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                    role="button">
                                    <span data-key="t-email">Locations</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="/locations/country" class="dropdown-item" data-key="t-inbox">Country</a>
                                    <a href="/locations/state" class="dropdown-item" data-key="t-read-email">State</a>
                                    <a href="/locations/district" class="dropdown-item"
                                        data-key="t-read-email">District</a>
                                    <a href="/locations/panchayat" class="dropdown-item"
                                        data-key="t-read-email">Panchayat</a>
                                </div>
                            </div>

                            <hr>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-tasks"
                                    role="button">
                                    <span data-key="t-tasks">Enquiry</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu overflow-auto" style="max-height: 450px;"
                                    aria-labelledby="topnav-tasks">
                                    <a href="{{ url('/enquiry/segment') }}" class="dropdown-item"
                                        data-key="t-task-list">Segment</a>
                                    <a href="{{ url('/enquiry/application') }}" class="dropdown-item"
                                        data-key="t-kanban-board">Application</a>
                                    <a href="{{ url('/enquiry/horsepower') }}" class="dropdown-item"
                                        data-key="t-create-task">HorsePower</a>
                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Productgroup</a>
                                    <a href="tasks-create.html" class="dropdown-item" data-key="t-create-task">Product
                                        Specification</a>

                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Leadsource</a>

                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Enquiry Stage</a>
                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Enquiry Status</a>

                                    <a href="tasks-create.html" class="dropdown-item" data-key="t-create-task">Reason
                                        For Loss</a>
                                    <a href="tasks-create.html" class="dropdown-item" data-key="t-create-task">CNI
                                        Reason</a>
                                    <a href="tasks-create.html" class="dropdown-item" data-key="t-create-task">NAE
                                        Reason</a>
                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Courtesy Reason</a>
                                    <a href="tasks-create.html" class="dropdown-item" data-key="t-create-task">Action
                                        Plan</a>
                                    <a href="tasks-create.html" class="dropdown-item"
                                        data-key="t-create-task">Activity Type</a>

                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-contact" role="button">
                                    <span data-key="t-contacts">BPSS</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item"
                                        data-key="t-user-grid">Bank Details</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">HorsePower</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Productgroup</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Specification</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Matrix</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Color</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Implement</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Options</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Option Matrix</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Export Matrix</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Implement Matrix</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-contact" role="button">
                                    <span data-key="t-contacts">BPSS Pricelist</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item"
                                        data-key="t-user-grid">Product Pricelist</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Implement Pricelist</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Option Pricelist</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Dealer Margin</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Salesman Margin</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Discount percentage</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">BPSS Payment Type</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Product Options</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item"
                                        data-key="t-profile">Amount Deduction</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-contact" role="button">
                                    <span data-key="t-contacts">Ticket</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item"
                                        data-key="t-user-grid">Issue Category</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Known Issues</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-contact" role="button">
                                    <span data-key="t-contacts">Expenses</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item"
                                        data-key="t-user-grid">Expense Category</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Expense Type</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Daybook Details</a>
                                </div>
                            </div>


                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-contact" role="button">
                                    <span data-key="t-contacts">Target</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item"
                                        data-key="t-user-grid">Target</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Sales Target</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item"
                                        data-key="t-user-list">Yearly Target</a>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>
