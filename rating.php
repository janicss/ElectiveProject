<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require 'db/connect.php';
	
	if(isset($_SESSION['admin_id'])){
		$adminId = $_SESSION['admin_id'];
		$admin_f= $_SESSION['f_name'];
		$sem = "1st Semester";
		$SY="2015-2016";
		$RP="July - November";

         $sql= "SELECT COUNT(stud_id) FROM student";
        $query=mysqli_query($conn,$sql);

        if($query){
        $row=mysqli_fetch_array($query,MYSQLI_NUM);
        $total_stud=$row[0];
        }

        $sql= "SELECT COUNT(stud_id) FROM student WHERE activate='1'";
        $query=mysqli_query($conn,$sql);

        if($query){
        $row=mysqli_fetch_array($query,MYSQLI_NUM);
        $total_take=$row[0];
        }



		//converts sem to sem_id;
		$sql="SELECT sem_id FROM semester WHERE sem_description='$sem'";
		$query=mysqli_query($conn, $sql);

		if($query){
			while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
				$sem_id=$row[0];
				//echo $sem_id;
			}

		}


		$query = "SELECT prof_name FROM professor WHERE activate='0'"; 
         $result = mysqli_query($conn, $query);
            $option1 = "CHOOSE ONE";
         

         while($row = mysqli_fetch_array($result)){
            $option1 = $option1."<option>$row[0]</option>";

         }


         
         

	if($_POST['sub']){
		

		 $prof = @$_POST['prof']; //to nullify error 
		 $_SESSION['prof'] = $prof; 
		$sql="SELECT prof_id FROM professor WHERE prof_name='$prof'";
						$query=mysqli_query($conn, $sql);

						if($query){
							while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
								$prof_id=$row[0];
							}

						}

		$sql= "SELECT college_id, course_id FROM professor WHERE prof_id='$prof_id' ";
		$query=mysqli_query($conn, $sql);

		if ($query){
			$row=mysqli_fetch_array($query, MYSQLI_NUM);
			$college_id= $row[0];
			$course_id= $row[1];
			//echo $college_id;
			//echo $course_id;


		}

		//converts college_id to college description
		$sql="SELECT college_description FROM college WHERE college_id='$college_id'";
		$query=mysqli_query($conn, $sql);

		if($query){
			while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
				$college_des=$row[0];
				//echo $college_des;
			}

		}

		//converts course_id to course description
		$sql="SELECT course_description FROM course WHERE course_id='$course_id'";
		$query=mysqli_query($conn, $sql);

		if($query){
			while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
				$course_des=$row[0];
				//echo $course_des;
			}

		}

		$sql="SELECT AVG(answer) FROM answer WHERE prof_id='$prof_id'";
		$query= mysqli_query($conn, $sql);

			$row = mysqli_fetch_array($query); 
			$sum_prof = $row[0];

			
			//echo $sum;


	}//POST['sub']

    if(@$_POST['reset']){
            $sql="UPDATE professor SET activate='0'";
                $ok=mysqli_query($conn, $sql);
                if($ok){
                    //echo "activated";
                }

            $sql="DELETE FROM average";
                $ok=mysqli_query($conn, $sql);
                if($ok){
                    //echo "activated";
                }

                $note= "Table Successfully Updated";

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
    <title>RATING</title>
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
            height: 1500px;
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
            height: 1500px;
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
            padding: 10px;
            width: 65%;
            margin: 20px 0px 20px 120px;
            text-align: center;
            
        }
        .button{
            padding: 20px;
            margin-left: 240px;
        }
        .row{
            width: 60%;
            margin: 0px auto;
        }
        .row1{
            width: 75%;
            margin: 0px auto;
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

            <div class="alert alert-warning"><strong>Note:</strong> You can only view the data once per professors.<br />
            <p>Total Number of Students: <?php echo $total_stud?></p>
            <p>Number of Students Who Took the Evaluation: <?php echo $total_take?></p>
            </div>
            <form role="form "method="post" action="rating.php">
                <div class="row1">
                    <input type="submit" name="reset" class="btn btn-link btn-md" value="Reset" style="{float: left;}" />
                </div>
           
            <div class="form-group col-sm-4 col-sm-offset-4">
                <h2>CHOOSE THE PROFESSOR</h2>
                    <select name="prof"><option><?php echo $option1;?></option></select>
                    <input type="submit" class="btn btn-warning" name="sub">
                </form>
             </div>
             
             <div class="row">
                <?php 
                if ($_POST['sub']){
                    
                    if(isset($prof) && $prof != "CHOOSE ONE"){
                    include "rating-inc.php";
                    }
                }


                ?>
                
             </div>
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