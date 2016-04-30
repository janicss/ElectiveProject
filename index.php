<?php
	
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include_once ("db/connect.php");

	
 
if(@$_POST['stud']){
	$username = @$_POST['username'];
	$password = @$_POST['password'];


	$sql = "SELECT stud_id, stud_pwd, stud_fname, stud_lname, college_id, course_id, year_level from student WHERE stud_id='$username' AND activate='0' LIMIT 1";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $row = mysqli_fetch_array($query, MYSQLI_NUM);
        $user = $row[0];
        $pwd =  $row[1];
        $fname = $row[2];
        $lname = $row[3];
        $college = $row[4];
        $course = $row[5];
        $year = $row[6];
        /*echo $user;
        echo $pwd;
        echo $fname;
        echo $lname;
        echo $college;
        echo $course;
        echo $year;*/
    }
    $sql = "SELECT activate from student WHERE stud_id='$username'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $row = mysqli_fetch_array($query, MYSQLI_NUM);
        $active = $row[0];

            if($active == '1'){
                $note= "You already took the Evaluation for this semester";
            }
    }

	if($username == $user && $password == $pwd){
		$_SESSION['stud_id'] = $user;
		$_SESSION['stud_fname'] = $fname;
		$_SESSION['stud_lname'] = $lname;
		$_SESSION['college_id'] = $college;
		$_SESSION['course_id'] = $course;
		$_SESSION['year_level'] = $year;

		/**$sql= "UPDATE student SET activate='1' WHERE stud_id='$user'";
		$query=mysqli_query($conn, $sql);**/
		
		header('Location: student.php');

	}
}elseif(@$_POST['adm']){
	$username = @$_POST['username'];
	$password = @$_POST['password'];


	$sql = "SELECT admin_id, admin_pwd, admin_fname from admin WHERE admin_id='$username' LIMIT 1";
	$query = mysqli_query($conn, $sql);

	if ($query) {
		$row = mysqli_fetch_array($query, MYSQLI_NUM);
		$user = $row[0];
		$pwd =  $row[1];
		$name = $row[2];
	}

	if($username == $user && $password == $pwd){
		$_SESSION['admin_id'] = $user;
		$_SESSION['f_name'] = $name;
		header('Location: admin.php');

	}




}



	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
 
	<!-- If IE use the latest rendering engine -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 
	<!-- Set the page to the width of the device and set the zoon level -->
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<title>LOG-IN</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<style>

	body{
		background-image: url('img/back.jpg');
		background-size: 100% 1000px;
	}

	.jumbotron{
		background-color: #600000;
		color:#EEE;
	}

	.input-group{
		background-color: black;
		padding: 15px;
		border-radius: 10px;
		opacity: 0.8;
		width: 400px;

	}

	.button{
		width: 60%;
		height: 60px;
		margin: 0 auto;
		padding: 10px 0 0 30px;
	}

	.button input{
		margin: 3px;
		height: 30px;
		width: 80px;
		text-align: center;
	}

	.input-group {
		color: #FFF;

	}
	.checkbox{
		margin-top: 50px;
	}


	</style>

</head>
<body class="body">
		<div class="jumbotron">
			<h1>CEn Online Instructors' Evaluation</h1>
		</div>
	<div class="container">
		  <form role="form" action="index.php" method="POST">
		    <div class="form-group col-sm-3.5 col-sm-offset-3.5">
		    	<?php if (isset($note)) {echo "<div class=\"alert alert-danger\"><strong>Note: </strong>" .$note. "</div>"; }?>

		      <div class="input-group input-group-lg center-block">
				  <div class="form-group">
				    <label for="email">Student/Admin ID:</label>
				    <input type="name" name="username" class="form-control" id="email"/>
				  </div>
				  <div class="form-group">
				    <label for="pwd">Password:</label>
				    <input type="password" name="password" class="form-control" id="pwd"/>
				  </div>
				  <div class="checkbox">
				    <label><input type="checkbox"> Remember me</label>
				  </div>
				  <div class="button">
				  	<input type="submit" name="stud" class="btn btn-default" value="Student" />
				  	<input type="submit" name="adm" class="btn btn-default" value="Admin" />
				</div>
		    </div>
		  </form>		
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- Use downloaded version of Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>









