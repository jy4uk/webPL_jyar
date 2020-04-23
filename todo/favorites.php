<?php
require('connectdb.php');
require('favorites-db.php');

$action = "list_favorites";        // default action
?>
<!doctype html>
    <html>
        <head>
            <link rel="stylesheet" href="main.css">
            <meta charset="UTF-8">
            <title>
                Favorites
            </title>
        </head>
        <body>
          <?php session_start(); ?>
          <?php 
            if(isset($_SESSION['user'])) {
          ?>
            <div class = "row">
                <div class="column">
                    <h2>Hi, <?php echo $_SESSION['user'];?>!</h2>
                </div>

                <div class="column">
                    <h1 style="color:black;">
                        <center>
                            Favorites
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



            <div class="container">
                <?php
                    $task_to_update = '';

                    if ($_SERVER['REQUEST_METHOD'] == 'GET')
                    {
                       include('favorites-add.php');
                       echo "<hr/>";
                       $favorites = getAllTasks($_SESSION['user']);
                       include('favorites-view.php');        // default action
                    }
                    else if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                       if (!empty($_POST['action']) && ($_POST['action'] == 'Update'))
                       {
                          $task_to_update = getTaskInfo_by_id($_POST['fav_id']);   
                          include('favorites-update.php');
                          if (!empty($_POST['name']) && !empty($_POST['link']))
                          {
                             updateFavoriteInfo($_POST['name'], $_POST['link'], $_POST['fav_id']);
                             header("Location: favorites.php?action=list_favorites");
                          }
                       }
                       else if (!empty($_POST['action']) && ($_POST['action'] == 'Add'))
                       {
                          if (!empty($_POST['name']) && !empty($_POST['link']))
                          {
                             addFavorite($_SESSION['user'], $_POST['name'], $_POST['link']);
                             header("Location: favorites.php?action=list_tasks");
                          }
                       }
                       else if (!empty($_POST['action']) && ($_POST['action'] == 'Delete'))
                       {
                          if (!empty($_POST['fav_id']) )
                          {
                             deleteTask($_POST['fav_id']);
                             header("Location: favorites.php?action=list_tasks");
                          }
                       }
                    }

                ?>
                <?php
                  }
                  else {
                    header('Location: signInPage.php');
                  }
                ?>
              </div> 
        </body>