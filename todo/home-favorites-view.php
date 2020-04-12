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
        <div class="container" style="background-color: #fed8b1">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Favorite Link</th>
                </tr>
                <?php foreach ($favorites as $fav): ?>
                    <tr>
                        <td>
                        <a href="<?php echo $fav['link']; ?>" style='color:blue;' target="_blank"><?php echo $fav['name']; ?></a> 
                        </td>
                         
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </body>

</html>