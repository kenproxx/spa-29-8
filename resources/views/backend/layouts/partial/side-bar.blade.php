@php
    use App\Enum\ConfigType;
    $checkSuper_Admin = \Illuminate\Support\Facades\Auth::user()->role_id == \App\Enum\UserRole::SUPER_ADMIN
@endphp

<nav class="sidebar-nav scroll-sidebar h-100" data-simplebar >
    <ul id="sidebarnav"><!-- ============================= -->
        <!-- Home -->
        <!-- ============================= -->
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Quản trị</span>
        </li>
        <!-- =================== -->
        <!-- Dashboard -->
        <!-- =================== -->
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('backend.thong-ke.show') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-aperture"></i>
                  </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('backend.don-hang.show') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-shopping-cart"></i>
                  </span>
                <span class="hide-menu">Quản lý đơn hàng</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('backend.tin-nhan.show') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-currency-dollar"></i>
                  </span>
                <span class="hide-menu">Tin nhắn</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('backend.email.show') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-cpu"></i>
                  </span>
                <span class="hide-menu">Email</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('backend.voucher.show') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-activity-heartbeat"></i>
                  </span>
                <span class="hide-menu">Mã giảm giá</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('backend.san-pham.show') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-playlist"></i>
                  </span>
                <span class="hide-menu">Quản lý sản phẩm</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('backend.dich-vu-them.show') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-playlist"></i>
                  </span>
                <span class="hide-menu">Dịch vụ thêm</span>
            </a>
        </li>

        @if($checkSuper_Admin)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('backend.tags.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-aperture"></i>
                  </span>
                    <span class="hide-menu">Thẻ Tags</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('backend.user.show') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-aperture"></i>
                  </span>
                    <span class="hide-menu">Quản lý user</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('backend.dai-ly.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-playlist"></i>
                  </span>
                    <span class="hide-menu">Quản lý spa</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('backend.goi-dich-vu.show') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-playlist"></i>
                  </span>
                    <span class="hide-menu">Quản lý Gói dịch vụ</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('backend.danh-gia-san-pham.show') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-playlist"></i>
                  </span>
                    <span class="hide-menu">Đánh giá sản phẩm</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                  <span class="d-flex">
                    <i class="ti ti-chart-donut-3"></i>
                  </span>
                    <span class="hide-menu">Cấu hình chung</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('backend.cau-hinh.show', ConfigType::TIEU_DE) }}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Cấu hình tiêu đề</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('backend.cau-hinh.show', ConfigType::LOGO) }}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Cấu hình Logo</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('backend.cau-hinh.show', ConfigType::BANNER_TOP) }}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Cấu hình banner top</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('backend.cau-hinh.show', ConfigType::MENU) }}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Cấu hình Menu</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('backend.cau-hinh.show', ConfigType::API_VNPAY) }}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Cấu hình API VNPAY</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('backend.cau-hinh.show', ConfigType::SMTP_EMAIL) }}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Cấu hình SMTP Email</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('backend.cau-hinh.show', ConfigType::API_ZALO) }}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Cấu hình API Zalo</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('backend.cau-hinh.show', ConfigType::FOOTER) }}" class="sidebar-link">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Cấu hình Footer</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</nav>
