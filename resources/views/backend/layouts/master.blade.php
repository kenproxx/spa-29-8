<!DOCTYPE html>
<html lang="en">
<head>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  Title -->
    <title>@yield('title')</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="handheldfriendly" content="true"/>
    <meta name="MobileOptimized" content="width"/>
    <meta name="description" content="Mordenize"/>
    <meta name="author" content=""/>
    <meta name="keywords" content="Mordenize"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="../../dist/images/logos/favicon.png"/>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="../../dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="../../dist/css/style.min.css"/>

</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <img src="../../dist/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid"/>
</div>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
{{--            <div class="brand-logo d-flex align-items-center justify-content-between">--}}
{{--                @php--}}
{{--                    $tieude = \App\Models\Config::where([--}}
{{--                        ['type', 'TIEU_DE'],--}}
{{--                        ['name', 'tieu_de']--}}
{{--                    ])->first();--}}
{{--                    $logo = \App\Models\Config::where([--}}
{{--                        ['type', 'logo'],--}}
{{--                        ['name', 'logo']--}}
{{--                    ])->first();--}}
{{--                @endphp--}}
{{--                <a href="./index.html" class="text-nowrap logo-img">--}}
{{--                    <img src="{{asset('storage/' . $logo->value)}}" class="dark-logo" width="50" alt=""/>--}}
{{--                    <img src="{{asset('storage/' . $logo->value)}}" class="light-logo" width="50" alt=""/>--}}
{{--                </a>--}}
{{--                <a href="#" class="text-nowrap">--}}
{{--                    {{$tieude->value}}--}}
{{--                </a>--}}
{{--                <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">--}}
{{--                    <i class="ti ti-x fs-8"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- Sidebar navigation-->
            @include('backend.layouts.partial.side-bar')
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        @include('backend.layouts.partial.header')
        <!--  Header End -->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>

<!--  Mobilenavbar -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
     aria-labelledby="offcanvasWithBothOptionsLabel">
    <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
            <img src="../../dist/images/logos/favicon.png" alt="" class="img-fluid">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar="" data-simplebar>
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span>
                  <i class="ti ti-apps"></i>
                </span>
                        <span class="hide-menu">Apps</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level my-3">
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="../../dist/images/svgs/icon-dd-chat.svg" alt="" class="img-fluid"
                                         width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">New messages arrived</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="../../dist/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid"
                                         width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">Get latest invoice</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="../../dist/images/svgs/icon-dd-mobile.svg" alt="" class="img-fluid"
                                         width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">2 Unsaved Contacts</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="../../dist/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid"
                                         width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Email App</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">Get new emails</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="../../dist/images/svgs/icon-dd-cart.svg" alt="" class="img-fluid"
                                         width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">learn more information</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="../../dist/images/svgs/icon-dd-date.svg" alt="" class="img-fluid"
                                         width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">Get dates</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="../../dist/images/svgs/icon-dd-lifebuoy.svg" alt="" class="img-fluid"
                                         width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">Add new contact</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="../../dist/images/svgs/icon-dd-application.svg" alt="" class="img-fluid"
                                         width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">To-do and Daily tasks</span>
                                </div>
                            </a>
                        </li>
                        <ul class="px-8 mt-7 mb-4">
                            <li class="sidebar-item mb-3">
                                <h5 class="fs-5 fw-semibold">Quick Links</h5>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">Pricing Page</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">Authentication Design</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">Register Now</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">404 Error Page</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">Notes App</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">User Application</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">Account Settings</a>
                            </li>
                        </ul>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="app-chat.html" aria-expanded="false">
                <span>
                  <i class="ti ti-message-dots"></i>
                </span>
                        <span class="hide-menu">Chat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="app-calendar.html" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                        <span class="hide-menu">Calendar</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="app-email.html" aria-expanded="false">
                <span>
                  <i class="ti ti-mail"></i>
                </span>
                        <span class="hide-menu">Email</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!--  Import Js Files -->

<script src="../../dist/libs/simplebar/dist/simplebar.min.js"></script>
<script src="../../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--  core files -->
<script src="../../dist/js/app.min.js"></script>
<script src="../../dist/js/app.init.js"></script>
<script src="../../dist/js/app-style-switcher.js"></script>
<script src="../../dist/js/sidebarmenu.js"></script>
<script src="../../dist/js/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.agency').change(function() {
            var agencyId = $(this).val();

            $.ajax({
                url: '{{ route("getProductsByAgency") }}',
                type: 'GET',
                data: { agency_id: agencyId },
                success: function(response) {
                    var productSelect = $('.product');
                    productSelect.empty();
                    productSelect.append('<option value="0">Tất cả sản phẩm</option>');

                    $.each(response, function(index, product) {
                        productSelect.append('<option value="' + product.id + '">' + product.title + '</option>');
                    });
                }
            });
        });
    });
</script>


</body>
</html>
