<?php
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
    $sqlquery="DELETE FROM `san_pham` where id='$id'";
    $db->query($sqlquery);
    header('location:index.php');
}
?>