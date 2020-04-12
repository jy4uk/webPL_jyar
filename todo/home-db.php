<?php
    function getAllTodo($user)
    {
        global $db;
        $query = "SELECT task_desc, due_date FROM todo WHERE username=:user";
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $user);
        $statement->execute();
        
        // fetchAll() returns an array for all of the rows in the result set
        $results = $statement->fetchAll();
        
        // closes the cursor and frees the connection to the server so other SQL statements may be issued
        $statement->closecursor();
        
        return $results;
    }

    function getAllFavorites($user)
    {
        global $db;
        $query = "SELECT name, link FROM favorites WHERE username=:user";
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $user);
        $statement->execute();
        
        // fetchAll() returns an array for all of the rows in the result set
        $results = $statement->fetchAll();
        
        // closes the cursor and frees the connection to the server so other SQL statements may be issued
        $statement->closecursor();
        
        return $results;
    }
?>