<?php

require('connectdb.php');

header('Access-Control-Allow-Origin: http://localhost:4200');
// header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');


// get the size of incoming data
$content_length = (int) $_SERVER['CONTENT_LENGTH'];

// retrieve data from the request
$postdata = file_get_contents("php://input");

// Process data
// (this example simply extracts the data and restructures them back)

// Extract json format to PHP array
$request = json_decode($postdata);

$data = [];
$data[0]['length'] = $content_length;
foreach ($request as $k => $v)
{
  $data[0][$k] = $v;
}

// Send response (in json format) back the front end
// echo json_encode(['content'=>$data]);

// $content = json_encode($data);
// echo $content;

///////////////////
// function reject($entry) {
//     echo "<li style='color: black;'>Username is already taken. Please enter a different one.</li>";
// }

//   if($_SERVER['REQUEST_METHOD'] == "POST" && strlen($_POST['username']) >= 5 && strlen($_POST['pwd']) >= 5) {
$user = $data[0]["username"]; //trim($_POST['username']);
$pwd = $data[0]['pwd']; //trim($_POST['pwd']);
$hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

if(strlen($user) >= 5 && strlen($pwd) >= 5) {
    $newUserCheck = newUserSignUp($user, $hash_pwd);

    if(!ctype_alnum($user) || $newUserCheck == "user found") {//ctype_alnum checks if string is made of only alphanumeric characters (true if yes, false if not)
        // reject('username');
        echo "Username is already taken. Please enter a different one.";
        // echo "Username is already taken";
    }
    else {
        if(isset($_POST['pwd'])) {
            if(!ctype_alnum($pwd)) {
                // reject('password');
                echo "Username is already taken. Please enter a different one.";
                // echo "Username is taken";
            }
            
            else {
                if($newUserCheck == "new user") {
                    $_SESSION['user'] = $user;
                    $_SESSION['pwd'] = $hash_pwd;
                    header('Location: http://localhost/inclass7/project/todo/home.php');
                }
                else {
                    // reject('password');
                    echo "Username is already taken. Please enter a different one.";
                    // echo "Username is already taken2";
                }
            }
        }
    }
}
else {
    echo "Username and password must both be more than 5 characters long.";
}
//   }

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