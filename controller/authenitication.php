<?php
  require_once("../model/authenitication_model.php");
  //require_once('../vendor/vendor/autoload.php');



  //require_once("../include.php");
  session_start();
class authenitication
{


    public array $errors = array();

    public function __construct()
    {

        $this->auth = new authenitication_model();

    }


    public function login()
    {


            $username = $_POST['username'];
            $password = md5($_POST['password']);

           if (empty($username)) {
                $errors['username'] = "Username is required";
            }
            if (empty($password)) {
                $errors['password'] = "Password is required";
            }


            $row = $this->auth->login($username, $password);

             //print $row;
            if ($row == "0") {
                header('location: ../views/login.php');
            } else {
                $role = $this->auth->getposition($row);
               //echo $role;

                if ($role == "Admin") {
                    $_SESSION['username'] = $username;
                    $_SESSION['emp_id'] = $row;
                    $_SESSION['role']=$role;
                    $_SESSION['success'] = "You are now logged in";
                    header('location: ../views/admin.php');
                } elseif ($role == "Clerk") {
                    $_SESSION['username'] = $username;
                    $_SESSION['emp_id']=$row;
                    $_SESSION['role']=$role;
                    $_SESSION['success'] = "You are now logged in";
                    header('location: ../views/clerk.php');
                } elseif ($role == "Shopkeeper") {
                    $_SESSION['username'] = $username;
                    $_SESSION['emp_id']=$row;
                    $_SESSION['role']=$role;
                    $_SESSION['success'] = "You are now logged in";
                    header('location: ../views/shopkeeper_dashbord.php');
                }

        }
    }
    public function forgotpassword()
    {
          //echo "string";
          $email = $_POST['email'];
        if (empty($email)) {
            $errors['email'] = "Username is required";
        }
        $row = $this->auth->valid_email($email);
        if ($row == "0") {

            header('location: ../views/forgetpassword.php');
        }
        else
        {


            $this->var ='hello world';
            header('location: ../views/resetpassword.php');

         }

        }

    public function resetpassword()
    {
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if($password != $cpassword){
            header('location: ../views/resetpassword.php');
        }else{
            echo "correct";
            print $this->var;
        }



    }

    public function logout()
    {
        session_start();
        if (!isset($_SESSION['username']))
        {
            header('location: ../views/login.php');
        }
        else if(isset($_SESSION['username'])!="")
            header('location: ../views/login.php');
        if(isset($_GET['logout']))
        {
            session_destroy();
            session_unset();
            header('location: ../views/login.php');
        }
    }

    public function update()
    {
    //  echo "striing";
        $temp=$_SESSION['username'];
        echo $temp;
    }

    public function register()
    {
        $firstname=$middlename=$lastname =$nic=$dob=$job_position=$image=$username = $email =$password = $cpassword = "" ;

          $firstname = $_POST['firstname'];
          $middlename = $_POST['middlename'];
          $lastname = $_POST['lastname'];
          $address = $_POST['address'];
          $mobile_no = $_POST['moblile_no'];
          $nic = $_POST['nic'];
          $dob = $_POST['dob'];
          $job_position = $_POST['job_position'];
          $email = $_POST['email'];
        //  $image = $_POST['image'];
          $username = $_POST['username'];
          $password = md5($_POST['password']);
          $cpassword = md5($_POST['cpassword']);



          if (empty($firstname)) {
              $errors['firstname'] = "Firstname is required";
          }
          if (empty($lastname)) {
              $errors['lastname'] = "Lastname is required";
          }
          if (empty($address)) {
              $errors['address'] = "Address is required";
          }
          if (empty($mobile_no)) {
              $errors['mobile_no'] = "Mobile number is required";
          }
          if (empty($nic)) {
              $errors['nic'] = "NIC is required";
          }
          if (empty($dob)) {
              $errors['dob'] = "DOB is required";
          }


          if (empty($username)) {
              $errors['username'] = "Username is required";
          }
          if (empty($cpassword)) {
              $errors['cpassword'] = "confrom password is required";
          }

          $token=bin2hex(random_bytes(50));

          $verifed=false;
          $row = $this->auth->valid_email($email);
          $row1 = $this->auth->valid_username($username);


              if($password != $cpassword){
                  echo "passwords doesn't match";
              }else if ($row != "0") {

                     echo "email already doesnot mamtch";
              }
              else if($row1 != "0" )
              {
                     echo "username doesn't match";
              }
             else{
                   $emp_id = $this->auth->getempid();
                    echo $emp_id;
                    if($this->auth->emp_register($emp_id,$firstname,$middlename,$lastname,$nic,$address,$image,$job_position,$mobile_no,$dob,$username,$password,$email,$verifed,$token) !=0){
                     // header('location:authenitication.php?action=sendverifiedemail&id=$email&id2=$token');
                     header('location: ../views/successful_register.php');
                   }else{
                          echo "wrong";
                   }



              }


     }
     public function  user_details(){
          print_r($_SESSION['emp_id']);
     }

