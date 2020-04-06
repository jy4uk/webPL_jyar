<?php 

// require: if a required file is not found, reqire() produces a fatal error, the rest of the script won't run
// include: if a required file is not found, include() thorws a warning, the rest of the script will run


// Prepared statement (or parameterized statement) happens in 2 phases:
//   1. prepare() sends a template to the server, the server analyzes the syntax
//                and initialize the internal structure.
//   2. bind value (if applicable) and execute
//      bindValue() fills in the template (~fill in the blanks.
//                For example, bindValue(':name', $name);
//                the server will locate the missing part signified by a colon
//                (in this example, :name) in the template
//                and replaces it with the actual value from $name.
//                Thus, be sure to match the name; a mismatch is ignored.
//      execute() actually executes the SQL statement


function addFavorite($name, $link)
{
	global $db;
	
	$url = $link;
	if(substr($link, 0, 7) != "http://" && substr($link, 0, 8) != "https://") {
		$url = "http://" . $link;
	}
	else if(substr($link, 0, 7) != "http://" && substr($link, 0, 8) == "https://") {
		$url = $link;
	}
	else if(substr($link, 0, 7) == "http://" && substr($link, 0, 8) != "https://") {
		$url = $link;
	}

	$query = "INSERT INTO favorites (name, link) VALUES (:name, :link)";
	
	$statement = $db->prepare($query);
	$statement->bindValue(':name', $name);
	$statement->bindValue(':link', $url);
	$statement->execute();     // if the statement is successfully executed, execute() returns true
	// false otherwise
	
	$statement->closeCursor();
}

function updateFavoriteInfo($name, $link, $id)
{
	global $db;

	$url = $link;
	if(substr($link, 0, 7) != "http://" && substr($link, 0, 8) != "https://") {
		$url = "http://" . $link;
	}
	else if(substr($link, 0, 7) != "http://" && substr($link, 0, 8) == "https://") {
		$url = $link;
	}
	else if(substr($link, 0, 7) == "http://" && substr($link, 0, 8) != "https://") {
		$url = $link;
	}

	$query = "UPDATE favorites SET name=:name, link=:link WHERE fav_id=:id";
	$statement = $db->prepare($query);
	$statement->bindValue(':name', $name);
	$statement->bindValue(':link', $url);
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteTask($id)
{
	global $db;
	
	$query = "DELETE FROM favorites WHERE fav_id=:id";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}


function getAllTasks()
{
	global $db;
	$query = "SELECT * FROM favorites";
	$statement = $db->prepare($query);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
	return $results;
}


function getTaskInfo_by_id($id)
{
	global $db;
	
	// echo "in getTaskInfo_by_id " . $id ;
	
	$query = "SELECT * FROM favorites where fav_id = :id";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	// fetch() return a row
	$results = $statement->fetch();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
	return $results;
}

?>

