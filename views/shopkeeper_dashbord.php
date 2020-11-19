<?php
require_once('shopkeeper_sidebar.php');
?>
<div class="content" style="width: auto;">

    <br><br><div class="image"><img src="../public/images/logo.jpeg" alt="logo" class="centers" width=200 height=300/></div>

    <br><br>
    <div class="center">

        <form class="example">
            <input type="text" id="search" placeholder="Search Product" name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            <div id="result"></div>
        </form>
    </div>

    <div class="footer">
        <p>© Tactota Solutions All rights reserved </p>
    </div>
</div>
<head>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<script type="text/javascript">
    $(document).ready(function(){
        $("#search").on("keyup", function(){
            var search = $(this).val();
            if (search !=="") {
                $.ajax({
                    url:"../controller/sales.php?action=",
                    type:"POST",
                    cache:false,
                    data:{search:search},
                    success:function(data){
                        $("#result").html(data);
                        $("#result").fadeIn();
                    }
                });
            }else{
                $("#result").html("");
                $("#result").fadeOut();
            }
        });

</script>
