<?php
    include("../frontEnd/layout/connect.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../ico.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />

    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" href="./ico.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="./ico.ico" type="image/x-icon" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

    <title>Cruise Coders | 後台登入頁面</title>

</head>

<body>
    <div class="wrap backLogin">
        <?php
        include('../frontEnd/layout/spacebackground.php');
        ?>

        <div class="backLoginArea">
            <img src="../images/landing/hi.svg" alt="">
            <img src="../images/landing/ai.svg" alt="">
            <div class="">
                     
                <form method="post" action="backLoginRRR.php" >   
                        <label for="">帳號
                            <input type="text" placeholder="請輸入帳號" name="mAccount"><span class="error"></span>
                        </label>
                        <label for="">密碼
                            <input type="password" placeholder="請輸入密碼" name="mPassword"><span class="error"></span>
                        </label>
                        <button type="submit">登入</button>
                    </form>
                    
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../js/backLogin.js"></script>

</body>

</html>