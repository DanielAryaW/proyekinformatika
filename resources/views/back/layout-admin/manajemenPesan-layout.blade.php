<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>@yield('pageTitle')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/back/vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/back/vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/back/vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css" />


    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->

    <style>
        .user-info {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
        }

        .user-info button {
            margin-left: 15px;
        }
    </style>

    @stack('stylesheets')
</head>

<body class="header-white sidebar-light sidebar-shrink">
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="/back/vendors/images/deskapp-logo.svg" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> --}}

    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            <div class="search-toggle-icon bi bi-caret-down" data-toggle="header_search"></div>
            <div class="header-search">
                <div>Selamat Datang, {{ Auth::guard('admin')->user()->name }}!</div>
            </div>
        </div>
        <div class="header-right">

            @if (Auth::guard('admin')->check())
                <div class="user-info">
                    <button class="btn btn-sm btn-flat btn-primary" href="{{ route('admin.logout_handler') }}"
                        onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();">
                        <i class="dw dw-logout"></i> Logout
                    </button>
                    <form action="{{ route('admin.logout_handler') }}" id="adminLogoutForm" method="POST">
                        @csrf
                    </form>
                </div>
            @elseif(Auth::guard('customer')->check())
                <div class="user-info">
                    <button class="btn btn-sm btn-flat btn-primary" href="{{ route('customer.logout_handler') }}"
                        onclick="event.preventDefault();document.getElementById('customerLogoutForm').submit();">
                        <i class="dw dw-logout"></i> Logout
                    </button>
                    <form action="{{ route('customer.logout_handler') }}" id="customerLogoutForm" method="POST">
                        @csrf
                    </form>
                </div>
            @endif
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{ route('admin.home') }}">
                <img src="/back/vendors/images/printwork-logo.png" alt="" class="dark-logo" />
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li>
                        <a href="{{ route('admin.home') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-house"></span>
                            <span class="mtext">Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.manajemenPesan') }}" class="dropdown-toggle no-arrow active">
                            <span class="micon bi bi-cart"></span><span class="mtext">Manajeman Pemesanan</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.paketjasa') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-bag"></span><span class="mtext">Paket Jasa</span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="invoice.html" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-receipt-cutoff"></span><span class="mtext">Invoice</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">@yield('content')</div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            Printwork - Print with heart
        </div>
    </div>
    </div>

    <!-- js -->
    <script src="/back/vendors/scripts/core.js"></script>
    <script src="/back/vendors/scripts/script.min.js"></script>
    <script src="/back/vendors/scripts/process.js"></script>
    <script src="/back/vendors/scripts/layout-settings.js"></script>

    <!-- js -->
    <script src="/back/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/back/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="/back/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="/back/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- buttons for Export datatable -->
    <script src="/back/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.html5.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.flash.min.js"></script>
    <script src="/back/src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="/back/src/plugins/datatables/js/vfs_fonts.js"></script>
    <!-- Datatable Setting js -->
    <script src="/back/vendors/scripts/datatable-setting.js"></script>
    @stack('scripts')
</body>

</html>
