<?php

  class LoginController{
    public function __construct(){
        $LoginModel= new LoginModel();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $check_Condition= $LoginModel->fn_validation();
            if($check_Condition=='true'){
               $LoginModel->fn_login();
            }
           }
        
    }
  }