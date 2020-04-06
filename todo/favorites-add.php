<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="main.css" />
  
  <title>Favorites</title>    
</head>
<body>
  
  <div class="container">
  <br/>
  
  <form action="favorites.php" method="post">
   <div class="form-group">
      <label for="name">Site Name </label>
      <input type="text" name="name" class="form-control" name="name" 
             value="<?php if (!empty($task_to_update)) echo $task_to_update['name'] ?>" />        
   </div>     
   <div class="form-group">
      <label for="link">Link</label>  
      <input type="text" name="link" class="form-control" 
             value="<?php if (!empty($task_to_update)) echo $task_to_update['link'] ?>" />  
   </div>      
   
   <input type="hidden" name="fav_id" value="<?php if (!empty($task_to_update)) echo $task_to_update['fav_id'] ?>" />                
   <input type="submit" value="Add" name="action"  class="btn btn-dark" title="Create 'favorites' table" />   
  </form>
    
  </div>
</body>
</html>