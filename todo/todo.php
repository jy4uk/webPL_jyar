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
                    <!-- &nbsp; -->
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
                    <!--sign in button-->
                    <!-- <button type="button" style="height: 25px; width: 100px;"
                    onclick="window.location.href='signInPage.php';">Sign In</button> -->
                    <input type="submit" value="Sign Out" name="sign-out" class="btn"
                            onclick="window.location.href='signOut.php';"></input>                
                </div>
    </div>
            <ul>
                <li><a class="active" href="home.php">Home</a></li>
                <!-- <li><a href="../classSchedule.html">Classes</a></li> -->
                <li><a href="todo.php">To Do</a></li>
                <li><a href="favorites.php">Favorites</a></li>
            </ul>
            <!-- <button type="button" onclick="window.location.href='todoAdd.html';">Add Tasks</button> -->
            
            
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
 <!-- <div class="container" style="background-color: white; color: black;">
                  <form name="mainform" >
                  
                    <div class="form-group">
                      <label for="taskdesc">Task Description</label>
                      <input type="text" id="taskdesc" class="form-control" name="desc" />
                      <span class="error" id="taskdesc-note"></span>        
                    </div>
                    
                    <div class="form-group">
                      <label for="duedate">Due Date</label>  
                      <input type="text" id="duedate" class="form-control" />  
                      <span class="error" id="duedate-note"></span>
                    </div>
                    
                    <div class="form-group">
                      <label for="priority">Priority</label>
                      <select id="priority" class="form-control" >
                        <option value="Normal" selected="selected">Normal</option> 
                        <option value="High">High</option>
                      </select>
                    </div>     
                              
                    <input type="button" class="btn btn-light" id="add" value="Add Task" onclick="addRow()"/> 
                  </form>
              
                  <br/>
                  <div id="todo">
                    <table id="todoTable" class="table" >
                      <thead>   
                        <tr>
                          <th>Task Description</th>
                          <th>Due Date</th>
                          <th>Priority</th>
                          <th>(Remove)</th>
                        </tr> 
                      </thead>
              
                      <script>
                        function addRow(){
                          var task = document.getElementById("taskdesc").value;
                          var duedate = document.getElementById("duedate").value;
                          var priority = document.getElementById("priority").value;
                          var deleteBut = "<input type:=button value='  X  ' onClick='delRow()'>";
                          var rowdata = [task, duedate, priority, deleteBut];
              
                          var tableRef = document.getElementById("todoTable");
                          var newRow = tableRef.insertRow(tableRef.rows.length);
                          newRow.onmouseover = () => {tableRef.clickedRowIndex = this.rowIndex}
                          var newCell = "";       
                          var i = 0;          
                          while (i < 4){
                            newCell = newRow.insertCell(i);           
                            newCell.innerHTML = rowdata[i];          
                            newCell.onmouseover = this.rowIndex;      
                            i++;
                          }
                          document.getElementById("taskdesc").value = '';
                          document.getElementById("duedate").value = '';
                          document.getElementById("priority").value = '';

                        }
                        
                        
                        function delRow(){
                          document.getElementById("todoTable").deleteRow(document.getElementById("todoTable").clickedRowIndex)
                        }
                      </script>
                      
                    </table> 
                  </div>
                </div>  -->
  <?php
  }
 
  ?>
</body>
</html>