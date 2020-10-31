<?php
require_once("database.php");

class inventory_maintain_model
{
    public function __construct() {
        $this->mysqli = database::getInstance()->getConnection();
    }
    public function valid_email($email)
    {
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM  supplier WHERE email_address='" . $email . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['sup_id'];
            }
            return $result;
        }else
        {
            return 0;
        }
    }

    public function valid_name($name){
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM supplier WHERE sup_name='" . $name . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['sup_id'];
            }
            return $result;
        }else
        {
            return 0;
        }
    }

    public function getsupid(){


        $query = $this->mysqli->query("SELECT * from supplier order by sup_id desc LIMIT 1");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['sup_id'];
            }

            $result = substr($result, 3, 5);
            $result = (int) $result + 1;
            $result = "SUP" . sprintf('%04s', $result);
            return $result;
        }else
        {
            $result = "SUP0001";

            return $result;
        }

    }
    public function supplier_register($sup_id,$name,$address,$mobile_no,$email){
        $stmt = $this->mysqli->prepare("INSERT INTO supplier (sup_id,sup_name,email_address)
                                        VALUES (?,?,?)");

        if($stmt == false)
        {
            return 0;
        }else{
            $stmt->bind_param('sss',$sup_id,$name,$email);

            $stmt1 = $this->mysqli->prepare("INSERT INTO sup_address (sup_id,address)
                                        VALUES (?,?)");
            $stmt2 = $this->mysqli->prepare("INSERT INTO sup_telephone (sup_id,telephone_no)
                                        VALUES (?,?)");
            $stmt->execute();
            $stmt1->bind_param('ss',$sup_id,$address);
            $stmt1->execute();
            $stmt2->bind_param('ss',$sup_id,$mobile_no);
            return $stmt2->execute();
        }
    }

    public function get_details(){
        $query = $this->mysqli->query("SELECT sup_id,sup_name FROM  supplier ");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

     public function get_view_details($id){
         $result = "";
         $query = $this->mysqli->query("SELECT * FROM supplier INNER JOIN sup_address ON supplier.sup_id=sup_address.sup_id INNER JOIN sup_telephone ON sup_address.sup_id=sup_telephone.sup_id  AND supplier.sup_id='" . $id . "'");

         while ($row = $query->fetch_assoc()) {
             $result = $row;
         }
         return $result;
     }

    public function get_product_details(){

        $query = $this->mysqli->query("SELECT * FROM  product INNER JOIN supplier_product ON product.p_id=supplier_product.p_id");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }


}