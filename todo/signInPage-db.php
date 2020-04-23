<?php

function getUser_by_username($username)
{
	global $db;
	$query = "SELECT * FROM users where username = :username";
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$statement->execute();
	$results = $statement->fetch();
    $statement->closecursor();
    if($results == NULL) {
        return false;
    }
	return true;
}

function checkPasswordToUser($username, $password)
{
	global $db;
	$query = "SELECT password FROM users where username = :username";
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$statement->execute();
    $results = $statement->fetch();
    $statement->closecursor();
    $hashpwd = $results[0];
    if(password_verify($password, $hashpwd)) {
        return true;
    }
    else{
        return false;
    }
	return false;
}

function newUserSignUp($username, $hashed_pw) {
    global $db;

    $query = "SELECT username FROM users where username = :username";
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$statement->execute();
	$results = $statement->fetch();
    $statement->closecursor();
    
    //if username doesn't already exist/is not already in use
    if($results == '') {
        //insert into table
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
	
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $hashed_pw);
        $statement->execute();
        $statement->closeCursor();

        return "new user";
    }
    return "user found";
}

?>