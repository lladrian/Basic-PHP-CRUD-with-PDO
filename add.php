<?php
	session_start();
	include_once('connect.php');

	if(isset($_POST['btnadd'])){
		$student_ID = $_POST['st_ID'];
		$student_name = $_POST['st_NAME'];
		$gender = $_POST['st_GENDER'];
		$course = $_POST['st_COURSE'];
		$department = $_POST['st_DEPARTMENT'];
		$year_level = $_POST['st_YEAR_L'];

		$data = [
		    'student_ID' => $student_ID,
		    'student_name' => $student_name,
		    'gender' => $gender,
		    'course' => $course,
		    'department' => $department,
		    'year_level' => $year_level,
		];
		$sql = "INSERT INTO student_info (student_ID, student_name	, gender, course, department, year_level) VALUES (:student_ID, :student_name, :gender, :course, :department, :year_level)";
		$stmt= $conn->prepare($sql);
		$stmt->execute($data);

		if($stmt->rowCount()){
			echo $_SESSION['success'] = 'Member added successfully';
		}
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>