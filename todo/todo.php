<?php
require('connectdb.php');
require('todo-db.php');

$action = "list_tasks";        // default action
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="main.css">
  <title>To Do</title>    
  <style>
    label { width: 120px; }
    textarea { border:1px solid #ddd; }
  </style>
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
                            To Do List
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

            <script>
                function setFocus(){
                  document.getElementById("taskdesc").focus();
                }
            </script>
                <div class="container" style="background-color: white; color: black;">

        <?php
        $task_to_update = '';

        if ($_SERVER['REQUEST_METHOD'] == 'GET')
        {
           include('todo_add.php');
           echo "<hr/>";
           $tasks = getAllTasks($_SESSION['user']);
           include('todo_view.php');        // default action
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           if (!empty($_POST['action']) && ($_POST['action'] == 'Update'))
           {
              $task_to_update = getTaskInfo_by_id($_POST['task_id']);   
              include('todo_updatetask.php');
              if (!empty($_POST['taskdesc']) && !empty($_POST['duedate']) && !empty($_POST['priority']))
              {
                 updateTaskInfo($_POST['taskdesc'], $_POST['duedate'], $_POST['priority'], $_POST['task_id']);
                 header("Location: todo.php?action=list_tasks");
              }
           }
           else if (!empty($_POST['action']) && ($_POST['action'] == 'Add'))
           {
              if (!empty($_POST['taskdesc']) && !empty($_POST['duedate']) && !empty($_POST['priority']))
              {
                 addTask($_SESSION['user'], $_POST['taskdesc'], $_POST['duedate'], $_POST['priority']);
                 header("Location: todo.php?action=list_tasks");
              }
           }
           else if (!empty($_POST['action']) && ($_POST['action'] == 'Delete'))
           {
              if (!empty($_POST['task_id']) )
              {
                 deleteTask($_POST['task_id']);
                 header("Location: todo.php?action=list_tasks");
              }
           }
        }
        ?>
      
  </div>
  <?php
    }
  ?>
</body>
</html>