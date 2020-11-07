<?php
   require_once("database.php");

class authenitication_model{

  //  public string $result = "";


       public function __construct() {
              $this->mysqli = database::getInstance()->getConnection();
           }

           public function login($username,$password)
           {

               $result = "";
               $query = $this->mysqli->query("SELECT * FROM user_account WHERE username='" . $username . "' AND password='" . $password . "'");
               if ($query->num_rows > 0) {
                   while ($row = $query->fetch_assoc()) {
                       $result = $row['emp_id'];
                   }
                   return $result;
               }else
               {
                   return 0;
               }
           }

          public function getposition($row){
                   $result = "";

             $query = $this->mysqli->query("SELECT * FROM employee WHERE emp_id = '".$row."'");
			  while ($row = $query->fetch_assoc()) {
                     $result = $row['position'];
                  }
               return $result;
               }


    public function valid_email($email)
    {
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM user_account WHERE email='" . $email . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['username'];
            }
            return $result;
        }else
        {
            return 0;
        }
    }

    public function valid_username($username){
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM user_account WHERE username='" . $username . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['emp_id'];
            }
            return $result;
        }else
        {
            return 0;
        }
    }

    public function getempid(){


        $query = $this->mysqli->query("SELECT * from user_account order by emp_id desc LIMIT 1");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['emp_id'];
            }

            $result = substr($result, 3, 5);
            $result = (int) $result + 1;
            $result = "EMP" . sprintf('%04s', $result);
             return $result;
        }else
        {
            $result = "EMP0001";

            return $result;
        }



    }
    public function emp_register($emp_id,$firstname,$middlename,$lastname,$nic,$address,$image,$job_position,$mobile_no,$dob,$username,$password,$email,$verified,$token){
        $stmt = $this->mysqli->prepare("INSERT INTO employee (emp_id,first_name,middle_name,last_name,nic,address,image,position,mobile_no,dob)
                                        VALUES (?,?,?,?,?,?,?,?,?,?)");

        if($stmt == false)
        {
            return 0;
        }else{
            $stmt->bind_param('ssssssssss',$emp_id,$firstname,$middlename,$lastname,$nic,$address,$image,$job_position,$mobile_no,$dob);

            $stmt1 = $this->mysqli->prepare("INSERT INTO user_account (emp_id,username,password,email,verified,token)
                                        VALUES (?,?,?,?,?,?)");
            $stmt->execute();
            $stmt1->bind_param('ssssss',$emp_id,$username,$password,$email,$verified,$token);

             return $stmt1->execute();
        }
    }


    public function get_details()
    {
        $query = $this->mysqli->query("SELECT user_account.emp_id,username,position FROM user_account INNER JOIN employee ON user_account.emp_id=employee.emp_id");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

    public function get_view_details($id){
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM user_account INNER JOIN employee ON user_account.emp_id=employee.emp_id AND user_account.emp_id='" . $id . "'");

            while ($row = $query->fetch_assoc()) {
                $result = $row;
            }
            return $result;

    }

    public function search_details($search){
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM user_account INNER JOIN employee ON user_account.emp_id=employee.emp_id AND user_account.username='" . $search . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row;
            }
            return $result;
        }
    }

}
