<?php
 session_start();
  $row=$_SESSION['product_details'];
 // print_r($row);
 // print_r($row['p_name']);
 // print_r($row['p_id']);
//print_r($_SESSION['emp_id']);
 //print_r($_SESSION['product_details']);

?>

  <form method="post" action="../controller/inventory_maintain.php?action=update_product_details&id=<?php echo $row['p_id'] ?>">

   <input  placeholder="Last Name" name="p_name" value="<?php echo $row['p_name'] ?>" disabled>
   <input  placeholder="Last Name" name="brand_name" value="<?php echo $row['brand_name'] ?>" disabled>
   <input  placeholder="Last Name" name="model_no" value="<?php echo $row['model_no'] ?>" disabled>
   <input  placeholder="Last Name" name="reorder_level" value="<?php echo $row['reorder_level'] ?>"  >
   <input  placeholder="Last Name" name="quantity" value="<?php echo $row['quantity'] ?>" disabled>
   <input  placeholder="Last Name" name="warranty" value="<?php echo $row['warranty'] ?>" >
   <input  placeholder="Last Name" name="p_cost" value="<?php echo $row['p_cost'] ?>" >
   <input  placeholder="Last Name" name="sales_price" value="<?php echo $row['sales_price'] ?>" >
   <input type="submit" name="update_product" value="update">
  </form>
