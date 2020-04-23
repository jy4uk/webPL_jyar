<?php 

function addFavorite($username, $name, $link)
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

	$query = "INSERT INTO favorites (username, name, link) VALUES (:username, :name, :link)";
	
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
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


function getAllTasks($username)
{
	global $db;
	$query = "SELECT * FROM favorites WHERE username=:username";
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$statement->execute();
	$results = $statement->fetchAll();
	$statement->closecursor();
	return $results;
}


function getTaskInfo_by_id($id)
{
	global $db;
	$query = "SELECT * FROM favorites where fav_id = :id";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->execute();
	$results = $statement->fetch();
	$statement->closecursor();
	return $results;
}

?>

