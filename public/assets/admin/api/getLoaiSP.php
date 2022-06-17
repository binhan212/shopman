<?php
    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "banthucphamsach";
    $db = new mysqli($host, $username, $password, $database);
    $result = $db->query("SELECT * FROM loai_sp");
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($row);
    mysqli_close($db);
?>