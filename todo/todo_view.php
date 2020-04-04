<!DOCTYPE html>
<html>
        <head>
            <link rel="stylesheet" href="main.css">
            <meta charset="UTF-8">
            <title>
                To Do
            </title>
        </head>
<body>
  
  <div class="container">
    <table class="table table-striped table-bordered">
      <tr>
        <th>Task Description</th>
        <th>Due Date</th>
        <th>Priority</th>
        <th>(Update?)</th>
        <th>(Delete?)</th>
      </tr>      
      <?php foreach ($tasks as $task): ?>
      <tr>
        <td>
          <?php echo $task['task_desc']; // refer to column name in the table ?> 
        </td>
        <td>
          <?php echo $task['due_date']; ?> 
        </td>        
        <td>
          <?php echo $task['priority']; ?> 
        </td>                
        <td>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="Update" name="action" class="btn btn-primary" />             
            <input type="hidden" name="task_id" value="<?php echo $task['task_id'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />      
            <input type="hidden" name="task_id" value="<?php echo $task['task_id'] ?>" />
          </form>
        </td>                                
      </tr>
      <?php endforeach; ?>
    </table>
    
  </div>
  
  
</body>
</html>