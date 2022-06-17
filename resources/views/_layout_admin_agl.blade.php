<!DOCTYPE html>
<html lang="en" ng-app="myapp">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="/assets/admin/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css" crossorigin="anonymous"></script>
        <!-- <link rel="stylesheet" href="/css/app.css"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">        
    </head>
    <style>
    .pagination {
        display: block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }
    .pagination a.active {
        background-color: #4CAF50;
        color: white;
    }
    .pagination a:hover:not(.active) {background-color: #ddd;}

    @media(min-width: 576px)
    {
        .modal-dialog{
            max-width: 80% !important;
            max-height: 90% !important;
            margin: 6rem auto !important;
        }
    }
    .container-fluid{
        display:flex;
    }
    
    </style>

    <body class="sb-nav-fixed">
        <!-- header -->
        @include('includes.header')
        <div id="layoutSidenav">
            <!-- sidebar -->
            @include('includes.sidebar2')
            <div id="layoutSidenav_content">
                <!-- content -->
                @yield('content')
                <!-- footer -->
                @include('includes.footer')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/assets/admin/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="/assets/admin/js/datatables-simple-demo.js"></script>
    </body>
</html>
