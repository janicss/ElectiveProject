<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require 'db/connect.php';
	
	if(isset($_SESSION['admin_id'])){
		$adminId = $_SESSION['admin_id'];
		$admin_f= $_SESSION['f_name'];
		$sem = "sem_01";
		$sy="2015-2016";


		$result="SELECT section_description FROM section";
		$query = mysqli_query($conn,$result);	
		$option = "CHOOSE SECTION";		
			
			while ($row = mysqli_fetch_array($query)){ 
			$option = $option."<option>$row[0]</option>";
			}	


	if (isset($_POST['add'])) {
		$stud =  $_POST['student'];
		$sec1 =  $_POST['sec1'];
		$sec2 =  $_POST['sec2'];
		$sec3 = $_POST['sec3'];
		//echo $stud;

				//converts section_description into section_id1
				$sql="SELECT section_id FROM section WHERE section_description='$sec1'";
				$query=mysqli_query($conn, $sql);

				if($query){
					while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
						$sec_id1=$row[0];
					}

				}

				//converts section_description into section_id2
				$sql="SELECT section_id FROM section WHERE section_description='$sec1'";
				$query=mysqli_query($conn, $sql);

				if($query){
					while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
						$sec_id2=$row[0];
					}

				}

				//converts section_description into section_id3
				$sql="SELECT section_id FROM section WHERE section_description='$sec1'";
				$query=mysqli_query($conn, $sql);

				if($query){
					while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
						$sec_id3=$row[0];
					}

				}

			$result = "SELECT stud_id FROM student where stud_id='$stud'";
			$query = mysqli_query($conn,$result);	
			
			if($query){
				$row = mysqli_fetch_array($query, MYSQLI_NUM);
					$compare = $row[0];
					//echo $compare;
				}
		


			if ($compare == $stud) {
				if($sec1 == "CHOOSE SECTION" ){
					$okay1="";

				}else if (isset($sec1) && $sec1 != "CHOOSE SECTION") {	

				$sql = "INSERT INTO student_section (stud_id,section_id,section_description,sem_id,school_year) Values('$stud','$sec_id1','$sec1','$sem','$sy')";
				$query = mysqli_query($conn,$sql);
					if($query){
						$okay1= "Okay";
					}
				}

				//section2
				if($sec2 == "CHOOSE SECTION" ){
					$okay2="";

				}else if (isset($sec2) && $sec2 != "CHOOSE SECTION") {	

				$sql = "INSERT INTO student_section(stud_id,section_id,section_description,sem_id,school_year) Values('$stud','$sec_id2','$sec2','$sem','$sy')";
				$query = mysqli_query($conn,$sql);
					if($query){
						$okay2= "Okay";
					}
				}
				
				if($sec3 == "CHOOSE SECTION" ){
					$okay3="";

				}else if (isset($sec3) && $sec3 != "CHOOSE SECTION") {		

				$sql = "INSERT INTO student_section(stud_id,section_id,section_description,sem_id,school_year) Values('$stud','$sec_id3','$sec3','$sem','$sy')";
				$query = mysqli_query($conn,$sql);
					if($query){
						$okay3= "Okay";
					}
				}

				$note="SUCESSFULLY ADDED";

			}else if($compare != $stud){
				$note= "No Student ID Found";
			}
		
		}

		if($_POST['logout']){
			header('Location: logout.php');

		}
		
	}else{
		header('location: index.php');
		die();
	}


?>






<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
</body>
</html>

<!DOCTYPE html>
<head>
	  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HOME-ADMIN</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
	
    <style>
    	body{
    		background: url('img/adm.jpg') no-repeat fixed center;

    	}
    	.navbar{
    		background-color: #600000;
    		border:none;
    		border-radius: 0px;

    	}

        #page-content-wrapper{
            background-color: #FFF;
            opacity: 0.8;
            height:635px;
        }

        .row{
        	width: 60%;
        	margin: 0 auto;
        }

    	.white{
    		color: #FFF;
    	}
    	.navbar-header h1{
    		color: #EEE;
    		font-size: 24px;
    		margin:10px;

    	}
        
    	.welcome-wrapper{
    		text-align: right;
    		color: #444;

    	}

    	.welcome-wrapper a{
    		font-style: italic;

    	}

    	.welcome-wrapper a:hover{
    		text-decoration: none;

    	}
    	.thumbnail{
    		background-color: #555;
    		border: none;
    		height: 250px;


    	}
    	.thumbnail img{ 
    		float: left;
    		margin: 10px;

    	}

    	.caption{
    		text-align: center;
    	}

    	.caption h2{
    		color: #FFCC22;
    		font-weight: bold;
    		font-size: 100px;
    	}
    	.caption p{
    		color: #000;
    	}
    	.btn{
    		float: right;
    	}

    	.selectpicker{
    		width: 200px;

    	}

    </style>

</head>
<body>
   		<?php include "navbar.php" ?>
    <div id="wrapper">
    	<?php include "sidebar.php" ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <?php if (isset($note)) {echo "<div class=\"alert alert-success\"><strong>Note: </strong>" .$note. "</div>"; }?>
						<form role="form "method="post" action="all-prof-summary.php">
							<h2>Total Rating of All Professors</h2>
							 <input type="submit" class="btn btn-warning btn-large" name="asdasd" value="Export to PDF" style="margin:50px; float:right">
						</form>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sidebar_menu.js"></script>

</body>
</html>