    public function active_user()
    {

       // return $this->auth->get_details();
    }

    public function sent_view_profile($id)//
    {
       // echo "Hello world";
     //   print_r($id);
       $row = $this->auth->get_view_details($id);
     //   $jason_str=json_encode($row);
      /*  echo "<br>";
        print_r($row['first_name']);
        echo "<br>";
        print_r($row['middle_name']);
        echo "<br>";
        print_r($row['last_name']);
        echo "<br>";
        print_r($row['email']);
        echo "<br>";
        print_r($row['nic']);
        echo "<br>";
        print_r($row['address']);
      */
       $_SESSION['row']=$row;
       header('location: ../views/view_profile.php');

    }

    public function active_account($id)
    {
        // print_r();
    }

    public function sendverifiedemail($email, $token)
    {
        print_r($email);
        print_r($token);
    }

    public function search_details()
    {
     //   print_r($search);
    //    $search = $_POST['query'];
      //  $run =  $this->auth->search_details($search);
     //  print_r($run);
//        $_SESSION['run']=$run;
     //   header('location: ../views/clerk_active_user_search.php');

     if(isset($_POST['query'])){

           $search = $_POST['query'];
      //
         $run =  $this->auth->search_details($search);
          $_SESSION['run']=$run;
        // print_r($run);
       //  header('location: ../views/clerk_active_user_search.php');
     }else{
         $run=$this->auth->get_details();
         $_SESSION['run']=$run;
         //header('location: ../views/clerk_active_user_search.php');
        // print_r($run);
     }
    }


}
        $controller = new authenitication();
         if(isset($_GET['action']) && $_GET['action'] == "register") {
             $controller->register();
         }else if(isset($_GET['action']) && $_GET['action'] == 'login') {
           $controller->login();
       }else if(isset($_GET['action']) && $_GET['action'] == 'forgotpassword') {
          $controller->forgotpassword();
      }else if(isset($_GET['action']) && $_GET['action'] == 'resetpassword') {
          $controller->resetpassword();
      }else if(isset($_GET['action']) && $_GET['action'] == 'logout') {
          $controller->logout();
      }else if(isset($_GET['action']) && $_GET['action'] == 'user_details') {
          $controller->user_details();
      }else if(isset($_GET['action']) && $_GET['action'] == 'active_user') {
             $controller->active_user();
         }else if(isset($_GET['action']) && $_GET['action'] == 'view_profile' ) {
               $id=$_GET["id"];
            $controller->sent_view_profile($id);
         }else if(isset($_GET['action']) && $_GET['action'] == 'active_account' ) {
             $id=$_GET["id"];
             $controller->active_account($id);
         }else if(isset($_GET['action']) && $_GET['action'] == 'sendverifiedemail' ) {
             $email=$_GET["id"];
             $token=$_GET['id2'];
          //   print_r($email);
            // print_r($token);
             $controller->sendverifiedemail($email,$token);
         }else if(isset($_GET['action']) && $_GET['action'] == '' ) {
             //$email=$_GET["id"];
             //$token=$_GET['id2'];
            // $search = $_POST['query'];
         //    print_r($search);

             $controller->search_details();
         }else if(isset($_GET['action']) && $_GET['action'] == 'update_profile' ) {
                 $emp_id=$_SESSION['emp_id'];
               print_r($emp_id);
          //   $controller->search_details();
         }
