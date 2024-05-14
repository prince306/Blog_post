<?php
 
class PostBlog {
    public function __construct() {
     
       
      $PostBlogController= new PostBlogController();
//  var_dump( $PostBlogController->row_data->);die();
        echo '
            <div class="postBlogContainer">
                <h2>Post New Blog</h2>
                <form id="blog_form" action="index.php?route=postblog" method="post" enctype="multipart/form-data">
                    <div class="author">
                        <label for="author">Your Name:</label><br>
                        <input type="text" name="author" id="author" value="' . $_SESSION['username'] . '" required>
                    </div><br><br>
                    <div class="blog_title">
                        <label for="blog_title">Title:</label><br>
                        <input type="text" name="blog_title" id="blog_title" placeholder="Title of your blog" value="' . (isset($_GET['id']) ? $PostBlogController->row_data['blog_title'] : '') . '" required>
                    </div><br><br>
                    <div class="blog_image">
                        <label for="blog_image">Select Image:</label><br>
                        <input type="file" name="blog_image" id="blog_image" >
                        <img id="postblog_image" src="' . (isset($_GET['id']) ? $PostBlogController->row_data['blog_image'] : '') . '" alt="" required>
                        ' . (isset($_GET['id']) ? '<input type="hidden" name="edit_image" value="' . $PostBlogController->row_data['blog_image'] . '">' : '') . '
                        <script>
                            document.getElementById("blog_image").addEventListener("change", function() {
                                const file = this.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.getElementById("postblog_image").setAttribute("src", e.target.result);
                                    }
                                    reader.readAsDataURL(file);
                                } else {
                                    document.getElementById("postblog_image").setAttribute("src", "");
                                }
                            });
                        </script>
                    </div><br><br>
                    <div class="blog_content">
                        <label for="blog_content">Blog Description :</label><br>
                        <textarea name="blog_content" id="blog_content" rows="4" required>' . (isset($_GET['id']) ? $PostBlogController->row_data['blog_content'] : '') . '</textarea>
                    </div><br><br>
                    <div class="category">
                        <label for="category">Blog Category :</label><br>
                        <input id="category" type="text" name="category" value="' . (isset($_GET['id']) ? $PostBlogController->row_data['category'] : '') . '" required>
                    </div>
                    <div class="status">
                        <label for="status">Blog status :</label>
                        <input type="radio" id="status" name="status" checked value="Published" ' . (isset($_GET['id']) && $PostBlogController->row_data['status'] == 'Published' ? 'checked' : '') . '> Published
                        <input type="radio" name="status" value="Unpublished" ' . (isset($_GET['id']) && $PostBlogController->row_data['status'] == 'Unpublished' ? 'checked' : '') . '> Unpublished
                    </div>
                    <div class="blogsubmit">
                        <button id="postButton">Post</button>
                    </div>
                </form>
            </div>';
    }
}
?>
