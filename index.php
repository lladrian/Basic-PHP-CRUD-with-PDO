<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD - Operation</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
		label.add,
		label.truncate,
		.update,
		.delete{
			padding: 5px;
			font-size: 18px;
			color: black;
		}

		label.add:hover,
		label.truncate:hover,
		.update:hover,
		.delete:hover{
			text-decoration: underline;
			color: blue;
			cursor: pointer;
		}
		.container-data-1,
		.container-data-2,
		.container-data-3,
		.container-data-4{
			position: absolute;
			top: 0;
			right: 0;
	 		display: none;
	  		background: rgb(209 200 200 / 20%);
	  		width: 100%;
	  		height: 100vh;
		}
		.container-data-1 > div,
		.container-data-2 > div,
		.container-data-3 > div,
		.container-data-4 > div{
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

		input[type="checkbox"]{
	  		display: none;
		}

		#add:checked ~ .container-data-1,
		#update:checked ~ .container-data-2,
		#delete:checked ~ .container-data-3,
		#truncate:checked ~ .container-data-4{
	 		display: block;
	 		position: absolute;
	 		margin-left: auto;
			margin-right: auto;
			left: 0;
			right: 0;
			text-align: center;
		}
		.container-data-1 .close-btn,
		.container-data-2 .close-btn,
		.container-data-3 .close-btn,
		.container-data-4 .close-btn{
		  position: absolute;
		  right: 20px;
		  top: 15px;
		  font-size: 18px;
		  cursor: pointer;
		  color: red;
		}
		.container-data-1 .close-btn:hover,
		.container-data-2 .close-btn:hover,
		.container-data-3 .close-btn:hover,
		.container-data-4 .close-btn:hover{
		  color: #3498db;
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
           .alert {
            	text-align: center;
            	padding: 15px 0;
            	width: 100%; 
            	background: wheat;
            }
            .alert .close-btn {
            	float: right;
            	margin-right: 20px;
            	font-size: 20px;
            	color: red;
            	padding: 0 2px;
            }
	</style>
</head>
<body >
	<div>
		
	<div class="wrapper" style="width: 80vw; ">
		<div class="container" style=" padding:30px;width: 100%;">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close-btn fas fa-times'></button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}

				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close-btn fas fa-times'></button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
	</div>
			<div class="data-table-container" style="width: 100%; ">
				    <input type="checkbox" id="truncate">
					<input type="checkbox" id="add">
					<input type="checkbox" id="update">
					<input type="checkbox" id="delete">

					<div class="container-data-1">
 						<div>      
							<form method="POST" action="add.php">			       				
								<div>
			            			<div style="background: floralwhite; height:40px; ">Student INFO</div>
			       				</div>
			        			<div class="info-wrapper" align="center">
			                    	<div class="info-container">
				                    	<div>
				                    		 <h2>Insert Data</h2>
				                    	</div>
			                          
			                           <div class="items">
			                                <div>
			                                    <label>Student ID</label>
			                                </div>
			                                <div>
			                                    <input type="text" name="st_ID" placeholder="Student ID">
			                                </div>     
			                           </div>
			                           <div class="items">
			                                <div>
			                                    <label>Student Name</label>
			                                </div>
			                                <div>
			                                    <input type="text" name="st_NAME" placeholder="Student Name">
			                                </div>
			                           </div>
			                           <div class="items">
			                                <div>
			                                    <label for="st_GENDER">Gender</label>
			                                </div>
			                                <div>
			                                    <input type="text" name="st_GENDER" placeholder="Student Gender"> 
			                                </div>
			                            </div>
			                             <div class="items">
			                                <div>
			                                    <label>Course</label>
			                                </div>
			                                <div>
			                                    <input type="text" name="st_COURSE" placeholder="Student Course">
			                                </div>
			                            </div>
			                            <div class="items">
			                                <div>
			                                    <label>Department</label>
			                                </div>
			                                <div>
			                                    <input type="text" name="st_DEPARTMENT" placeholder="Student Department">
			                                </div>
			                            </div>
			                            <div class="items">
			                                <div>
			                                    <label>Year Level</label>
			                                </div>
			                                <div>
			                                    <input type="text" name="st_YEAR_L" placeholder="Student Year Level">
			                                </div>
			                            </div>     
			                    	</div>
			                     	<div class="btn-group">
			                        	<div>
			                            	<label for="add">BACK</label> 
			                        	</div>
			                        	<div>
			                            	<button type="submit" name="btnadd">ADD DATA</button> 
			                        	</div>    
			                    	</div>
		        				</div>
	        				</form>
   						 </div>
	         		</div>

	         		<div class="container-data-4">
						<label for="truncate" class="close-btn fas fa-times" id="close"></label>
						<div>
							<label>Are you sure to erase all data?</label>
						</div>
						<div>
							<a href="truncate.php">CONFIRM</a>
						</div>
	         		</div>


					<div class="action-group-first" style="width: 100%; background: #809199; padding: 10px 0; display: flex; justify-content: space-between;"align="right">
						<label class="truncate" for="truncate" style="margin-left: 15px;">TRUNCATE</label>
					    <label class="add" for="add" style="margin-right: 15px;">Add</label>
					</div>

					<table border="1" align="center" style="width: 100%;">
						<thead>
						 <tr>
						 	 <th>ID</th>
							 <th>Student ID</th>
							 <th>Student Name</th>
							 <th>Gender</th>
							 <th>Course</th>
							 <th>Department</th>
							 <th>Year Level</th>
							 <th>Action</th>
						 </tr>
						</thead>
						<tbody>
						 <?php
						 	include_once('connect.php');
							$stmt = $conn->query("SELECT * FROM student_info");
							while ($data = $stmt->fetch()) {
								echo "<tr>
									 	 <td style='column-width: 30px;' align='center'>".$data['id']."</td>
									 	 <td style='column-width: 150px;''>".$data['student_ID']."</td>
										 <td style='column-width: 150px;''>".$data['student_name']."</td>
										 <td style='column-width: 150px;''>".$data['gender']."</td>
										 <td style='column-width: 250px;''>".$data['course']."</td>
										 <td style='column-width: 150px;''>".$data['department']."</td>
										 <td style='column-width: 150px;''>".$data['year_level']."</td>
										 <td>
											<a class='update' href='edit_modal.php?id=".$data['id']."'>Update</a>
											<a class='delete' href='delete.php?id=".$data['id']."'>Delete</a>
										</td>
									</tr>";
								}
						 ?>
						</tbody>
					 </table>
				</div>
			</div>
	</div>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    //hide alert
    $(document).on('click', '.close-btn', function(){
    	$('.alert').hide();
    })
});
</script>
</body>
</html>