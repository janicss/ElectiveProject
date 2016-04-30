<?php require 'db/connect.php'; 

	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require 'db/connect.php';
	
	if(isset($_SESSION['admin_id'])){
		$adminId = $_SESSION['admin_id'];
		$admin_f= $_SESSION['f_name'];
		$sem = "sem_02";
		$sy="2015-2016";

		$result="SELECT college_id FROM college";
		$query = mysqli_query($conn,$result);	
		$list = "";		
			while ($row = mysqli_fetch_array($query)){ 
			$list = $list."<option>$row[0]</option>";
			}	

		$result="SELECT course_description FROM course";
		$query = mysqli_query($conn,$result);	
		$course = "";		
			while ($row = mysqli_fetch_array($query)){ 
			$course = $course."<option>$row[0]</option>";
			}	





	if (isset($_POST['reg'])) {
		$Fname = $_POST['Firstname'];
		$Lname = $_POST['Lastname'];
		$Mname = $_POST['Middlename'];
		$SId = $_POST['StudentId'];
		$SNo = $_POST['StudentNo'];
		$College = $_POST['list'];
		$Course = $_POST['Course'];
		$Year = $_POST['Year'];	
		$Password = $_POST['password'];

		/**echo $Fname;
		echo $Lname;
		echo $Mname;
		echo $SId;
		echo $SNo;
		echo $College;
		echo $Course;
		echo $Year;
		echo $password;**/



		//converts course_description into course_id
		$sql="SELECT course_id FROM course WHERE course_description='$Course'";
		$query=mysqli_query($conn, $sql);

		if($query){
			while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
				$course_id=$row[0];
				echo $course_id;
			}

		}


        //checks if stud_id already exists
        $sql = "SELECT stud_id from student WHERE stud_id='$SId'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $row = mysqli_fetch_array($query, MYSQLI_NUM);
            $studID = $row[0];

                if($studID == $SId){
                    $note= "Student Id already exists ";
                }else if($studID!=$SId){

                    $sql = "INSERT INTO student(stud_id, stud_no, stud_pwd, stud_fname, stud_mname, stud_lname, college_id, course_id, year_level, sem_id, school_year, user_level_id) VALUES('$SId','$SNo','$Password','$Fname','$Mname','$Lname','$College','$course_id', '$Year','$sem','$sy', 'user_02')";
                         $query = mysqli_query($conn, $sql);
                         if($query){
                              $note= "SUCCESSFULLY Registered";
                             }
                }
        }


		
		}// $_POST register

        if (isset($_POST['reset'])){
            $sql= "UPDATE student SET activate='0'";
            $query = mysqli_query($conn, $sql);

            if($query){
                echo "RESET";

            }

        }

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

           <form role="form" action="register.php" method="POST">
            <input type="submit" name="reset" value="reset" />
           	<h3>Register Account</h3>
		    <div class="form-group col-sm-3 col-sm-offset-3">
		      <div class="input-group input-group-lg center-block">
				  <div class="form-group">
				    <label for="firstname">First Name:</label>
				    <input type="text" name="Firstname" placeholder="First Name" class="form-control" />
				  </div>
				  <div class="form-group">
				  <label for="middlename">Middle Name:</label>
				    <input type="text" name="Middlename" placeholder="Middle Name" class="form-control" />
				  </div>
				  <div class="form-group">
				  <label for="lastname">Last Name:</label>
				    <input type="text" name="Lastname" placeholder="Last Name" class="form-control" />
				  </div>
				  <div class="form-group">
				  <label for="studId">Student ID:</label>
				    <input type="text" name="StudentId" placeholder="StudentId" class="form-control" />
				  </div>
				  <div class="form-group">
				  <label for="studNo">Student No:</label>
				    <input type="text" name="StudentNo" placeholder="StudentNo" class="form-control" />
				  </div>
				  <div class="form-group">
				    <label for="pwd">Password:</label>
				    <input type="password" name="password" class="form-control" id="pwd" />
				  </div>
				  <div class="form-group">
				    <label for="College">Select College:</label>
				    <select id="basic" name="list"><option><?php echo $list;?></option></select>
				  </div>
                  <div class="form-group">
                    <label for="Course">Select Course:</label>
                    <select id="basic"  name="Course"><option><?php echo $course;?></option></select>
                  </div>
                   <div class="form-group">
                    <label for="Course">Select Year:</label>
                    <select id="basic"  name="Year"><option>
                     <option>I</option>
                     <option>II</option>
                     <option>III</option>
                     <option>IV</option>
                     <option>V</option>
                    </select>
                  </div>
                  


				  <div class="button">
				  	<input type="submit" name="reg" class="btn btn-warning" value="Register" />
				  	
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