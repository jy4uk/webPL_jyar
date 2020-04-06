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
  <h3>Update Task</h3>
  <br/>
  
  <form action="todo.php" method="post">
   <div class="form-group">
      <label for="taskdesc">Task </label>
      <input type="text" name="taskdesc" class="form-control" name="desc" />
   </div>     
   <div class="form-group">
      <label for="duedate">Due date</label>  
      <input type="text" name="duedate" class="form-control" />
   </div>      
   <div class="form-group">
      <label for="priority">Priority</label>
      <select name="priority" class="form-control" >
         <option value=""></option>
         <option value="normal">
            Normal</option> 
         <option value="high">
            High</option>
      </select>
   </div>

   <input type="submit" value="Update" name="action"  class="btn btn-dark" title="Update task" />   
  </form>         
  </div>
</body>
</html>