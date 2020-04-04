<!doctype html>
    <html>
        <head>
            <link rel="stylesheet" href="styles/main.css">
            <meta charset="UTF-8">
            <title>
                Sign In
            </title>
            <body>
                <div class="container">
                    <form action="/action_page.php">
                        <div class="row">
                            <h2 style="text-align: center; color: black;">Log In</h2>
                            <div class = "column">
                                &nbsp;
                            </div>
                            <div class = "column" style="text-align: center;">
                                <div style="color: black;">
                                    Username: <input type="text" name="username" placeholder="Username" required>
                                </div>
                                <div style = "color: black;">
                                    Password: <input type="password" name="password" placeholder="Password" required>
                                </div>
                                <input type="submit" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <div class="row">
                        <!-- <div class = "column" >
                            &nbsp;
                        </div> -->
                        <div class="column" width="25%" style="text-align: center;">
                            <a href="signUp.html" style="color:black" class="btn">Sign Up</a>
                        </div>

                        <div class="column"  style="text-align: center;">
                            <a href="#" style="color:black" class="btn">Forgot password?</a>
                        </div>
<!-- 
                        <div class = "column" width="25%">
                            &nbsp;
                        </div> -->
                    </div>
                </div>
            </body>
        </head>