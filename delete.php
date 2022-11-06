<?php
	session_start();
	include_once('connect.php');
	if(isset($_GET['url'])){
		$file_Path = 'uploads/'.$_GET['url'];
		$stmt = $conn->prepare("DELETE FROM student_info WHERE image_url=?");
		$stmt->execute([$_GET['url']]);
		$row = $stmt->rowCount();

		if($row > 0){
		    // check if the file exist
		    if(file_exists($file_Path)) {
		        unlink($file_Path);
		        $_SESSION['success'] = 'Member deleted successfully';
		    }
		} else{
			$_SESSION['error'] = 'Something went wrong in deleting member';
		}
	} else {
		$_SESSION['error'] = 'Select member to delete first';
	}

	header('location: index.php');
?>