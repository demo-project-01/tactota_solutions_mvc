<?php
include 'clerk_sidebar.php';

require '../controller/sales.php';
$data=new sales();
$sql=$data->get_supplier_names();
//print_r($sql);
?>

<div class="content">

    <form action="../controller/sales.php?action=add_product" method="post">
        <input class="text" type="text" name="product_name" placeholder="product" required="">
        <input class="text" type="text" name="brand_name" placeholder="brand_name" required="">
        <input class="text" type="text" name="model_number" placeholder="model_number" required="">
        <input class="text" type="text" name="quntity" placeholder="Quantity" required="">
        <input class="text" type="text" name="product_cost" placeholder="product_cost" required="">
        <input class="text" type="text" name="sales_price" placeholder="sales_price" required="">
        <label for="cars">supplier:</label>

        <select id="newproduct" name="supplier">
            <?php

            foreach ($sql as $k => $v){
            ?>
            <option value="<?php echo $sql[$k]["sup_id"] ?>"><?php echo $sql[$k]["sup_name"] ?></option>
                <?php
            }
            ?>
        </select>

        <input class="text" type="text" name="warranty" placeholder="warranty" required="">
        <input class="text" type="text" name="serial_number" placeholder="serial_number" required="">

        <input class="text" type="text" name="reorder_level" placeholder="reorder_level" required="">


        <input type="submit" name="login_user" value="LOGIN">
    </form>

</div>

