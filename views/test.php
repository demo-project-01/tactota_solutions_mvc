<?php
include 'clerk_sidebar.php';
require '../controller/sales.php';
$data=new sales();
$sql=$data->get_supplier_names();
?>
<head>

    <link href="../public/css/signup.css" rel="stylesheet" type="text/css"/>
    <link href="../public/css/new_product.css" rel="stylesheet" type="text/css"/>
</head>

<div class="content">
    <h2>Add new product</h2>

    <div class="main-container" id="reg-main">

        <div class="sub-container">

            <form action="../controller/authenitication.php?action=register" method="post">

                      <input class="text" type="text" name="product_name" placeholder="Product Name" required="">

                      <input class="text" type="text" name="brand_name" placeholder="Brand Name" required="">
                      <input class="text" type="text" name="model_number" placeholder="Model Number" required="">
                      <input class="text" type="text" name="quantity" placeholder="Quantity" required="">
                      <input class="text" type="text" name="product_cost" placeholder="Product Cost" required="">
                      <input class="text" type="text" name="sales_price" placeholder="Sales Price" required="">
                      <input class="text" type="text" name="warranty_period" placeholder="Warranty Period(Month) " required="">
                <div class="container">
                    <div class="main">
                      <select class="select_supplier" id="cars" name="supplier name" style="float: left; ">
                    <?php

                    foreach ($sql as $k => $v){
                        ?>
                        <option value="<?php echo $sql[$k]["sup_id"] ?>"><?php echo $sql[$k]["sup_name"] ?></option>
                        <?php
                    }
                    ?>
                  </select>
                    </div>
                </div>
                      <input class="text" type="text" name="reorder_level" placeholder="Reorder Level" required="">

                       <input type="submit" style="width: 100px; float: left; " value="Add">



            </form>
        </div>

    </div>

</div>
</div>
</body>

