<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "banthucphamsach";
$tt =1;
$db = new mysqli($host,$username,$password,$database);
$sqlquery = "SELECT * FROM `nha_cung_cap` limit 12";
$result = $db->query($sqlquery);
while($r = mysqli_fetch_assoc($result))
{
	$data[] = $r;
}
echo json_encode($data);
mysqli_close($db);
?>