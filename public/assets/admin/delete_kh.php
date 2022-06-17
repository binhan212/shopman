<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "banthucphamsach";
$index = 1;
$db = new mysqli($host, $username, $password, $database);
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM khach_hang WHERE id ='$id'";
    $db->query($sql);
    header("location: khachhangindex.php");
}
?>