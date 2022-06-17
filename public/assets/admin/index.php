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
        <link href="/admin1/css/styles.css" rel="stylesheet" />
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
                        <h1 class="mt-4">Sản Phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">SP</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh Sách Sản Phẩm
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $host='127.0.0.1';
                                        $username='root';
                                        $password='';
                                        $database='banthucphamsach';
                                        $tt=1;
                                        $db=new mysqli($host,$username,$password,$database);
                                        $sqlquery="SELECT * FROM `san_pham` limit 12";
                                        $result=$db->query($sqlquery);
                                        while($r=mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <td><?=$tt++;?></td>
                                            <td><img src="./upload/sanpham/<?=$r['image']?>" alt="" style="width:100px;"></td>
                                            <td><?=$r['name']?></td>
                                            <td align="right"><?= number_format($r['unit_price']);?></td>
                                            <td><a href="edit.php?id=<?=$r['id']?>" class="btn btn-info">Edit</a></td>
                                            <td><a href="xoasp.php?id=<?=$r['id']?>" onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                        
                                        <?php
                                        }
                                        ?>
                                        
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/admin1/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="/admin1/assets/demo/chart-area-demo.js"></script>
        <script src="/admin1/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="/admin1/js/datatables-simple-demo.js"></script>
    </body>
</html>
