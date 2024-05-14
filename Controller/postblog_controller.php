<?php 
class PostBlogController{
   public $row_data;
  
    public function __construct(){
       
        $PostBlogModel=new PostBlogModel();
        if(isset($_GET['id']) && $_GET['id']==true){
            
          $_SESSION['get_id']=$_GET['id'];
             $this->row_data=$PostBlogModel->fn_edit($_GET['id']);
        //   var_dump($this->row_data);die();
           }
          
            if($_SERVER['REQUEST_METHOD']=='POST'){
            
             $conditions= $PostBlogModel->fn_validation();
             if($conditions=='true'){
                 
                $PostBlogModel->fn_postBlog();
             }
            }
    }
}
