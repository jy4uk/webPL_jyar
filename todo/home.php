<?php
require('connectdb.php');
require('home-db.php');

$action = "list_tasks";        // default action
?>
<!doctype html>
    <html>
        <head>
            <link rel="stylesheet" href="main.css">
            <meta charset="UTF-8">
            <title>
                Home
            </title>
        </head>
        <body>
            <?php session_start(); ?>
            <?php
                if(isset($_SESSION['user'])) {
            ?>
            <div class = "row">
                <div class="column">
                    <!-- &nbsp; -->
                    <h2>Hi, <?php echo $_SESSION['user'];?>!</h2>
                </div>

                <div class="column">
                    <h1 style="color:black;">
                        <center>
                        My Homepage
                        </center>
                    </h1>
                </div>

                <div class="column" align="right">
                    <input type="submit" value="Sign Out" name="sign-out" class="btn"
                            onclick="window.location.href='signOut.php';"></input>
                </div>
            </div>
            <ul>
                <li><a class="active" href="home.php">Home</a></li>
                <li><a href="todo.php">To Do</a></li>
                <li><a href="favorites.php">Favorites</a></li>
            </ul>
            <br/>
            <div class="row">
                <div class="column" style="background-color:blue; width: 50%;">
                    <h2>
                        <center>
                            <a href="todo.php">
                            To Do
                            </a>
                        </center>
                    </h2>
                </div>
                <div class="column" style="background-color:#ff8c00; width: 50%;">
                    <h2>
                        <center>
                            <a href="favorites.php">
                            Favorites
                            </a>
                        </center>
                    </h2>
                </div>
            </div>
            
            <div class="row">
                    <div class="column" style="background-color:#e8f4f8; width: 50%;">
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'GET') {
                                $tasks = getAllTodo($_SESSION['user']);
                                include('home-todo-view.php');
                            }
                        ?>
                    </div>
                    <div class="column" style="background-color:#fed8b1; width: 50%;">
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'GET') {
                                $favorites = getAllFavorites($_SESSION['user']);
                                include('home-favorites-view.php');
                            }
                        ?>
                    </div>
            </div>

            <?php
                }
                else {
                   header('Location: signInPage.php');
                }
            ?>
           

        </body>
    </html>