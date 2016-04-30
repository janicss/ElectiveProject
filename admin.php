<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require 'db/connect.php';
	
	if(isset($_SESSION['admin_id'])){
		$adminId = $_SESSION['admin_id'];
		$admin_f= $_SESSION['f_name'];
		$sem = "1st Semester";
		$sy="2015-2016";


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


		if($_POST['logout']){
			header('Location: logout.php');

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
            height:650px;
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

        .total{
            text-transform: uppercase;

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
                    <div class="col-lg-12">
	                    <div class="welcome-wrapper">
	                        <h1>WELCOME Admin, <?php echo $admin_f;?>!</h1>
							<a href="#">Settings</a> | 
							<a href="logout.php">Logout</a>
							<hr />
						</div>
                        <div class="row">
						  <div class="col-md-6">
						    <div class="thumbnail">
						      <img src="img/student.png" alt="percentage of students" height="200" width="200" />
						      <div class="caption">
						        <h2><?php echo $total_stud;?></h2>
								<p> TOTAL NUMBER OF STUDENTS</p>
						      </div>
						    </div>
						  </div>
						  <div class="col-md-6">
						    <div class="thumbnail">
						      <img src="img/takers.png" alt="percentage of students" height="200" width="200" />
						      <div class="caption">
								<h2><?php echo $total_take;?></h2>
								<p class="total">TOTAL NUMBER OF STUDENTS WHO EVALUATED FOR <?php echo $sem; ?></p>
						      </div>
						    </div>
						  </div>
						</div>
                    </div>
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