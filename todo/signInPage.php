<?php
require('connectdb.php');
require('signInPage-db.php');
?>
<!doctype html>
    <html>
        <head>
            <link rel="stylesheet" href="main.css">
            <meta charset="UTF-8">
            <title>
                Sign In
            </title>
            <body>
                <div class="container">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="row">
                            <h2 style="text-align: center; color: black;">Log In</h2>
                            <div class = "column">
                                &nbsp;
                            </div>
                            <div class = "column" style="text-align: center;">
                                <div style="color: black;">
                                    Username: <input type="text" name="username" id="username" placeholder="Username" required/>
                                </div>
                                <div style = "color: black;">
                                    Password: <input type="password" name="pwd" id="password" placeholder="Password" required/>
                                </div>
                                <input type="submit" id="submit" value="Login" class="btn btn-light"/>
                            </div>
                            <div class = "column">
                                &nbsp;
                            </div>
                        </div>
                    </form>
                    <script>
                    // DOM manipulation, event listener, arrow function
                    document.getElementById("submit").addEventListener("click", () => {
                        var usernameCheck = document.getElementById("username").value;
                        var usernameLength = usernameCheck.length;
                        var passwordCheck = document.getElementById("password").value;
                        var passwordLength = passwordCheck.length;

                        if (usernameLength < 5 && usernameLength != 0) {
                            alert("Username is too short. Must be longer than 5 characters.");
                        }
                        if(passwordLength < 5 && passwordLength != 0){
                            alert("Password is too short. Must be longer than 5 characters");
                        }
                    });
                </script>

                    <?php session_start(); ?>
                    <?php

                        function reject($entry) {
                            echo "<ul style='text-align: center; color: white;'>Incorrect " . $entry . ". Please try again or create an account.</ul>";
                          }
                      
                          if($_SERVER['REQUEST_METHOD'] == "POST" && strlen($_POST['username']) >= 5 && strlen($_POST['pwd']) >= 5) {
                              $user = trim($_POST['username']);
                              $foundUser = getUser_by_username($user);
                              if(!ctype_alnum($user) || !$foundUser) {
                                reject('username');
                              }
                              else {
                                if(isset($_POST['pwd'])) {
                                    $pwd = trim($_POST['pwd']);
                                    
                                    if(!ctype_alnum($pwd)) {
                                    reject('password');
                                    }
                                    
                                    else {
                                    //$hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                                    $foundPass = checkPasswordToUser($user, $pwd);

                                    if($foundPass) {
                                        $_SESSION['user'] = $user;
                                        $_SESSION['pwd'] = $hash_pwd;
                                        header('Location: home.php');
                                    }
                                    else {
                                        reject('password');
                                        
                                        }
                                    }
                                }
                              }
                          }
                    ?>
                </div>
                <div class="container">
                    <div class="row">
                        <div class = "column" >
                            &nbsp;
                        </div>
                        <div class="column">
                            <div class="row">
                                <div class="column" width="11%" style="text-align: center;">
                                    <a href="http://localhost:4200" style="color:black" class="btn">Sign Up</a>
                                </div>
                                <div class = "column" width="11%">
                                    &nbsp;
                                </div>
                                <div class="column" width="11%" style="text-align: center;">
                                    <a href="#" style="color:black" class="btn">Forgot password?</a>
                                </div>
                            <div class="row">
                        </div>

                        <div class = "column" width="25%">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </body>
        </head>