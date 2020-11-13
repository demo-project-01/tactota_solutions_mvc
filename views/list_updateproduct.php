<?php
include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';
$data=new inventory_maintain();
$sql=$data->update_product();

//print_r($sql);
?>

<div class="content" style="width: auto;">

    <h1 id="tbl-heading"> View Product</h1>

    <div class="search">
        <input type="text" placeholder="Search..">
    </div>
    <div class="main-container" id="view-tbl">
        <table>
            <thead>
            <tr>

                <th scope="col">Product Name</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Supplier Name</th>
                <th scope="col">Price</th>
                <th scope="col" colspan=3 border=0>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($sql as $k => $v){
                ?>


                <tr>
                    <td><?php echo $sql[$k]["p_name"] ?></td>
                    <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["sup_id"] ?></td>
                    <td><?php echo $sql[$k]["sales_price"] ?></td>
                    <td><a href="../controller/inventory_maintain.php?action=view_one_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" class="view"><button class="view">View</button> </td>
                    <td><a href="../controller/inventory_maintain.php?action=view_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" class="view"><button>Update</button></a></td>
                    <td><a href="../controller/inventory_maintain.php?action=delete_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" class="view"><button class="delete">Delete</button> </td>
                </tr>
                <?php

            } ?>
            </tbody>


        </table>
    </div>
</div>
</div>
</body>




