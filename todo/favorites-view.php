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
    <table class="table table-striped table-bordered">
      <tr>
        <th>Favorite Site</th>
        <th>(Update?)</th>
        <th>(Delete?)</th>
      </tr>      
      <?php foreach ($favorites as $favorite): ?>
      <tr>
        <td>
          <a href="<?php echo $favorite['link']; ?> " style='color:blue' target="_blank"><?php echo $favorite['name']; // refer to column name in the table ?> </a>
        </td>                   
        <td>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="Update" name="action" class="btn btn-primary" />             
            <input type="hidden" name="fav_id" value="<?php echo $favorite['fav_id'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />      
            <input type="hidden" name="fav_id" value="<?php echo $favorite['fav_id'] ?>" />
          </form>
        </td>                                
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>
</html>