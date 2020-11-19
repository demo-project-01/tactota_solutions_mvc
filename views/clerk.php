<?php
session_start();
if(empty($_SESSION['emp_id']) || $_SESSION['emp_id'] == ''){
    header("Location: login.php");
    die();
}


include 'clerk_sidebar.php';


?>



<div class="content" style="width: auto;">

    <?php if(isset($_SESSION['success'])): ?>
     <div class="alert">
    <h1><?php echo $_SESSION['success']; ?> </h1>
     </div>
    <?php endif; ?>
    <?php unset($_SESSION['success']); ?>


    <div>
        <div class= "dash1">
            <b><p class="dash">hello world</p></b>
        </div>

        <div class= "dash2">
            <b><p class="dash">hello world</p></b>
        </div>
    </div>

    <div>
        <div class= "dash3">
            <b><p class="dash">hello world</p></b>
        </div>
        <div class= "dash4">
            <b><p class="dash">hello world</p></b>
        </div>
    </div>

    <div class="wrapper">
        <div class="list_wrap">
            <div class="subcontent">
                <h1><p>Stock Reminders</p></h1>
            </div>
            <ul>
                <li class="github">
                    <div class="list">
                        <div class="contentc">
                            <b>item1</b>
                        </div>
                    </div>
                </li>
                <li class="codepen">
                    <div class="list">
                        <div class="contentc">
                            <b>item2</b>
                        </div>
                    </div>
                </li>
                <li class="dribble">
                    <div class="list">
                        <div class="contentc">
                            <b>item3</b>
                        </div>
                    </div>
                </li>
                <li class="reddit">
                    <div class="list">
                        <div class="contentc">
                            <b>item4</b>
                        </div>
                    </div>
                </li>
                <li class="quora">
                    <div class="list">
                        <div class="contentc">
                            <b>item5</b>
                        </div>
                    </div>
                </li>
                <div class="view">
                    <b><a href="#"><span>View All Products</span></a></b>
                </div>
            </ul>
        </div>
    </div>
    <div class="footer">
        <p>© Tactota Solutions All rights reserved </p>
    </div>
</div>

<script>

    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 500);

</script>

  
