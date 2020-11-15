<?php
session_start();
$sql=$_SESSION['run'];
print_r($sql);

?>
<!--
<table id="table-data">
    <thead>
    <tr>
        <th>User ID</th>
        <th scope="col">User Name</th>
        <th scope="col">Job Position</th>
        <th scope="col">Active/non-Active</th>
        <th scope="col">View Details</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($sql as $k => $v){
        ?>


        <tr>
            <td><?php echo $sql[$k]["emp_id"] ?></td>
            <td><?php echo $sql[$k]["username"] ?></td>
            <td><?php echo $sql[$k]["position"] ?></td>
            <td><label class="switch">

                    <input type="checkbox" id="active" onclick="active()">
                    <span class="slider round"></span>

                </label>
            </td>
            <td><a href="../controller/authenitication.php?action=view_profile&id=<?php  echo $sql[$k]["emp_id"]; ?>" class="view"><button>View</button></a></td>
        </tr>
        <?php

    } ?>
    </tbody>


</table>

//clerk_active_user
<!--
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
-->
