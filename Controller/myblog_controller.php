<?php
class MyBlogController {
    public $result;
    public $totalPage;
    public function __construct() {
        if(isset($_GET['id'])){
            $_SESSION['delete_id']=$_GET['id'];
            header("location: index.php?route=delete");
            exit();
        }
        $MyBlogModel=new MyBlogModel();
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = $_POST['search'];
            $this->result = $MyBlogModel->fn_search($search);
        } else {
            $this->result = $MyBlogModel->fn_showMyBlogContent();
           
        }
       $this->total_pages=$MyBlogModel->fn_pagination();
      
    }
}
  
  