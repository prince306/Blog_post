<?php 
 
include './commonFolder/config.php';

 class MyBlogModel{
       private $limit=4;
        private $offset;
        private $total_records;

           public function __construct(){
           
            if (isset($_GET['id'])) {
                $page = $_GET['id'];
            } else {
                $page = 1;
            }
           $this->offset = ($page - 1) * $this->limit;
          
           }
           function fn_search($search){
            $conn = new Config();
           
            $sql = "SELECT * FROM blog WHERE user_id={$_SESSION['user_id']} AND (blog_title LIKE '%$search%' OR blog_content LIKE '%$search%')
            LIMIT $this->offset, $this->limit";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            } else {
                echo "<h2>No record Found</h2>";
                exit();
            }
        }
        
      
        function fn_showMyBlogContent(){
            $conn = new Config();
            // $sql = " SELECT * FROM blog WHERE user_id={$_SESSION['user_id']}";
            $sql = " SELECT * FROM blog WHERE user_id={$_SESSION['user_id'] } LIMIT $this->offset, $this->limit ";
            // var_dump( $conn->query($sql));die();
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                
               return $result;
            } else {
                echo "<h2>No record Found</h2>";
                exit();
            }
        }
        function fn_pagination(){
            $conn = new Config();
            global $limit;
            if(isset($_POST['search'])){
                $search=$_POST['search'];
                $sql = "SELECT * FROM blog WHERE user_id={$_SESSION['user_id']} AND (blog_title LIKE '%$search%' OR blog_content LIKE '%$search%')";
                $result=$conn->query($sql);
            }
            else{
                $sql = "SELECT * FROM blog WHERE user_id={$_SESSION['user_id']}" ;
            $result=$conn->query($sql);

                }
            $total_pages = ceil($result->num_rows / $this->limit);
            return $total_pages;

        }
 }
    

?>
