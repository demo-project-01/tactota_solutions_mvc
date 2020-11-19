<?php
   session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tactota Solutions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="../public/css/signup.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<div>
    <br/>
    <h1> Registration Form</h1>
    <div class="main-container" id="reg-main">
        <div class="sub-container" id="img-sub">
            <div><img src="../public//images/logo.jpeg" alt="logo" class="verticle-center" width=400 height=auto /></div>
        </div>
        <div class="sub-container">
            <form action="../controller/authenitication.php?action=register" method="post"  enctype="multipart/form-data">

                <i class="fas fa-lock" class="align"></i><input class="text" type="text" name="firstname" placeholder="First Name" required="">
                <?php if(isset($_SESSION['firstname_error'])): ?>
                    <div class="alert">
                        <h1><?php echo $_SESSION['firstname_error']; ?> </h1>
                    </div>
                <?php endif; ?>
                <?php unset($_SESSION['firstname_error']); ?>
                <i class="fas fa-lock" class="align"></i><input class="text" type="text" name="middlename" placeholder="Middle Name">
                <i class="fas fa-lock" class="align"></i><input class="text" type="text" name="lastname" placeholder="Last Name" required="">
                <i class="fas fa-lock" class="align"></i><input class="text" type="text" name="address" placeholder="Address" required="">
                <i class="fas fa-lock" class="align"></i><input class="text" type="text" name="moblile_no" placeholder="Mobile Number" required="">
                <i class="fas fa-lock" class="align"></i><input class="text" type="text" name="nic" placeholder="NIC" required="">
                <i class="fas fa-lock" class="align"></i><input class="text" type="text" name="dob" placeholder="DOB" required="">
                <h5 class="left">Job Position </h5>
                <input class="text" type="radio" name="job_position" value="Clerk" required="">Clerk
                <input class="text" type="radio" name="job_position" value="Shopkeeper" required="">Shop Keeper
        </div>
        <div class="sub-container">


            <input class="text email" type="email" name="email" placeholder="Email" required="">

            <h5 class="left">Image </h5><input class="text" type="file" name="image" placeholder="Image" required="">


            <input class="text" type="text" name="username" placeholder="Username" required="">
            <input class="text" type="password" name="password" placeholder="Password" required="">
            <input class="text" type="password" name="cpassword" placeholder="Confirm Password" required="">
            <div class="wthree-text">
                <label class="anim">
                    <input type="checkbox" class="checkbox" required="">
                    <span>I Agree To The Terms & Conditions</span>
                </label>
                <div class="clear"> </div>
            </div>
            <input type="submit" value="REGISTER">
            <p>Already have an Account? <a href="login.php"> Login Now!</a></p>


            </form>

        </div>
    </div>

    <div class="footer">
        <p>© Tactota Solutions All rights reserved </p>
    </div>

</div>
</body>
</html>
<script>

    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 500);

</script>
