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


function addTask($task, $due, $priority)
{
	global $db;
	
	// example SQL statement to insert data
	// 	   INSERT INTO todo (task_desc, due_date, priority) VALUES ('submit in-class9', '2020-03-31', 'high');
	// since we skip task_id and let DBMS auto gen a running number,
	// we need to specify the columns to insert values
	
	$query = "INSERT INTO todo (task_desc, due_date, priority) VALUES (:task, :due, :priority)";
	
	$statement = $db->prepare($query);
	$statement->bindValue(':task', $task);
	$statement->bindValue(':due', $due);
	$statement->bindValue(':priority', $priority);
	$statement->execute();     // if the statement is successfully executed, execute() returns true
	// false otherwise
	
	$statement->closeCursor();
}

function updateTaskInfo($task, $due, $priority, $id)
{
	global $db;
	
	// example SQL statement to update data 
    //     UPDATE todo SET task_desc = 'new task', due_date = '2020-04-13', priority = 'normal' WHERE task_id = 2;
	// assume task_id is a primary identifying a row of data in the table
	
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


function getAllTasks()
{
	global $db;
	$query = "SELECT * FROM todo";
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
	
	$query = "SELECT * FROM todo where task_id = :id";
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

