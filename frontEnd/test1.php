<html>
<head><title>使用POST傳遞</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form action="test1 copy.php" method=post>
    名字: 
    <input name=guestID type=text /><br />
    留言:
    <input name=guestName type=text  />
    <input name=ok type=submit value="OK"/><br />
</form>
<br />
<?php
    // mysql_connect("localhost","root","123456");

    include("./layout/connect.php");

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_select); //連線資料庫
 
    $sql="select * from test order by guestID desc";
    $aa=mysqli_query($conn,$sql);
 
    echo "<table width=400 border=1>";
     
        while($bb=mysqli_fetch_row($aa)){
        echo "<tr><td>$bb[0]"."$bb[1]"."說:"."$bb[0]</td></tr>";
        }
    echo "</table>";
?>
 
</body>
</html>