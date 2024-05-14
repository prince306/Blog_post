<?php 
// include './Model/home_model.php';

class MyBlog{
   
  public function __construct(){
    $MyBlogController= new MyBlogController();
    
  
    echo " <div class='myblogcontainer'>
    <form id='searchForm' action='index.php?route=myblog' method='post'>
    <input id='searchinput' type='text' name='search' placeholder='search here'>
    <input id='searchButton' type='submit' name='submit' value='Search'>
      </form>";

      while ($row_check = $MyBlogController->result->fetch_assoc()) {
        echo "<div class='blog'>
                <div class='imagediv'><img id='". $row_check["blog_id"]."' src='{$row_check["blog_image"]}' alt='image'></div>
                <div class='blogcontent'>
                    <h4>" . $row_check['blog_title'] . "</h4>
                    <p>" . $row_check['blog_content'] . "</p>
                    <br>
                    <span><b>" . $row_check['post_time'] . "</b><br><br<b><i style='color:red'>Author-- " . $row_check['author'] . "</i></b></span>
                    <div class='buttondiv'>
                    <a href='index.php?route=postblog&id=  {$row_check['blog_id']}'>Edit</a>
                    <a href='index.php?route=myblog&id=  {$row_check['blog_id']}'>Delete</a>
                    </div>
                </div>
            </div>";
    }
  
    echo "<ul>";
    for ($i = 1; $i <= $MyBlogController->total_pages; $i++) {
        echo "<li><a href='index.php?route=myblog&id=$i'>$i</a></li>"; 
    }
    echo "</ul>
    </div>
    ";

  }


}


?>







