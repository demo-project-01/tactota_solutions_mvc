<?php
require_once("../model/sales_model.php");

class sales
{

    public function __construct()
    {

        $this->sale = new sales_model();

    }
   public function get_supplier_names(){
        return $this->sale->get_names();
   }

    public function add_product()
    {
        $product_name = $_POST['product_name'];
        $brand_name = $_POST['brand_name'];
        $model_number = $_POST['model_number'];
        $quantity = $_POST['quntity'];
        $product_cost= $_POST['product_cost'];
        $supplier_id = $_POST['supplier'];
        $warranty = $_POST['warranty'];
        $sales_price = $_POST['sales_price'];
        $serial_number = $_POST['serial_number'];
        $reorder_level = $_POST['reorder_level'];
        $product_status=true;
        $item_status=true;
        $product_date=date("Y-m-d");
        $product_id = $this->sale->get_product_id();

      //  print_r(sizeof($serial_number));

          $size_array=sizeof($serial_number);
          if($quantity==$size_array){
              echo "good";
          }else if($quantity > $size_array){
               echo "you can add less than quntyty";
          }else{
              echo "you can add more than quntyty";
          }


            foreach ($serial_number as $key =>$value){
                 $serial_number[$key]=$value."#".$product_id;
            }


      //  print_r($product_date);
       // print_r($item_status);
      //  print_r($product_id);
       // print_r($quantity);
    if($this->sale->add_new_product($product_id,$product_name,$product_cost,$brand_name,$reorder_level,$model_number,$quantity,$warranty,$product_status,$product_date,$serial_number,$sales_price,$item_status,$supplier_id)){
          $_SESSION['add_product']="successful Add New Suppliers";
        header('location: ../views/view_all_products.php');
    }else{
            echo "dhskfshdj";
    }

    }

    public function valid_prodcuts(){
        return $this->sale->view_products();
    }
    public function sell($id){
       print_r($id);

   //   header('location: ../views/bill.php');
    }

    public function dashbord_search()
    {
          $id=$_POST['query'];
        return $this->sale->dashbord_search($id);
    }

}
$controller = new sales();
if(isset($_GET['action']) && $_GET['action'] == "get_supplier_names") {
    $controller->get_supplier_names();
}else if(isset($_GET['action']) && $_GET['action'] == 'add_product') {
    $controller->add_product();
}else if(isset($_GET['action']) && $_GET['action'] == 'valid_prodcuts') {
    $controller->valid_prodcuts();
}else if(isset($_GET['action']) && $_GET['action'] == 'sell') {
    $id=$_GET["id"];
    $controller->sell($id);
}else if(isset($_GET['action']) && $_GET['action'] == '') {
     $id=$_POST['search'];
    $controller->dashbord_search();
}



