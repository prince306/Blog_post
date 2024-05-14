<?php

class Login{
  
  public function __construct(){
    $LoginController= new LoginController();
    echo "
    <div class='logindiv'>
        <form action='index.php?route=login' method='POST'>
            <div class='loginContainer'>
                <h2>Log-In Page</h2>
    
                <div class='username'>
                    <label for='email'>Email:</label>
                    <input type='text' name='email' placeholder='e.g. prince@gmail.com' value='" . (isset($_REQUEST['email']) ? $_REQUEST['email'] : '') . "'>
                    <span class='error' id='email'>" . (isset($_REQUEST['email']) && $_REQUEST['email'] == '' ? 'Email is required' : '') . "</span>
                </div>

                <div class='password'>
                    <label for='password'>Password:</label>
                    <input type='password' name='password' placeholder='enter password' value='" . (isset($_REQUEST['password']) ? $_REQUEST['password'] : '') . "'>
                    <span class='error' id='password'>" . (isset($_REQUEST['password']) && $_REQUEST['password'] == '' ? 'Password is required' : '') . "</span>
                </div>

                <div class='loginbutton'>
                    <button>Login</button>
                </div>
            </div>
        </form>
    </div>
";

  }
}

