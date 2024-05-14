<?php 
// include './Model/home_model.php';

class Home{
   
  public function __construct(){
    $homeController= new HomeController();
    
  //  echo $homeController->result->num_rows; die();
  //  var_dump($homeController->result->fetch_assoc());die();
    echo " <div class='myblogcontainer'>
    <form id='searchForm' action='index.php?route=home' method='post'>
    <input id='searchinput' type='text' name='search' placeholder='search here'>
    <input id='searchButton' type='submit' name='submit' value='Search'>
      </form>";
     
      while ($row_check = $homeController->result->fetch_assoc()) {
        echo "<div class='blog'>
                <div class='imagediv'><img id='". $row_check["blog_id"]."' src='{$row_check["blog_image"]}' alt='image'></div>
                <div class='blogcontent'>
                    <h4>" . $row_check['blog_title'] . "</h4>
                    <p>" . $row_check['blog_content'] . "</p>
                    <br><br>
                    <span><b>" . $row_check['post_time'] . "</b><br><br><b><i style='color:red'>Author-- " . $row_check['author'] . "</i></b></span>
                </div>
            </div>";
      }
    echo "<ul>";
    for ($i = 1; $i <= $homeController->total_pages; $i++) {
        echo "<li><a href='index.php?route=home&id=$i'>$i</a></li>"; 
    }
    echo "</ul>  </div>
    ";

  }


}


?>







