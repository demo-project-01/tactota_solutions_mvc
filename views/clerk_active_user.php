<?php
include 'clerk_sidebar.php';
//require '../controller/authenitication.php';
//$data=new authenitication();
//$sql=$data->active_user();

?>

<div class="content">

    <h1> USER DETAILS</h1>

    <div class="main-container" id="view-tbl">
        <div class="search">
            <input type="text" placeholder="Search.." id="search_text">
        </div>
    </div>
    <div class="main-container" id="view-tbl">


    </div>
</div>
</div>

<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"../controller/authenitication.php?action=",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#view-tbl').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search !== '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</body>

