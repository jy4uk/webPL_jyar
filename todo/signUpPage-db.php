<?php

require('connectdb.php');

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
header('Access-Control-Allow-Credentials: true');

// get the size of incoming data
$content_length = (int) $_SERVER['CONTENT_LENGTH'];

// retrieve data from the request
$postdata = file_get_contents("php://input");

$request = json_decode($postdata);

$data = [];
$data[0]['length'] = $content_length;
foreach ($request as $k => $v)
{
  $data[0][$k] = $v;
}

$user = $data[0]["username"]; 
$pwd = $data[0]['pwd']; 
$hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

$response = '';

if(strlen($user) >= 5 && strlen($pwd) >= 5) {
    $newUserCheck = newUserSignUp($user, $hash_pwd);

    if(!ctype_alnum($user) || $newUserCheck == "user found") {
        $response = "Username is already taken. Please enter a different one.";
    }
    else if($newUserCheck == "new user") {
        $_SESSION['user'] = $user;
        $_SESSION['pwd'] = $hash_pwd;
        $response = "Account successfully created. Click here to log in with your new account!";
    }
    else {
        if(isset($_POST['pwd'])) {
            if(!ctype_alnum($pwd)) {
                $response = "Username is already taken. Please enter a different one.";
            }
            else {
                if($newUserCheck === "new user") {
                    $_SESSION['user'] = $user;
                    $_SESSION['pwd'] = $hash_pwd;
                    // header('Location: http://localhost/inclass7/project/todo/home.php');
                    $response = "Account successfully created. Click here to log in with your new account!";
                }
                else {
                    $response = "Username is already taken. Please enter a different one.";
                }
            }
        }
    }
}
else {
    $response = "Username and password must both be more than 5 characters long.";
}

$data[0]["response"] = $response;
echo json_encode($data);

//////////////////////////////////////////////////

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