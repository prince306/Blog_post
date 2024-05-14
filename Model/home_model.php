<?php 
 
include './commonFolder/config.php';
        global $limit;
        $limit = 4;
        global $offset;
        global $total_records;

            if (isset($_GET['id'])) {
                $page = $_GET['id'];
            } else {
                $page = 1;
            }
           $offset = ($page - 1) * $limit;
          
           function fn_search($search){
           global $limit;
           global $offset;
           global $total_records;
            $conn = new Config();
            $sql = "SELECT * FROM blog WHERE status = 'Published' AND (blog_title LIKE '%$search%' OR blog_content LIKE '%$search') LIMIT $offset, $limit   ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            } else {
                echo "<h2>No record Found</h2>";
                exit();
            }
        }
        

        function fn_showHomeContent(){
            global $limit;
            global $offset;
            global $total_records;
            $conn = new Config();
            $sql = "SELECT * FROM blog WHERE status = 'Published'  LIMIT $offset, $limit ";
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
                $sql = "SELECT * FROM blog WHERE status = 'Published' AND (blog_title LIKE '%$search%' OR blog_content LIKE '%$search')";
                $result=$conn->query($sql);
            }else{
                $sql = "SELECT * FROM blog WHERE status = 'Published'" ;
                $result=$conn->query($sql);
            }
            $total_pages = ceil($result->num_rows / $limit);
            return $total_pages;

        }

        

        // if (isset($_POST['search']) && !empty($_POST['search'])) {
        //     $sql_check = "SELECT * FROM blog WHERE status = 'Published' AND (blog_title LIKE '%$search_term%' OR blog_content LIKE '%$search_term%') ";
        //     $result_check = mysqli_query($conn, $sql_check);
        //     $total_records = mysqli_num_rows($result_check);
        //    
        // } else {
        //     $sql_check = "SELECT * FROM blog WHERE status = 'Published' ";
        //     $result_check = mysqli_query($conn, $sql_check);
        //     $total_records = mysqli_num_rows($result_check);
        //     $total_pages = ceil($total_records / $limit);
        // }

        // if ($total_records > 0) {
        //     while ($row_check = mysqli_fetch_assoc($result)) {
        //         $output .= "<div class='blog'>
        //                         <img  id='" . $row_check["blog_id"] . "' src='{$row_check["blog_image"]}' alt='image'>
        //                         <div class='blogcontent'>
        //                             <h4>" . $row_check['blog_title'] . "</h4>
        //                             <p>" . $row_check['blog_content'] . "</p>
        //                             <br><br>
        //                             <span><b>" . $row_check['post_time'] . "</b><br><br><b><i style='color:red'>Author-- " . $row_check['author'] . "</i></b></span>
        //                         </div>
        //                     </div>";
        //     }

        //     $output .= "<ul>";

        //     for ($i = 1; $i <= $total_pages; $i++) {
        //         if ($i == $page) {
        //             $classname = 'active';
        //         } else {
        //             $classname = '';
        //         }
        //         $output .= "<li ><a class='$classname'id='  $i'> $i</a></li>";
        //     }
        //     $output .= "</ul>";
        // } else {
        //     $output = "<h2>No record found</h2>";
        // }

        // echo $output;
    

?>
