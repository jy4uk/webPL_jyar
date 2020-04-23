<?php
    function getAllTodo($user)
    {
        global $db;
        $query = "SELECT task_desc, due_date FROM todo WHERE username=:user";
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $user);
        $statement->execute();
        $results = $statement->fetchAll();
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
        $results = $statement->fetchAll();
        $statement->closecursor();
        return $results;
    }
?>