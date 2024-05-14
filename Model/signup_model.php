<?php
  include './commonFolder/config.php';
class SignupModel{
    public function fn_validation(){
        if($_REQUEST['username']!='' && $_REQUEST['email']!='' && $_REQUEST['password']!='' && $_REQUEST['cnf-password']!='' && $_REQUEST['mobile']!=''){
            
            if($_REQUEST['cnf-password']==$_REQUEST['password']){
              
                return 'true';
            }
        }
       
    }
    
    
    public function fn_signup(){
      $conn= new Config();
        $username=$_REQUEST['username'];
        $email=$_REQUEST['email'];
        $pass=$_REQUEST['password'];
        $phone= $_REQUEST['mobile'];
    
        $email_check="SELECT * from user where user_email='$email'";
        $result_check = $conn->query($email_check);
    
        if($result_check->num_rows>0){       
            echo "<h2 style='text-align:center; color:red;'>Email already registered</h2>
            <script>
            setTimeout(function(){
                location.href='index.php?route=login'
            },2000);
            </script>";
        }else{
    
            $sql="INSERT into user (user_name, user_email, password,user_mobileNo) VALUES ('$username','$email','$pass','$phone')";
            $result=$conn->query($sql);
            if($result){
                $_SESSION['user_id']=$_REQUEST['user_id'];
                header("Location: index.php?route=home");
                ob_end_flush();
                exit();
            }else{
              echo  " Error:".mysqli_error();
            }
        }
    }
    
}
 
