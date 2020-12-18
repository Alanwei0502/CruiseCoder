<!doctype html>
<html>
<head><title>接收POST訊息&顯示</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  
<?php 
error_reporting(0); 
    $name=$_POST['guestID'];
    $news=$_POST['guestName'];

    include("./layout/connect.php");

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_select); //連線資料庫
     
    $link=mysqli_connect("localhost","root","","cruisecoder");

    $sql = "INSERT INTO test (guestID,guestName) VALUES ($name, $news)";
    
    if ($conn->query($sql) === TRUE) {
      header('Location:test1.php');

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // mysqli_query($conn,$sql);
    // include("test1.php");
?>
</body>
</html>