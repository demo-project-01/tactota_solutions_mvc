<?php
include 'clerk_sidebar.php';
require '../controller/authenitication.php';
$data=new authenitication();
$sql=$data->active_user();

?>
<div class="content">

    <h1 id="tbl-heading"> Activate Users</h1>

    <div class="search">
        <input type="text" placeholder="Search..">
    </div>


    <div class="view-tbl">
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
</body>
