<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "banthucphamsach";
$tt =1;
$db = new mysqli($host,$username,$password,$database);
$sqlquery = "SELECT * FROM `users` limit 5";
$result = $db->query($sqlquery);
while($r = mysqli_fetch_assoc($result))
{
	$data[] = $r;
}
echo json_encode($data);
mysqli_close($db);
?>