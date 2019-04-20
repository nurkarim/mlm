<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <title>@yield('title','Dashboard')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('public/theme1/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/theme1/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('public/theme1/css/ionicon.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/theme1/css/adminlte.min.css')}}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{asset('public/theme1/css/custom.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('public/theme1/css/theme.css')}}">

    <link rel="stylesheet" href="{{asset('public/datatable/datatables.bootstrap.css')}}">
    <!-- jQuery 3 -->
    <script src="{{asset('public/theme1/js/jquery.min.js')}}"></script>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple-light sidebar-mini fixed">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>IN</b>F</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img class="logo" src="{{ asset('public/ui/img/logo.png') }}"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        @include('user._partials.header')
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
        
            <!-- search form -->
            <form action="" method="get" class="sidebar-form" id="menuSearchForm">
                <div class="input-group">
                    <input type="text" id="searchMenuTxt" class="form-control" placeholder="Search Menu ..." autocomplete="off">
                    <span class="input-group-btn">
                <button type="button" readonly="true" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu -->
            @include('user._partials.navigation')

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('breadcrumb')
         @include('errors.messages')

        </section>

        <!-- Main content -->
        <section class="content">
        @yield('content')
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="#">Rezban</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->


<script src="{{asset('public/theme1/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/theme1/js/fastclick.js')}}"></script>
<script src="{{asset('public/theme1/js/adminlte.min.js')}}"></script>
<script src="{{asset('public/theme1/js/slimscroll.min.js')}}"></script>
<script src="{{ url('/') }}/public/js/libs/slimscroll.min.js"></script>
<script src="{{asset('public/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/datatable/datatables.bootstrap.js')}}"></script>
<script>
    var url = window.location.href;
</script>
    @yield('subUrl')
<script>
    /* Selected Active menu code*/
    var checkSubMenu=$('ul li a[href="' + url + '"]').parent().parent().attr('class');

    if(checkSubMenu=='treeview-menu'){
        $('ul li a[href="' + url + '"]').parent().addClass('active');
        $('ul li a[href="' + url + '"]').parent().parent().parent().addClass('active');
    }else{
        $('ul li a[href="' + url + '"]').parent().addClass('active');
    }

    $('[data-title="tooltip"]').tooltip({
        placement: 'bottom',
        trigger: 'hover', //on mouse out it will disappear
        delay: {show: 300}
    });
    $('#menuSearchForm').submit(false);
    $('#searchMenuTxt').keyup(function () {
        var searchKey = $(this).val();
        $(".treeview").removeClass('bg-warning');
        $('.sidebar-menu span').each(function (a, b) {
            $(this).removeClass('bg-purple');
            if(searchKey.length >0){
                var menuName = $(this).text();
                if (menuName.toLowerCase().indexOf(searchKey.toLowerCase()) > -1) {
                    var selectedId = $(this).attr('parent-id');
                    $(this).addClass('bg-purple');
                    $('#'+selectedId).addClass('bg-warning');
                }
            }
        });
    });
    $(document).ready(function() {
        $('#datatable').DataTable();
        $('.datatable').DataTable();
    } );
</script>
@yield('js')
@include('user._partials.modal')
</body>
</html>
