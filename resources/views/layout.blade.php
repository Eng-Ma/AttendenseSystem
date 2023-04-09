<!DOCTYPE html>
<html lang="ar">
<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="/assets/css/config/default/app-rtl.min.css" rel="stylesheet" type="text/css" id="app-style"/>
    <!-- icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<!-- body start -->
<body class="loading" data-layout-mode="default" data-layout-color="light" data-layout-width="fluid" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    @include('include.nav')
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('include.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">{{$pageTitle}}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
            @yield('content')
            </div>
        </div>
        <!-- Footer Start -->
        @include('include.footer')
        <!-- end Footer -->

    </div>
</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
@include('include.settings')
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

@include('include.scripts')

</body>
</html>
