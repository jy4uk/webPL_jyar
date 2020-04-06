<!DOCTYPE html>
<html>
        <head>
            <link rel="stylesheet" href="main.css">
            <meta charset="UTF-8">
            <title>
                Favorites
            </title>
        </head>
<body>
  
  <div class="container">
  <h3>Update Task</h3>
  <br/>
  
  <form action="favorites.php" method="post">
   <div class="form-group">
      <label for="name">Site Name </label>
      <input type="text" name="name" class="form-control" name="name" />
   </div>     
   <div class="form-group">
      <label for="link">Link</label>  
      <input type="text" name="link" class="form-control" />
   </div>      

   <input type="submit" value="Update" name="action"  class="btn btn-dark" title="Update favorite" />   
  </form>         
  </div>
</body>
</html>