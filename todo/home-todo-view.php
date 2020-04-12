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
        <div class="container" style="background-color: #e8f4f8">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Task Description</th>
                    <th>Due Date</th>
                </tr>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td>
                        <?php echo $task['task_desc']; // refer to column name in the table ?> 
                        </td>
                        <td>
                        <?php echo $task['due_date']; ?> 
                        </td>        
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </body>

</html>