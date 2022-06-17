<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include_once('includes/header.php');
        ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php
                include_once('includes/sidebar.php');
                ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">SP</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh Sách User
                            </div>
                            <div class="card-body" ng-app='myapp' ng-controller='getUser'>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>FullName</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>FullName</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr ng-repeat="sp in datas">
                                        <td>1</td>
                                        <td>{{sp.full_name}}</td>
                                        <td>{{sp.users_name}}</td>
                                        <td>{{sp.email}}</td>
                                        <td>{{sp.password}}</td>
                                        <td>{{sp.phone}}</td>
                                        <td>{{sp.address}}</td>
                                        <td><a href="edit.php?id=<?=$r['id']?>" class="btn btn-info">Edit</a></td>
                                        <td><a href="xoasp.php?id=<?=$r['id']?>" onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-danger">Delete</a></td>
                                     </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php
                include_once('includes/footer.php');
                ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="./js/angular.min.js"></script>
        <script src="./Controller/app.js"></script>

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js" integrity="sha512-7oYXeK0OxTFxndh0erL8FsjGvrl2VMDor6fVqzlLGfwOQQqTbYsGPv4ZZ15QHfSk80doyaM0ZJdvkyDcVO7KFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <script src="./Controller/getUser.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="./js/datatables-simple-demo.js"></script>
    </body>
</html>
