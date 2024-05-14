<?php
include './commonFolder/config.php';
class LoginModel{
     public function fn_validation(){
        if($_REQUEST["email"]!='' && $_REQUEST['password']!=''){
            return 'true';
        }
       
    }
    
     public function fn_login(){ 
    
        $conn = new Config();
        $pass=$_REQUEST['password'];
        $email=$_REQUEST["email"];
       
        $email_check="SELECT * from user where user_email='$email' and password = '$pass'";
        $result_check =   $conn->query($email_check);
       
        if(mysqli_num_rows($result_check)==0){
            // header("Location: index.php?route=login");
            echo "<h2 style='text-align:center; color:red;'>Email or Password is incorrect</h2>";
     
         
        }
            else{
                $data = mysqli_fetch_array($result_check);
                $_SESSION['username']=$data['user_name'];
                $_SESSION['valid_user']="true";
                $_SESSION['user_id']=$data['user_id'];
                
                header("Location: index.php?route=home");
                ob_end_flush();
                exit();
            }
          
    }
    
}