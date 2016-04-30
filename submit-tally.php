<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require 'db/connect.php';
	
	if(isset($_SESSION['stud_id'])){
		$userId = $_SESSION['stud_id'];
		$fname = $_SESSION['stud_fname'];
	    $lname = $_SESSION['stud_lname'];
	    $college = $_SESSION['college_id'];
	    $course = $_SESSION['course_id'];
	    $year = $_SESSION['year_level'];
	    $sem= "sem_01";
	    $SY = "2015-2016";
	    $RP = "July-November";



		if(@$_POST['logout']){
		header('location: logout.php');
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
    <title>HOME-STUDENT</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
   
    <style>
      body{
         background: url('img/eval.jpg') no-repeat fixed center;

      }
      .navbar{
         background-color: #600000;
         border:none;
         border-radius: 0px;
         color: 

      }
      .navbar h1{
         color: #EEE;
         font-size: 28px;
         margin:10px;
         float: left;
      }
      
      .container{
         opacity: 0.8;
         background-color: #FFF;

      }

      .row{
         text-align: center;
         padding:30px;
      }

      .row hr{
         width: 100%;
      }

      .selectpicker{
         width:300px;
         margin: 0 auto;
      }

      .btn{
         margin: 20px;
         float: right;

      }

      .link-wrapper{
      	margin: 50px;
      	float: right;
      	color: #FFCC22;
      }
      .link-wrapper a{
      	color: #FFCC22;
        font-style: italic;
      }
      .link-wrapper a:hover{
      	color: #444;
      	text-decoration: none;
      }

      .btn{
         margin: 20px;
         float: right;

      }

      .btn a{
         color: #888;
      }

      .btn a:hover{
         text-decoration: none;

      }

    </style>

</head>
<body>
         <nav class="navbar navbar-default no-margin">
            <h1>WELCOME Student, <?php echo $fname." ".$lname; ?>!</h1>
            <button type="button" class="btn btn-warning btn-md"><a href="logout.php">LOG OUT</a></button>
        </nav>
         <div class="container">
            <div class="row">
               <div class="visible-lg-block col-sm-2">
                  <img src="img/slsu.png" alt="logo" title="logo" />
               </div>
               <div class="row col-sm-8">
                   <p class="text-center"><h3>SOUTHERN LUZON STATE UNIVERSITY<br />COLLEGE OF ENGINEERING</h3>
                  <h5>Online Qualitative Contribution Evaluation for Instruction/Teaching <br />Effectiveness of COE Instructors<br />
                   Rating Period: <?php echo $RP;?><br />
                   School Year: <?php echo $SY;?></h5>
                </div>
               <div class="row col-sm-2">
                  <img src="img/cen.png" alt="logo" title="logo" /> 
              </div>   
              <hr />       
           </div>
          	<div class="jumbotron">
          		<h1>SUCCESSFULLY ADDED!</h1>
          	</div>
          	<h2>PROFESSORS EVALUATED: </h2>
		<?php 

		/**
		**this is the table where the student can see his or her evaluated professors
		*/
    $i=0;
		$sql = "SELECT prof_name,subj_code, evaluated FROM stud_prof WHERE stud_id='$userId' AND evaluated='1'";
		$query = mysqli_query($conn, $sql);

			
			echo "<table class=\"table\">";
			echo "<th><center>PROFESOR NAME</center></th>";
      echo "<th><center>SUBJECT</center></th>";
			echo "<th><center>EVALUATED</center></th>";
			while($row = mysqli_fetch_array($query, MYSQLI_NUM)){
			echo "<tr>";
			echo "<td>"."<center>".$row[0]."</center>"."</td>";  
      echo "<td>"."<center>".$subjCode=$row[1]."</center>"."</td>";  
				$eval_d=$row[2];

				if($eval_d=='1'){
					$eval="DONE";	
					echo "<td>"."<center>".$eval."</center>"."</td>";
          $i++;
				}else{
					$eval="";
					echo "<td>"."<center>".$eval."</center>"."</td>";

				}

	        
	        echo "</tr>";
			}//endof while
			echo "</table>";

      $sql="SELECT COUNT(prof_id) FROM stud_prof WHERE stud_id='$userId'";
        $query= mysqli_query($conn, $sql);
         if($query){
          $row = mysqli_fetch_array($query); 
            $sum = $row[0];
            echo $sum. "<br />";
          }
            echo $i;
          
          if($i==$sum){
              $sql="UPDATE student SET activate='1' WHERE stud_id='$userId'";
                $ok=mysqli_query($conn, $sql);
                if($ok){
                    echo "YOU ARE DONE";
                }

          }


			
		?>
			<div class="link-wrapper"><h3><a href="student.php">Click here to evaluate another professor</a></h3></div>
      
      </form>
   </div><!--end of container-->
    <!-- jQuery -->
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sidebar_menu.js"></script>


</body>
</html>