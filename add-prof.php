<?php require 'db/connect.php'; 
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require 'db/connect.php';
	
	if(isset($_SESSION['admin_id'])){
		$adminId = $_SESSION['admin_id'];
		$admin_f= $_SESSION['f_name'];
		$sem = "sem_01";
		$sy="2015-2016";



		$result="SELECT college_id FROM college";
		$query = mysqli_query($conn,$result);	
		$College = "";		
			
			while ($row = mysqli_fetch_array($query)){ 
			$College = $College."<option>$row[0]</option>";
			}	

		$result="SELECT course_description FROM course";
		$query = mysqli_query($conn,$result);	
		$course = "";		
			while ($row = mysqli_fetch_array($query)){ 
			$course = $course."<option>$row[0]</option>";
			}
			

		if (isset($_POST['Add'])) {
			$Pname =  $_POST['Profname'];
			$PId =  $_POST['ProfId'];
			$Dep = $_POST['College'];
			$Course = $_POST['Course'];


			//converts course_description into course_id
		$sql="SELECT course_id FROM course WHERE course_description='$Course'";
		$query=mysqli_query($conn, $sql);

		if($query){
			while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
				$course_id=$row[0];
				//echo $course_id;
			}

		}

		
        //checks if prof_id already exists
    $sql = "SELECT prof_id from professor WHERE prof_id='$PId'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $row = mysqli_fetch_array($query, MYSQLI_NUM);
        $profID = $row[0];

            if($profID == $PId){
                $note= "Professor Id already exists ";
            }else if($profID!=$PId){

                $sql = "INSERT INTO professor(prof_id, prof_name, college_id, course_id, sem_id, school_year) Values('$PId','$Pname','$Dep','$course_id', '$sem', '$sy')";
                $query = mysqli_query($conn,$sql);
                if ($query) {
                    $note= "Succesfully Added";
                }
            }
    }


		}//$_POST['Add']		
		

		}else{
		header('location: index.php');
		die();
	}


?>


<!DOCTYPE html>
<head>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ADMIN PANEL</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    
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
            height: 745px;
            background-color: #FFF;
            opacity: 0.8;
        }
        #page-content-wrapper h3{
            margin-left: 360px;
        }

        .white{
            color: #FFF;
        }
        .navbar-header h1{
            color: #EEE;
            font-size: 24px;
            margin:10px;

        }

        #sidebar-wrapper{
            height: 745px;
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

        .form-group{
            background-color: #444;
            color: #000;
            padding: 5px;
            width: 65%;
            margin: 9.5px 0px 20px 120px;
            
        }
        .button{
            padding: 20px;
            margin-left: 240px;
        }
        .page-content-wrapper{
            margin: 0px;
        }

    </style>

</head>

<body>
        <?php include "navbar.php" ?>
    <div id="wrapper">
        <?php include "sidebar.php" ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <?php if (isset($note)) {echo "<div class=\"alert alert-success\"><strong>Note: </strong>" .$note. "</div>"; }?>

           <form role="form" action="add-prof.php" method="POST">
            <h3>Add Professor</h3>
            <div class="form-group col-sm-3 col-sm-offset-3">
              <div class="input-group input-group-lg center-block">
                  <div class="form-group">
                    <label for="firstname">Professor Name:</label>
                    <input type="text" name="Profname" placeholder="Prof Name" class="form-control" />
                  </div>
                  <div class="form-group">
                  <label for="lastname">Professor ID:</label>
                    <input type="text" name="ProfId" placeholder="Professor Id" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="College">Select College:</label>
                    <select id="basic" name="College"><option><?php echo $College;?></option></select>
                  </div>
                  <div class="form-group">
                    <label for="Course">Select Course:</label>
                    <select id="basic"  name="Course"><option><?php echo $course;?></option></select>
                  </div>


                  <div class="button">
                    <input type="submit" name="Add" class="btn btn-warning" value="Add Professor" />
                    
                </div>
            </div>
          </form>

        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sidebar_menu.js"></script>
    <script src="js/bootstrap-select.js"></script>

</body>
</html>