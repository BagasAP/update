
<html>
    
<!-- index.html 13:15:13 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Zircos - @yield('title')</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="{{ url('assets/plugins/morris/morris.css') }}">

        <!-- App css -->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ url('assets/css/core.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ url('assets/css/components.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ url('assets/css/icons.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ url('assets/css/pages.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ url('assets/css/menu.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}" type="text/css" />
		<link rel="stylesheet" href="{{ url('assets/plugins/switchery/switchery.min.css') }}">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                @include('layouts.topbar')
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    @include('layouts.sidebar')
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    @yield('content')



                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2016 © Zircos.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
            @include('layouts.rightbar')
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/detect.js') }}"></script>
        <script src="{{ url('assets/js/fastclick.js') }}"></script>
        <script src="{{ url('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ url('assets/js/waves.js') }}"></script>
        <script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ url('assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ url('assets/plugins/switchery/switchery.min.js') }}"></script>

        <!-- Counter js  -->
        <script src="{{ url('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
        <script src="{{ url('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

        <!--Morris Chart-->
		<script src="{{ url('assets/plugins/morris/morris.min.js') }}"></script>
		<script src="{{ url('assets/plugins/raphael/raphael-min.js') }}"></script>

        <!-- Dashboard init -->
        <script src="{{ url('assets/pages/jquery.dashboard.js') }}"></script>

        <!-- App js -->
        <script src="{{ url('assets/js/jquery.core.js') }}"></script>
        <script src="{{ url('assets/js/jquery.app.js') }}"></script>

    </body>

<!-- index.html 13:20:01 GMT -->
</html>

