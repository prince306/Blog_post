<?php

  class SignupController{
    
    public function __construct(){
    $SignupModel= new SignupModel();


        if($_SERVER['REQUEST_METHOD']=='POST'){
            $conditions= $SignupModel->fn_validation();
            if($conditions=='true'){
                $SignupModel->fn_signup();
            }
           }
    }
  }
