<?php
include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';
$data=new inventory_maintain();
$sql=$data->update_product();

//print_r($sql);
?>

<div class="content">

    <h1> USER DETAILS</h1>

    <div class="main-container" id="view-tbl">
        <div class="search">
            <input type="text" placeholder="Search..">
        </div>
    </div>
    <div class="main-container" id="view-tbl">
        <table>
            <thead>
            <tr>

                <th scope="col">Product Name</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Supplier Name</th>
                <th scope="col">Price</th>
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
                    <td><a href="../controller/inventory_maintain.php?action=view_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" class="view"><button>View</button></a></td>
                </tr>
                <?php

            } ?>
            </tbody>


        </table>
    </div>
</div>
</div>
</body>




