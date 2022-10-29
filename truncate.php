<?php 
include_once('connect.php');

	//Our SQL statement. This will empty / truncate the table "videos"
	$sql = "TRUNCATE TABLE `student_info`";

	//Prepare the SQL query.
	$statement = $conn->prepare($sql);

	//Execute the statement.
	$statement->execute();
	header('location: index.php');

 ?>