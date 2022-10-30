<?php
	session_start();
	include_once('connect.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$stmt = $conn->prepare("DELETE FROM student_info WHERE id=?");
		$stmt->execute([$id]);
		$row = $stmt->rowCount();

		if($row > 0){
			$_SESSION['success'] = 'Member deleted successfully';
		} else{
			$_SESSION['error'] = 'Something went wrong in deleting member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to delete first';
	}

	header('location: index.php');
?>