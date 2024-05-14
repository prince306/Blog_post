<?php
  include './commonFolder/config.php';


  class PostBlogModel{
    function fn_edit($id){
       $_SESSION['edit_id']=$_SESSION['get_id'];
        $conn = new Config();
      $user=$_SESSION['user_id'];
        $sql="SELECT * from blog where blog_id = $id AND user_id=$user";
        $result = $conn->query($sql);
        if($result->num_rows){
            $row_data =$result->fetch_assoc();
        }
        else{
            header("Location: index.php?route=myblog");
        }
        return $row_data;
    }
    
    function fn_validation(){

        if($_REQUEST['author']!='' && $_REQUEST['blog_title']!='' && $_REQUEST['category']!='' && $_REQUEST['blog_content']!='' ){
            
           return "true";
        }else{
            echo "<h3 style='color:red; text-align:center;'>All Fields are mandatory.</h3>";
        }
       
    }
    
    
    function fn_postBlog(){
        $userid=$_SESSION['user_id'];
        $conn = new Config();
        // $blog_id=$_REQUEST['blog_id'];
        $author=$_REQUEST['author'];
        $blog_title=$_REQUEST['blog_title'];
        $blog_content=$_REQUEST['blog_content'];
        $category= $_REQUEST['category'];
        $status = $_POST['status'];
        
        $image_filename=$_FILES['blog_image']['name'];
        $blog_image=$_FILES['blog_image']['tmp_name'];
        $size=$_FILES['blog_image']['size'];
        $image_ext=strtolower(pathinfo($image_filename,PATHINFO_EXTENSION));
        $allow_type= ['jpg','png','jpeg'];
        $destination="Assets/blogImage/".$image_filename;
        // echo $_SESSION['edit_id'];die();
       
    
        $title_check='SELECT * from blog where blog_title="$blog_title"';
        $result_check = $conn->query($title_check);
       if($image_filename==true){
        move_uploaded_file($blog_image,$destination);
       }
    //   echo $_SESSION['edit_id'];die();
       if(isset($_SESSION['edit_id']) && $_SESSION['edit_id']!=''){
            //    echo $_REQUEST['edit_image'];die();
            
            // echo $_SESSION['edit_id'];die();
            //    var_dump($_REQUEST['edit_image']);die();
                   if($image_filename==''){
                    // echo "if part";die();
                        move_uploaded_file($blog_image,$_REQUEST['edit_image']);
                   
                        $sql = "UPDATE blog 
                        SET 
                        author='$author',
                        blog_title='$blog_title',
                        blog_content='$blog_content',
                        blog_image='" . $_REQUEST['edit_image'] . "',
                        category='$category',
                        status='$status'
                        WHERE 
                        blog_id=" . $_SESSION['edit_id'];
                  
                }
                    else{
                        // echo "else part";
                        // var_dump($_REQUEST['edit_image']);die();
                        $sql = "UPDATE blog 
                        SET 
                        author='$author',
                        blog_title='$blog_title',
                        blog_content='$blog_content',
                        blog_image='$destination',
                        category='$category',
                        status='$status'
                    WHERE 
                        blog_id=" . $_SESSION['edit_id'];
                     }
                       
                        $result=$conn->query($sql);
                        
            if($result){
                $_SESSION['edit_id']='';
                // echo  $_SESSION['edit_id']; die();
                header("Location: index.php?route=myblog");
                ob_end_flush();
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
          
            mysqli_close($conn); 
           
           // session_destroy();
    }
        else{
            
            // var_dump($_SESSION['edit_image']);die();
    
                     if((mysqli_num_rows($result_check))>0){       
                        echo "<h2 style='text-align:center; color:red;'>Change your Blog-Title</h2>";
                        
                      }else{
                        
                        $sql = "INSERT INTO blog (author, blog_title, blog_image, blog_content, category, status, user_id) 
                        VALUES ('$author', '$blog_title', '$destination', '$blog_content', '$category', '$status', '$userid')";
                
                      $result=$conn->query($sql); 
                        if($result){
                            header("Location: index.php?route=home");
                            ob_end_flush();
                            exit();
                        }else{
                        echo  " Error:".mysqli_error();
                        }
                     }
        }
    }
    
  }
 