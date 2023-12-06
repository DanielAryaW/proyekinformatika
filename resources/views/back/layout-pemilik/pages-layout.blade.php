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
            <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
            <div class="header-search">
                <div>Selamat Datang, {{ Auth::guard('pemilik')->user()->name }}!</div>
            </div>
        </div>
        <div class="header-right">

            @if (Auth::guard('pemilik')->check())
                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="user-icon">
                                <img src="/back/vendors/images/photo1.jpg" alt="" />
                            </span>
                            <span class="user-name">
                                {{ Auth::guard('pemilik')->user()->name }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('pemilik.logout_handler') }}"
                                onclick="event.preventDefault();document.getElementById('pemilikLogoutForm').submit();"><i
                                    class="dw dw-logout"></i> Log Out</a>
                            <form action="{{ route('pemilik.logout_handler') }}" id="pemilikLogoutForm" method="POST">
                                @csrf</form>
                        </div>
                    </div>
                </div>
            @elseif(Auth::guard('client')->check())
                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="user-icon">
                                <img src="/back/vendors/images/photo1.jpg" alt="" />
                            </span>
                            <span class="user-name">
                                {{ Auth::guard('client')->user()->name }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{ route('pemilik.home') }}">
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
                        <a href="{{ route('pemilik.home') }}" class="dropdown-toggle no-arrow active">
                            <span class="micon bi bi-house"></span>
                            <span class="mtext">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pemilik.laporanTransaksi') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-cash"></span><span class="mtext">Laporan Transaksi</span>
                        </a>
                    </li>
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

    @stack('scripts')
</body>

</html>
