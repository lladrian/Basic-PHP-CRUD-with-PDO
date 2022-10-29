<?php  
	if(isset($_GET['id'])){
		include_once('connect.php');

		$id = $_GET['id'];
		$st_ID = $_POST['st_ID'];
		$st_NAME = $_POST['st_NAME'];
		$st_GENDER = $_POST['st_GENDER'];
		$st_COURSE = $_POST['st_COURSE'];
		$st_DEPARTMENT = $_POST['st_DEPARTMENT'];
		$st_YEAR_L = $_POST['st_YEAR_L'];

		$data = [
			'id' => $id,
			'student_ID' => $st_ID,
			'student_name' => $st_NAME,
			'gender' => $st_GENDER,
			'course' => $st_COURSE,
			'department' => $st_DEPARTMENT,
			'year_level' => $st_YEAR_L,
		];

		$sql = "UPDATE student_info SET student_ID=:student_ID, student_name=:student_name, gender=:gender, course=:course, department=:department, year_level=:year_level WHERE id=:id";
		$stmt= $conn->prepare($sql);
		$stmt->execute($data);

		// echo a message to say the UPDATE succeeded
  		//echo $stmt->rowCount() . " records UPDATED successfully";
  		header('location: index.php');
	} else {
		$_SESSION['error'] = 'Select member to delete first';
	}
?>