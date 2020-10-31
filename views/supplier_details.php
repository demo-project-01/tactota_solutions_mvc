<?php
include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';
$data=new inventory_maintain();
$sql=$data->view_suppliers();
?>

<head>
    <script type="text/javascript" src="../public/js/authentification.js"></script>
</head>
<div class="content">

    <h1> USER DETAILS</h1>

    <div>
        <a href="add_suppliers.php" class="next">Add Suppliers</a>
    </div>

    <div class="main-container" id="view-tbl">
        <div class="search">
            <input type="text" placeholder="Search..">
        </div>
    </div>
    <div class="main-container" id="view-tbl">
        <table>
            <thead>
            <tr>
                <th>Supplier Name</th>

            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($sql as $k => $v)
            {
                ?>


                <tr>
                    <td><?php echo $sql[$k]["sup_name"] ?>

                    <a href="../controller/inventory_maintain.php?action=supplier_profile&id=<?php  echo $sql[$k]["sup_id"]; ?>" class="view"><button>View</button></a>
                    </td>


                </tr>
                <?php

            } ?>
            </tbody>


        </table>
    </div>
</div>
</div>
</body>

