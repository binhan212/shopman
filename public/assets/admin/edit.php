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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body class="sb-nav-fixed">
        <?php
        include_once('includes/header.php');
        
                $host='127.0.0.1';
                $username='root';
                $password='';
                //$name="";
                //$description="";
                $database='banthucphamsach';
                $tt=1;
                //$sqlquery="";
                $db=new mysqli($host,$username,$password,$database);
                if(isset($_GET['id'])){
                    $id=$_GET['id'] or die('lai doc');
                    $sqlquery="SELECT * FROM `san_pham` where id='$id'";
                    
                    $result=$db->query($sqlquery);
                    $r=mysqli_fetch_assoc($result);
                    $name=$r['name'];
                    $description=$r['mota_sp'];
                }
                else {
                    header('location:index.php');
                }

                if(isset($_POST['cmd'])) {
                    $id1 = $_POST['txtid'];
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $sql2 = "UPDATE san_pham SET name ='$name', mota_sp= '$description' WHERE id ='$id'";
                    $db->query($sql2);
                    header('location:index.php');
                }
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
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="txtid" value="<?= $id ?>">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="<?=$name ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="description" rows="5" name="description"><?=$description ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary" name="cmd" value="save">Save</button>
                                </div>
                                
                            </form>
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
        <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
        <script>
                        CKEDITOR.replace( 'description' );
                </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
