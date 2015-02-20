<?php
function get_db_connection() {
	global $mysqli;
	if (!isset($mysqli)) {
		$db_config = get_config('db_config');
		global $mysqli;

		// create a new object
		$mysqli = new mysqli($db_config['host'],$db_config['username'], $db_config['password'],$db_config['database']);
	
		// checks the connection
		if ($mysqli->connect_errno) {
			echo('Connect failed: ' . $mysqli->connect_error);
			exit(); // abort the execution
		}
	}
	return $mysqli;
}

// destroy the connection
function close_db_connection() {
	global $mysqli;
	if (isset($mysqli)) {
		unset($mysqli);
	}
}

// query is used to execute query with resultset
function query($_query) {
	debug($_query);
	$result = get_db_connection()->query($_query); 

	// For successful SELECT, SHOW, DESCRIBE or EXPLAIN returns resultset object.
	// Another kind of queries will return Booleans.

	if (!is_bool($result)) {
		return($result->fetch_all(MYSQLI_ASSOC));
	}
	return ($result);
}
function escape_strings($_parameters) {
	// the connection is used to escape string
	// ensuring the same charset will be applied
	$mysqli = get_db_connection();
	$keys = array_keys($_parameters);
	foreach ($keys as $key) {
		$_parameters[$key]=$mysqli->escape_string ($_parameters[$key]);
	}
        
	return ($_parameters);
}
function get_all_mails($_id) {
	$query = "SELECT m.id, u.username, m.subject  
            FROM mails m, users u
            WHERE u.id= m.from_user_id  AND to_user_id='$_id'";
	return (query($query));
}
function add_new_cloths($_cloths){
    // get all array's keys
	$keys = array_keys($_cloths);
	// implodes is like concates all array values with 'glue' separator
	$columns = implode(', ', $keys);
	$values = implode('\', \'', escape_strings($_cloths));
	$query='INSERT INTO t_pakaian('.$columns.') VALUES(\'' .$values. '\')';
	
	return (query($query));
}
function get_mail($_id){
    $query = "SELECT u.username, m.subject, m.message, m.to_user_id 
    FROM mails m join users u
    WHERE m.from_user_id=u.id AND m.id='$_id'";
    
    return query($query);
}

function login($_username,$_pwd){
    $query="SELECT 1 FROM users WHERE username='$_username' AND password='$_pwd' LIMIT 1";
    
    return query($query);
}

function isExist($id){   
        $query="select 1 from users
                where username like '$id' ";
	
         return query($query);
}
function sendMail($idS, $idR,$subject,$msgs){
    $query="INSERT INTO mails(from_user_id,to_user_id,subject,message) 
        VALUES('$idS','$idR','$subject','$msgs')";
    
    query($query);
}
function selectID($_username){
    $query="SELECT id FROM users WHERE username='$_username'";
    
    return query($query);
}
?>
