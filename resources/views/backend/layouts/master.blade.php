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

<!--  Customizer -->
<button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"></i>
</button>
<div class="offcanvas offcanvas-end customizer" tabindex="-1" id="offcanvasExample"
     aria-labelledby="offcanvasExampleLabel" data-simplebar="">
    <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
        <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <div class="theme-option pb-4">
            <h6 class="fw-semibold fs-4 mb-1">Theme Option</h6>
            <div class="d-flex align-items-center gap-3 my-3">
                <a href="javascript:void(0)" onclick="toggleTheme('../../dist/css/style.min.css')"
                   class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
                    <i class="ti ti-brightness-up fs-7 text-primary"></i>
                    <span class="text-dark">Light</span>
                </a>
                <a href="javascript:void(0)" onclick="toggleTheme('../../dist/css/style-dark.min.css')"
                   class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
                    <i class="ti ti-moon fs-7 "></i>
                    <span class="text-dark">Dark</span>
                </a>
            </div>
        </div>
        <div class="theme-colors pb-4">
            <h6 class="fw-semibold fs-4 mb-1">Theme Colors</h6>
            <div class="d-flex align-items-center gap-3 my-3">
                <ul class="list-unstyled mb-0 d-flex gap-3 flex-wrap change-colors">
                    <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                        <a href="javascript:void(0)"
                           class="rounded-circle position-relative d-block customizer-bgcolor skin1-bluetheme-primary active-theme "
                           onclick="toggleTheme('../../dist/css/style.min.css')" data-color="blue_theme"
                           data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME"><i
                                class="ti ti-check text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                    </li>
                    <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                        <a href="javascript:void(0)"
                           class="rounded-circle position-relative d-block customizer-bgcolor skin2-aquatheme-primary "
                           onclick="toggleTheme('../../dist/css/style-aqua.min.css')" data-color="aqua_theme"
                           data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME"><i
                                class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                    </li>
                    <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                        <a href="javascript:void(0)"
                           class="rounded-circle position-relative d-block customizer-bgcolor skin3-purpletheme-primary"
                           onclick="toggleTheme('../../dist/css/style-purple.min.css')" data-color="purple_theme"
                           data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME"><i
                                class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                    </li>
                    <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                        <a href="javascript:void(0)"
                           class="rounded-circle position-relative d-block customizer-bgcolor skin4-greentheme-primary"
                           onclick="toggleTheme('../../dist/css/style-green.min.css')" data-bs-toggle="tooltip"
                           data-bs-placement="top" data-bs-title="GREEN_THEME"><i
                                class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                    </li>
                    <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                        <a href="javascript:void(0)"
                           class="rounded-circle position-relative d-block customizer-bgcolor skin5-cyantheme-primary"
                           onclick="toggleTheme('../../dist/css/style-cyan.min.css')" data-bs-toggle="tooltip"
                           data-bs-placement="top" data-bs-title="CYAN_THEME"><i
                                class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                    </li>
                    <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                        <a href="javascript:void(0)"
                           class="rounded-circle position-relative d-block customizer-bgcolor skin6-orangetheme-primary"
                           onclick="toggleTheme('../../dist/css/style-orange.min.css')" data-bs-toggle="tooltip"
                           data-bs-placement="top" data-bs-title="ORANGE_THEME"><i
                                class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-option pb-4">
            <h6 class="fw-semibold fs-4 mb-1">Container Option</h6>
            <div class="d-flex align-items-center gap-3 my-3">
                <a href="javascript:void(0)"
                   class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 boxed-width text-dark">
                    <i class="ti ti-layout-distribute-vertical fs-7 text-primary"></i>
                    <span class="text-dark">Boxed</span>
                </a>
                <a href="javascript:void(0)"
                   class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 full-width text-dark">
                    <i class="ti ti-layout-distribute-horizontal fs-7"></i>
                    <span class="text-dark">Full</span>
                </a>
            </div>
        </div>
        <div class="sidebar-type pb-4">
            <h6 class="fw-semibold fs-4 mb-1">Sidebar Type</h6>
            <div class="d-flex align-items-center gap-3 my-3">
                <a href="javascript:void(0)"
                   class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 fullsidebar">
                    <i class="ti ti-layout-sidebar-right fs-7"></i>
                    <span class="text-dark">Full</span>
                </a>
                <a href="javascript:void(0)"
                   class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center text-dark sidebartoggler gap-2">
                    <i class="ti ti-layout-sidebar fs-7"></i>
                    <span class="text-dark">Collapse</span>
                </a>
            </div>
        </div>
        <div class="card-with pb-4">
            <h6 class="fw-semibold fs-4 mb-1">Card With</h6>
            <div class="d-flex align-items-center gap-3 my-3">
                <a href="javascript:void(0)"
                   class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 text-dark cardborder">
                    <i class="ti ti-border-outer fs-7"></i>
                    <span class="text-dark">Border</span>
                </a>
                <a href="javascript:void(0)"
                   class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 cardshadow">
                    <i class="ti ti-border-none fs-7"></i>
                    <span class="text-dark">Shadow</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!--  Customizer -->
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
