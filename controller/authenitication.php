<?php
  require_once("../model/authenitication_model.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;





  //require_once("../include.php");
  session_start();
class authenitication
{


 //   public array $errors = array();

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
            $token=$username="";
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
                // print_r($username);
               //  print_r($token);
           $this->send_email_rest_password($email,$row);



         }

        }
     public function send_email_rest_password($email,$row){
         require_once "../vendor/autoload.php";
         $mail = new PHPMailer(true);
         // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
         $mail->Port = 587;

         $mail->Username = 'projectt541@gmail.com'; // YOUR gmail email
         $mail->Password = '#project32'; // YOUR gmail password

         // Sender and recipient settings
         $mail->setFrom('projectt541@gmail.com', 'Sender Name');
         $mail->addAddress($email);
         //$mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to

         // Setting the email content
         $mail->IsHTML(true);
         $mail->Subject = "Send email using Gmail SMTP and PHPMailer";
         $mail->Body = 'reset password <html><?php  ?></html>   <b><a href="http://localhost/tactota_solutions/views/reset_password.php?key=' . $email . '&token='.$row.'">Click To Reset Password!</a></b> ';
         $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

         $result=$mail->send();
         if($result==false){
             echo "worng";
         }else{
             header('location: ../views/check_email');
         }

     }

    public function reset_password($key)
    {

        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

       //  print_r($key);
       //  print_r($token);
       //  print_r($password);
        // print_r($cpassword);
        if($password != $cpassword){
            header('location: ../views/forgotpassword.php');
        }else{
            $result=$this->auth->update_password($key,$password);

              if($result==false){
                 echo "wrong";
              }else{
                  header('location: ../views/login.php');
              }
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
                   // echo $emp_id;
                    if($this->auth->emp_register($emp_id,$firstname,$middlename,$lastname,$nic,$address,$image,$job_position,$mobile_no,$dob,$username,$password,$email,$verifed,$token) !=0){

                        // header('location:authenitication.php?action=sendverifiedemail&id=$email&id2=$token');

                        //header('location: ../views/successful_register.php');

                        $result=$this->send_email($email,$firstname,$token,$emp_id);
                        if($result==true){
                            header('location: ../views/successful_register.php');
                        } else
                          echo "Error in sending email";
                    }else{
                          echo "wrong";
                   }



              }



     }
     public function send_email($email,$firstname,$token,$emp_id){
         require_once "../vendor/autoload.php";
         $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
         $mail->Port = 587;

         $mail->Username = 'projectt541@gmail.com'; // YOUR gmail email
         $mail->Password = '#project32'; // YOUR gmail password

         // Sender and recipient settings
         $mail->setFrom('projectt541@gmail.com', 'Sender Name');
         $mail->addAddress($email, $firstname);
         //$mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to

         // Setting the email content
         $mail->IsHTML(true);
         $mail->Subject = "Send email using Gmail SMTP and PHPMailer";
         $mail->Body = 'HTML message body. <b><a href="http://localhost/tactota_solutions/controller/authenitication.php?action=verify_account&id=' . $emp_id . '&token='.$token.'">Verify Email!</a></b> SMTP email body.';
         $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

         $result=$mail->send();
         if($result>0){
             return true;
         }else{
             return false;
         }
     }

     public function  user_details(){
          print_r($_SESSION['emp_id']);
     }

    public function active_user()
    {

       return $this->auth->get_details();
    }

    public function sent_view_profile($id)
    {
       // echo "Hello world";
     //   print_r($id);
       $row = $this->auth->get_view_details($id);

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

    public function active_inactive_account($id,$id1)
    {
       //  print_r($id);
        // print_r($id1);
        $this->auth->active_inactive_account($id,$id1);
        header('location: ../views/clerk_active_user.php');

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

    public function verify_account($emp_id,$token)
    {


              $row=$this->auth->active_employee_email($emp_id,$token);
              if($row=='0'){
                  echo "wrong";
              }else{
                 header('location: ../views/login.php');
                  //echo "suesss";
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
      }else if(isset($_GET['action']) && $_GET['action'] == 'reset_password') {
               $key=$_GET['key'];
          $controller->reset_password($key);
      }else if(isset($_GET['action']) && $_GET['action'] == 'logout') {
          $controller->logout();
      }else if(isset($_GET['action']) && $_GET['action'] == 'user_details') {
          $controller->user_details();
      }else if(isset($_GET['action']) && $_GET['action'] == 'active_user') {
             $controller->active_user();
         }else if(isset($_GET['action']) && $_GET['action'] == 'view_profile' ) {
               $id=$_GET["id"];
            $controller->sent_view_profile($id);
         }else if(isset($_GET['action']) && $_GET['action'] == 'active_inactive_account' ) {
               $id=$_GET["id"];
               $id1=$_GET["id1"];
             $controller->active_inactive_account($id,$id1);
         }else if(isset($_GET['action']) && $_GET['action'] == '' ) {

             $controller->search_details();
         }else if(isset($_GET['action']) && $_GET['action'] == 'update_profile' ) {
                 $emp_id=$_SESSION['emp_id'];
               print_r($emp_id);
          //   $controller->search_details();
         }else if(isset($_GET['action']) && $_GET['action'] == 'verify_account' ) {
             $emp_id="";

             $emp_id=$_GET["id"];
             $token=$_GET['token'];

               $controller->verify_account($emp_id,$token);
         }
