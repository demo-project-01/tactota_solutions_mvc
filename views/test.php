<?php
include 'clerk_sidebar.php';
require '../controller/authenitication.php';
$data=new authenitication();
$sql=$data->active_user();

?>
<head>
    <script type="text/javascript" src="../public/js/authentification.js"></script>
</head>
<div class="content">

    <h1> USER DETAILS</h1>

    <div class="main-container" id="view-tbl">
        <div class="search">
            <input type="text" placeholder="Search.." id="search_text" >
        </div>
    </div>
    <div class="main-container" id="view-tbl">
        <table>
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
    </div>
</div>
</div>
</body>


<script>
    $(document).ready(function () {
           load_data();
           function load_data(query){
               $.ajax({
                   url:"",
                   method:"POST",
                   data:{query:query},
                   success:function (data) {

                   }
               });
           }
    });


</script>
