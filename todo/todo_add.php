<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="main.css" />
  
  <title>To Do</title>    
</head>
<body>
  
  <div class="container">
  <br/>
  
  <form action="todo.php" method="post">
   <div class="form-group">
      <label for="taskdesc">Task </label>
      <input type="text" name="taskdesc" class="form-control" name="desc" 
             value="<?php if (!empty($task_to_update)) echo $task_to_update['task_desc'] ?>" />        
   </div>     
   <div class="form-group">
      <label for="duedate">Due date</label>  
      <input type="text" name="duedate" class="form-control" 
             value="<?php if (!empty($task_to_update)) echo $task_to_update['due_date'] ?>" />  
   </div>      
   <div class="form-group">
      <label for="priority">Priority</label>
      <select name="priority" class="form-control" >
         <option value=""></option>
         <option value="normal" 
            <?php if (!empty($task_to_update) && $task_to_update['priority']=='normal')
                  { ?> 
                     selected 
            <?php } ?> >
            Normal</option> 
         <option value="high"
            <?php if (!empty($task_to_update) && $task_to_update['priority']=='high')
                  { ?>
                     selected 
            <?php } ?> >
            High</option>
      </select>
   </div>      
   <input type="hidden" name="task_id" value="<?php if (!empty($task_to_update)) echo $task_to_update['task_id'] ?>" />                
   <input type="submit" value="Add" name="action"  class="btn btn-dark" title="Create 'todo' table" />   
  </form>
    
  </div>
</body>
</html>