<?php
    $key=$_GET['key'];
    $token=$_GET['token'];

?>
<!DOCTYPE html>

<head>
    <title>Tactota Solutions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../public/css/signup.css" rel="stylesheet" type="text/css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<div>
    <h1>Reset Password</h1>
    <br/>


    <div class="main-container">
        <div class="sub-container">
            <div><img src="../public/images/logo.jpeg" alt="logo" class="verticle-center" width=400 height=auto /></div>
        </div>

        <div class="sub-container">

            <form action="../controller/authenitication.php?action=reset_password&key=<?php  echo $key; ?>" method="post">
                <i class="fas fa-unlock" class="align"></i>
                <p class="align">Enter New Password</p>


                <input class="text" type="password" name="password" placeholder="New Password" required="">
                <input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" required="">
                <p>just rememberd? <a href="login.php"> Sign in</a></p>
                  <input type="submit" value="UPDATE PASSWORD">
            </form>

        </div>
    </div>

    <div class="footer">
        <p>© Tactota Solutions All rights reserved </p>
    </div>
</div>
</body>
</html>

