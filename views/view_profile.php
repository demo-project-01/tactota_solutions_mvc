<?php
session_start();
//include 'clerk_sidebar.php';
$row=$_SESSION['row'];

print_r($row);


//$row ="";


//echo "<br>";
//print_r($row['middle_name']);
//echo "<br>";
//print_r($row['last_name']);
//echo "<br>";
//print_r($row['email']);
//echo "<br>";
//print_r($row['nic']);
//echo "<br>";
//print_r($row['address']);
?>

<!--
<div class="content">
    <head>
        <title>Tactota Solutions</title>
        <link rel="stylesheet" href="../public/css/signup.css">


    </head>
    <body>
    <div>


        <div class="main-form">

            <div class="sub-container">

                <b><h1>Edit Account Info</h1></b>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-25">
                            <label>First Name</label>
                        </div>
                        <div class="col-25">
                            <input class="text" type="text" name="firstname" placeholder="First Name" value="<?php echo $row['first_name']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Middle Name</label>
                        </div>
                        <div class="col-25">
                            <input class="text" type="text" name="middlename" placeholder="Middle Name" value="<?php echo $row['middle_name']?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label>Last Name</label>
                            <div class="col-25">
                                <input class="text" type="text" name="lastname" placeholder="Last Name" value="<?php echo $row['last_name']?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label>Address</label>
                            </div>
                            <div class="col-25">
                                <input class="text" type="text" name="address" placeholder="Address" value="<?php echo $row['address']?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Mobile Number</label>
                            </div>
                            <div class="col-25">
                                <input class="text" type="text" name="moblile_no" placeholder="Mobile Number" value="<?php echo $row['mobile_no'] ?>" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>NIC</label>
                            </div>
                            <div class="col-25">
                                <input class="text" type="text" name="nic" placeholder="NIC" value="<?php echo $row['nic'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>DOB</label>
                            </div>
                            <div class="col-25">
                                <input class="text" type="text" name="dob" placeholder="DOB" value="<?php echo $row['dob'] ?>" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Email</label>
                            </div>
                            <div class="col-25">
                                <input class="text email" type="email" name="email" placeholder="Email" value="<?php echo $row['email'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Job Position</label>
                            </div>
                            <div class="col-25">
                                <input class="text" type="text" name="text" placeholder="clerk/shop keeper/admin" value="<?php echo $row['position'] ?>">
                            </div>
                        </div>




                    </div>
                    <div class="sub-container">
                    </div></br>



                    <div class="wthree-text">
                        <div class="clear"> </div>
                    </div>
                    <input type="submit">
                </form>

            </div>
        </div>

        <div class="footer">
            <p>© Tactota Solutions All rights reserved </p>
        </div>

    </div>
    </body>
</div>





