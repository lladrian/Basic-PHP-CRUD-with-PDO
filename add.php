<?php
	session_start();
	include_once('connect.php');

	if(isset($_POST['btnadd']) && isset($_FILES['my_image'])){
		$student_ID = $_POST['st_ID'];
		$student_name = $_POST['st_NAME'];
		$gender = $_POST['st_GENDER'];
		$course = $_POST['st_COURSE'];
		$department = $_POST['st_DEPARTMENT'];
		$year_level = $_POST['st_YEAR_L'];

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

		if ($error === 0) {
			if ($img_size > 125000) {
				$em = "Sorry, your file is too large.";
			    header("Location: index.php?error=$em");
			}else {
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);

				$allowed_exs = array("jpg", "jpeg", "png"); 

				if (in_array($img_ex_lc, $allowed_exs)) {
					$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
					$img_upload_path = 'uploads/'.$new_img_name;
					move_uploaded_file($tmp_name, $img_upload_path);

					$data = [
					    'student_ID' => $student_ID,
					    'student_name' => $student_name,
					    'gender' => $gender,
					    'course' => $course,
					    'department' => $department,
					    'year_level' => $year_level,
					    'image_url' => $new_img_name,
					];
					$sql = "INSERT INTO student_info (student_ID, student_name	, gender, course, department, year_level, image_url) VALUES (:student_ID, :student_name, :gender, :course, :department, :year_level, :image_url)";
					$stmt= $conn->prepare($sql);
					$stmt->execute($data);
					$row = $stmt->rowCount();

					if($row > 0){
						$_SESSION['success'] = 'Member added successfully';
						header("Location: index.php");

					} else{
						$_SESSION['error'] = 'Something went wrong while adding';
					}

				} else {
					$em = "unknown error occurred!";
					header("Location: index.php?error=$em");
				}
			}
	} else {
		$_SESSION['error'] = 'Fill up add form first';
		header("Location: index.php");
	}
}
?>