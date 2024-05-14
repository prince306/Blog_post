<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start();

include './commonFolder/header.php';  


// include 



?>

<!-- <div class="display"> -->

<?php

 if(isset($_GET['route']) && $_GET['route']=='home'){
 
  try{
  
      include './Model/home_model.php';
      include './Controller/home_controller.php';
      include './View/home.php';
      $home=new Home();
     
      
  }catch(Exception $e) {
    echo "Caught exception: " . $e->getMessage();
}
}
else if(isset($_GET['route']) && $_GET['route']=='signup')
{   
  
  include './Model/signup_model.php';
    include './Controller/signup_controller.php';
    if(!isset($_SESSION['valid_user'])){
    include './View/signup.php';
    $signup=new Signup;
    }else{
      header("location: index.php?route=home");
    }
}
else if(isset($_GET['route']) && $_GET['route']=='login')
{
 
 try{
    include './Model/login_model.php';
    include './Controller/login_controller.php';
    if(!isset($_SESSION['valid_user'])){
      include './View/login.php';
      $login=new Login();
    }else{
      header("location: index.php?route=home");
    }
  
 }catch(Exception $e){
  echo "Caught exception: " . $e->getMessage();
 }
}
else if(isset($_GET['route']) && $_GET['route']=='postblog')
{ 
 if(isset($_SESSION['valid_user']) && $_SESSION['valid_user']==true){
  
  include './Model/postblog_model.php';
  include './Controller/postblog_controller.php';
  include './View/postBlog.php';
  $PostBlog= new PostBlog();
 }else{
  header("location: index.php");
 }
}
else if(isset($_GET['route']) && $_GET['route']=='myblog')
{
  
  if(isset($_SESSION['valid_user'])&& $_SESSION['valid_user']==true){
    
    include './Model/myblog_model.php';
    include './Controller/myblog_controller.php';
    include './View/myBlog.php';
    $myblog= new MyBlog();
  }else{
    header("location: index.php");
  }
}

else if(isset($_GET['route']) && $_GET['route']=='logout'){
try{
  if(isset($_SESSION['valid_user']) && $_SESSION['valid_user']==true){
    session_destroy();
  }
 else{
  session_start();
  session_destroy();
 }
  header("Location: index.php?route=login");
  exit();
}
catch(Exception $e){
  echo "Caught exception: " . $e->getMessage();
}
}
else if(isset($_GET['route']) && $_GET['route']=='delete'){
  include './commonFolder/config.php';
 
  if( isset($_SESSION['delete_id']) && $_SESSION['delete_id']!=''){ 
    $conn = new Config();
    $delete_id= $_SESSION['delete_id'];
    $sql= "DELETE from blog where blog_id= $delete_id";
    $result = $conn->query($sql) or die("Query not successful");
    $_SESSION['delete_id']='';
    header("Location: index.php?route=myblog");
  }else{
    header("Location: index.php?route=home");

  }
}

else{
  include './Model/home_model.php';
  include './Controller/home_controller.php';
  include './View/home.php';
  $home=new Home();
}
?>


<!-- </div> -->

<?php
 include './commonFolder/footer.php';

 ?>
