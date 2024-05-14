        <?php  
            session_start();
        // if(!isset($_SESSION['username'])){
        //     header("Location: index.php");
        // }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="./css/style.css"></link>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </head>
        <body>
            <?php
             $showsignup = true;
             $showlogin = true;
             
            if(isset($_GET['showButtons']) && $_GET['showButtons'] == 'true') {
                $showSignup = true;
                $showLogin = true;
            }?>
            <div class="nav">
                <div class="logo">
                <a class="homeButton"href="index.php?route=home&showButtons=true">  <img src="./Assets/images/news.jpg" alt=""></a>
            <?php 
            
           
            if(isset($_SESSION['valid_user']) && $_SESSION['valid_user'] == true) {
                // User is logged in
                echo "Welcome ".$_SESSION['username'];
                $showsignup = false;
                $showlogin = false;
            }?>
            </div>
            <div class="buttonlist">
                <?php if(!$showsignup && !$showlogin): ?>
                    <div class="myblog">
                        <a class="myblogHeader" href="index.php?route=myblog">MyBlog</a>
                    </div>
                    <div class="postblog">
                        <a class="postblogHeader" href="index.php?route=postblog">Post Blog</a>
                    </div> 
                    <div class="logout">
                        <a class="logoutHeader" href="index.php?route=logout">Logout</a>
                    </div>
                <?php else: ?>
                    <?php if($showsignup && $showlogin){ ?>
                        <div class="signup">
                            <a class="signupHeader" href="index.php?route=signup ">SignUp</a>
                        </div>
                        <div class="login">
                            <a class="loginHeader" href="index.php?route=login">LogIn</a>
                        </div>
                    <?php }
                     else if($showlogin){?>
                        <div class="login">
                            <a class="loginHeader" href="index.php?route=login">LogIn</a>
                        </div>
                    <?php $showsignup=true;
                         $showlogin=false;}
                    else if($showsignup){?>
                        <div class="signup">
                        <a class="signupHeader" href="index.php?route=signup">SignUp</a>
                    </div>
                <?php    $showsignup=false;
                         $showlogin=true; } endif; ?>
        
                </div>
            </div>

