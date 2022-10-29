<?php
	session_start();
	include_once('connect.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$conn->prepare("DELETE FROM student_info WHERE id=?")->execute([$id]);
	}
	else{
		$_SESSION['error'] = 'Select member to delete first';
	}

	header('location: index.php');
?>