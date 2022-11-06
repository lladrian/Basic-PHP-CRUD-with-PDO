<<?php 
	include_once('connect.php');
	$id = $_GET['id'];
	$stmt = $conn->query("SELECT * FROM student_info where id = $id");
	$data = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT DATA</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		body {
			width: 100%;
			height: 100vh;
			display: flex; 
			justify-content:center;
			align-items: center;
			background: grey;
		}
		.container-data-2,{
	  		background: rgb(209 200 200 / 20%);
	  		width: 100%;
	  		height: 100vh;
		}
		.container-data-2 > div{
			width: 460px;
	  		padding: 30px;
	  		background: gray;
	  		position: absolute;
			margin-left: auto;
			margin-right: auto;
			left: 0;
			right: 0;
			top: 200px;
			text-align: center;
			z-index: 999;
	  	}
	  	form {
                background: rgb(5 68 104);
                padding: 20px;
            }
            .info-wrapper {
                background: #e3e1e0;
            }
            .info-container {
                padding: 5px;
               
            }
            a {
                text-decoration: none;
            }
            .items {
                width: 100%;
                margin: 5px;
            }
            .items div {
                display:inline-block;
            }
            .items div:nth-child(1) {
                width: 115px;
                text-align: right;
                padding: 2px;
            }
            .items div:nth-child(2) {
                padding: 2;
            }
            .items div:nth-child(2) input {
                padding: 4px;
                width: 220px;
            }
            .btn-group {
                display:flex; 
                justify-content:space-between; 
                align-items:center;
                padding: 5px;
            }
            .btn-group div:nth-child(1) {
                margin-left: 20px;
            }
            .btn-group div:nth-child(2) {
                margin-right: 20px;
            }
            .btn-group div a{
                font-size: 20px;
            }
            .btn-group div a:hover{
                text-decoration: underline;
            }
            .btn-group div input{
                background: rgb(88 162 205);
                border-color: transparent;
                color: black;
                padding: 1px 8px;
                font-size: 20px;
            }
            .btn-group div input{
                cursor: pointer;
             }
            .btn-group div input:hover{
                background: #9db0bf;
                font-weight: 540;
            }
	</style>
</head>
<body>

<div class="container-data-2">
	  				<?php	
	  				echo "
					<div style='width: 460px;'>
					      <div style='background: floralwhite; height:40px; padding:10px;'>Student INFO</div>
					      	<form method='POST' name='frmEdit' action='edit.php' enctype='multipart/form-data'>
					        <div class='info-wrapper' align='center'>
					                    <h2>Update Data</h2>
					        			
					                    <div class='info-container'>
					                          <input type='hidden' name='id' class='form-control' id='id' value='".$data['id']."'>
					                           <div class='items'>
					                                <div>
					                                    <label>Student ID</label>
					                                </div>
					                                <div>
					                                    <input type='text' name='st_ID' value='".$data['student_ID']."'>
					                                </div>     
					                           </div>
					                           <div class='items'>
					                                <div>
					                                    <label>Student Name</label>
					                                </div>
					                                <div>
					                                    <input type='text' name='st_NAME' value='".$data['student_name']."''>
					                                </div>
					                           </div>
					                           <div class='items'>
					                                <div>
					                                    <label for='st_GENDER'>Gender</label>
					                                </div>
					                                <div>
					                                    <input type='text' name='st_GENDER' value='".$data['gender']."'> 
					                                </div>
					                            </div>
					                            <div class='items'>
					                                <div>
					                                    <label>Course</label>
					                                </div>
					                                <div>
					                                    <input type='text' name='st_COURSE' value='".$data['course']."''>
					                                </div>
					                            </div>
					                            <div class='items'>
					                                <div>
					                                    <label>Department</label>
					                                </div>
					                                <div>
					                                    <input type='text' name='st_DEPARTMENT' value='".$data['department']."'>
					                                </div>
					                            </div>
					                            <div class='items'>
					                                <div>
					                                    <label>Year Level</label>
					                                </div>
					                                <div>
					                                    <input type='text' name='st_YEAR_L' value='".$data['year_level']."''>
					                                </div>
					                            </div>
					                            <div class='items'>
					                                <div>
					                                    <label>Profile Picture</label>
					                                </div>
					                                <div>
					                                      <input type='file' name='my_image'>
					                                </div>
					                            </div> 
					                    </div>
  										<div class='btn-group'>
					                        <div>
					                        	<a href='index.php'>BACK</a>
					                        </div>
					                        <div>
					                        	<button type='submit' name='updatebtn' >Update</button> 
					                        </div>    
					                    </div>
					               
					        </div>
					        </form>
					    </div>";
					     ?>
	         		</div>




</body>
</html>