<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Spoljarci Rezije</title>

    <!-- Core CSS - Include with every page -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="/css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="/css/sb-admin.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Toaster -->
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>

    {{-- <div id="wrapper"> --}}
            


      @include('layouts.nav')

        <div id="page-wrapper">

            <!-- /.row -->
            @yield('content')
            
        </div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="/js/jquery-1.10.2.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
{{--     <script src="/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="/js/plugins/morris/morris.js"></script> --}}
     <script src="//cdn.jsdelivr.net/npm/chart.js@2.9.1/dist/Chart.min.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="/js/sb-admin.js"></script>
        
    <!--Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    {{-- <script src="/js/demo/dashboard-demo.js"></script> --}}
    @yield('scripts')
    
</body>

</html>
