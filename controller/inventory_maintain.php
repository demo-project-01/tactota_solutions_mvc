<?php
require_once("../model/inventory_maintain_model.php");
session_start();
class inventory_maintain
{
    public function __construct()
    {

        $this->inven = new inventory_maintain_model();

    }

    public function newsuppliers()
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $mobile_no = $_POST['moblile_no'];
        $email = $_POST['email'];

        if (empty($name)) {
            $errors['lastname'] = "Lastname is required";
        }
        if (empty($address)) {
            $errors['address'] = "Address is required";
        }
        if (empty($mobile_no)) {
            $errors['mobile_no'] = "Mobile number is required";
        }

        if (empty($email)) {
            $errors['email'] = "Email is required";
        }

        $row1 = $this->inven->valid_name($name);
        $row = $this->inven->valid_email($email);

        if ($row != "0") {

            echo "email already does not has";
        }
        else if($row1 != "0" )
        {
            echo "name already has";
        }else{
            $sup_id = $this->inven->getsupid();
            echo $sup_id;
            if($this->inven->supplier_register($sup_id,$name,$address,$mobile_no,$email) !=0){
                header('location: ../views/supplier_details.php');
            }else{
                echo "wrong";
            }
        }
    }

    public function view_suppliers()
    {

        return $this->inven->get_details();
    }

    public function supplier_profile($id)
    {
        // print_r($id);
        $row = $this->inven->get_view_details($id);
       /* echo "<br>";
        print_r($row['sup_name']);
        echo "<br>";
        print_r($row['email_address']);
        echo "<br>";
        print_r($row['address']);
        echo "<br>";
        print_r($row['telephone_no']);
       */
       $_SESSION['supplier_profile_details']=$row;
        header('location: ../views/view_one_supplier.php');

    }

    public function update_product(){

       return $this->inven->get_product_details();
    }

    public function view_product_details($id)
    {
         //print_r($id);
        $row= $this->inven->get_view_product_details($id);
          //$p=$row['pp_name'];
       //   print_r($row);
         // print_r($row['p_name']);
          // echo "<br>";
    //      print_r($row['p_id']);
         $_SESSION['product_details']=$row;
        // print_r($_SESSION['product_details']);
        header('location: ../views/update_product.php');

    }

    public function update_product_details($id)
    {

        $reorder_level=$warranty=$p_cost=$sales_price="";
        $reorder_level=$_POST['reorder_level'];
        $warranty=$_POST['warranty'];
        $p_cost=$_POST['p_cost'];
        $sales_price=$_POST['sales_price'];
      // print_r($reorder_level);
        //echo "<br>";
       // print_r($warranty);
        //echo "<br>";
       // print_r($p_cost);
        // echo "<br>";
       // print_r($sales_price);
       $row=$this->inven->update_product_details($id,$reorder_level,$warranty,$p_cost,$sales_price);
        if ($row == "0") {
            header('location: ../views/update_product.php');
        }else{
            header('location: ../views/list_updateproduct.php');
        }
    }

    public function view_one_product_details($id)
    {
        //print_r($id);
        $row= $this->inven->get_view_product_details($id);
        //$p=$row['pp_name'];
     //     print_r($row);
        // print_r($row['p_name']);
        // echo "<br>";
        //      print_r($row['p_id']);
        $_SESSION['one_product_details']=$row;
        // print_r($_SESSION['product_details']);
      header('location: ../views/view_one_product.php');

    }

    public function delete_product_details($id)
    {
        //print_r($id);
        $row= $this->inven->get_delete_product_details($id);
        $quantity=$row['quantity'];
        $count_serial_number=$row['COUNT(item.serial_no)'];
        $value=false;
   //     print_r($quantity);
     //   echo "</br>";
      //  print_r($count_serial_number);
        $row= $this->inven->delete_product_details($id,$quantity,$count_serial_number,$value);
        if($row=="0"){
            echo "wrong";
        }else{
            header('location: ../views/list_updateproduct.php');

        }

    }
}



      $controller = new inventory_maintain();
if(isset($_GET['action']) && $_GET['action'] == "newsuppliers") {
     $controller->newsuppliers();
}else if(isset($_GET['action']) && $_GET['action'] == 'view_suppliers') {
    $controller->view_suppliers();
}else if(isset($_GET['action']) && $_GET['action'] == 'supplier_profile' ) {
    $id=$_GET["id"];
    $controller->supplier_profile($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'update_product') {
    $controller->update_product();
}else if(isset($_GET['action']) && $_GET['action'] == 'view_product_details') {
    $id=$_GET["id"];
    $controller->view_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'update_product_details') {
    $id=$_GET["id"];
    $controller->update_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'delete_product_details') {
    $id=$_GET["id"];
    $controller->delete_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'view_one_product_details') {
    $id=$_GET["id"];
    $controller->view_one_product_details($id);
}
