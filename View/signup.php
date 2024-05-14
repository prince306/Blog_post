<?php

class Signup {

    public function __construct() {
        $SignupController= new SignupController();
        echo '
            <div class="signupdiv">
                <form id="myform" action="index.php?route=signup" method="POST">
                    <input type="hidden" name="action" value="signup">

                    <h2>Signup Page</h2>
                    <div class="username">
                        <label for="username">Username:</label>
                        <input type="text" name="username" placeholder="e.g. prince@306" value="' . (isset($_REQUEST['username']) ? $_REQUEST['username'] : '') . '">
                        <span class="error" id="username">' . (isset($_REQUEST["username"]) && $_REQUEST['username'] == '' ? 'Username is required' : '') . '</span>
                    </div>

                    <div class="email">
                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="e.g. prince@gmail.com" value="' . (isset($_REQUEST['email']) ? $_REQUEST['email'] : '') . '">
                        <span class="error" id="email">' . (isset($_REQUEST["email"]) && $_REQUEST['email'] == '' ? 'Email is required' : '') . '</span>
                    </div>

                    <div class="password">
                        <label for="password">Create Password:</label>
                        <input type="password" name="password" placeholder="Enter password" value="' . (isset($_REQUEST['password']) ? $_REQUEST['password'] : '') . '">
                        <span class="error" id="password">' . (isset($_REQUEST["password"]) && $_REQUEST['password'] == '' ? 'Password is required' : '') . '</span>
                    </div>

                    <div class="confirmPassword">
                        <label for="cnf-password">Confirm Password:</label>
                        <input type="password" name="cnf-password" placeholder="Confirm password" value="' . (isset($_REQUEST['cnf-password']) ? $_REQUEST['cnf-password'] : '') . '">
                        <span class="error" id="cnf-password">' . (isset($_REQUEST["cnf-password"]) && $_REQUEST['cnf-password'] == '' ? 'Confirm password is required' : (isset($_REQUEST["cnf-password"]) && $_REQUEST['password'] != $_REQUEST['cnf-password'] ? 'Confirm password does not match' : '')) . '</span>
                    </div>

                    <div class="mobile">
                        <label for="mobile">Enter Phone No</label>
                        <input type="text" name="mobile" placeholder="Enter Phone No" value="' . (isset($_REQUEST['mobile']) ? $_REQUEST['mobile'] : '') . '">
                        <span class="error" id="mobile">' . (isset($_REQUEST["mobile"]) && $_REQUEST['mobile'] == '' ? 'Phone no is required' : '') . '</span>
                    </div>

                    <div class="signupbutton">
                        <button>SignUp</button>
                    </div>
                </form>
            </div>';
    }
}
