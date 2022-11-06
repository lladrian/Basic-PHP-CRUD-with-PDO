<?php  
	if(isset($_POST['updatebtn']) && isset($_FILES['my_image'])){
		session_start();
		include_once('connect.php');
		$id = $_POST['id'];
		$st_ID = $_POST['st_ID'];
		$st_NAME = $_POST['st_NAME'];
		$st_GENDER = $_POST['st_GENDER'];
		$st_COURSE = $_POST['st_COURSE'];
		$st_DEPARTMENT = $_POST['st_DEPARTMENT'];
		$st_YEAR_L = $_POST['st_YEAR_L'];

		$img_name = $_FILES['my_image']['name'];
		$img_size = $_FILES['my_image']['size'];
		$tmp_name = $_FILES['my_image']['tmp_name'];
		$error = $_FILES['my_image']['error'];

		if ($error === 0) {
			if ($img_size > 125000) {
				$em = "Sorry, your file is too large.";
			    header("Location: index.php?error=$em");
			} else {
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);
				$allowed_exs = array("jpg", "jpeg", "png"); 

				if (in_array($img_ex_lc, $allowed_exs)) {
					$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
					$img_upload_path = 'uploads/'.$new_img_name;
					move_uploaded_file($tmp_name, $img_upload_path);

						$data = [
							'id' => $id,
							'student_ID' => $st_ID,
							'student_name' => $st_NAME,
							'gender' => $st_GENDER,
							'course' => $st_COURSE,
							'department' => $st_DEPARTMENT,
							'year_level' => $st_YEAR_L,
							'image_url' => $new_img_name,
						];

						$sql = "UPDATE student_info SET student_ID=:student_ID, student_name=:student_name, gender=:gender, course=:course, department=:department, year_level=:year_level, image_url=:image_url WHERE id=:id";
						$stmt= $conn->prepare($sql);
						$stmt->execute($data);
						$row = $stmt->rowCount();

						if($row > 0){
							$_SESSION['success'] = 'Member updated successfully';
						} else{
							$_SESSION['error'] = 'Something went wrong in updating member';
						}
						header('location: index.php');
				} else {
					$em = "unknown error occurred!";
					header("Location: index.php?error=$em");
				}
			}
	} else {

			$_SESSION['error'] = 'Select member to edit first';
	}
}
?>