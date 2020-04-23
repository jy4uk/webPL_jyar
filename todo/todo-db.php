<?php 

function addTask($username, $task, $due, $priority)
{
	global $db;
	$query = "INSERT INTO todo (username, task_desc, due_date, priority) VALUES (:username, :task, :due, :priority)";
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$statement->bindValue(':task', $task);
	$statement->bindValue(':due', $due);
	$statement->bindValue(':priority', $priority);
	$statement->execute();     
	$statement->closeCursor();
}

function updateTaskInfo($task, $due, $priority, $id)
{
	global $db;
	$query = "UPDATE todo SET task_desc=:task, due_date=:due, priority=:priority WHERE task_id=:id";
	$statement = $db->prepare($query);
	$statement->bindValue(':task', $task);
	$statement->bindValue(':due', $due);
	$statement->bindValue(':priority', $priority);
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}

function deleteTask($id)
{
	global $db;
	$query = "DELETE FROM todo WHERE task_id=:id";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->execute();
	$statement->closeCursor();
}


function getAllTasks($user)
{
	global $db;
	$query = "SELECT * FROM todo WHERE username=:user";
	$statement = $db->prepare($query);
	$statement->bindValue(':user', $user);
	$statement->execute();
	$results = $statement->fetchAll();
	$statement->closecursor();
	return $results;
}


function getTaskInfo_by_id($id)
{
	global $db;
	$query = "SELECT * FROM todo where task_id = :id";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $id);
	$statement->execute();
	$results = $statement->fetch();
	$statement->closecursor();
	return $results;
}

?>

