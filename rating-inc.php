<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require 'db/connect.php';
	
	if(isset($_SESSION['admin_id'])){

	$sql= "SELECT COUNT(stud_id) FROM student";
		$query=mysqli_query($conn,$sql);

		if($query){
		$row=mysqli_fetch_array($query,MYSQLI_NUM);
		$total_stud=$row[0];
		}

		$sql= "SELECT COUNT(stud_id) FROM answer";
		$query=mysqli_query($conn,$sql);

		if($query){
		$row=mysqli_fetch_array($query,MYSQLI_NUM);
		$total_take=$row[0];
		}

	}else{
		header('location: index.php');
		die();
	}


?>

<!DOCTYPE html>
<head>
	<title></title>
</head>
<body>

<table class="table">
	<tr>
		<td colspan="2"><h3>Name of Professor: <?php echo $prof;?></h3></td>
	</tr>
	<tr>
		<td colspan="2"><h3>Name of College: <?php echo $college_des;?> </h3></td>
	</tr>
	<tr>
		<td><b>College Code: <?php echo $college_id; ?> </b></td>
		<td><b>Course: <?php echo $course_des;?> </b></td>
	</tr>
	<tr>
		<td><b>Semester: <?php echo $sem;?> </b></td>
		<td><b>Year:  <?php echo $SY;?></b>
	</tr>
	<tr>
		<td colspan="2"><h3>Rating Period: <?php echo $RP;?></h3></td>
	</tr>
</table>
	<h3>AVERAGE PER SECTION: </h3>
	<?php
		echo "<table class=\"table table-striped\" >";
			echo "<tr>";
				echo "<th>COLLEGE</th>";
				echo "<th>COURSE</th>";
				echo "<th>YEAR</th>";
				echo "<th>SECTION</th>";
				echo "<th>SUBJECT</th>";
				echo "<th>AVERAGE</th>";
				echo "<th>RATING</th>";
			echo "</tr>";
	
		
		foreach($conn->query("SELECT college_id, course_description, year_level, section_description, subj_code, AVG(answer) FROM answer WHERE prof_id='$prof_id' GROUP BY college_id, course_id, year_level, section_id, subj_code") as $row) {  
		echo "<tr>";  
		echo "<td>" . $c_id = $row['college_id'] . "</td>";  
		echo "<td>" . $c_des= $row['course_description'] . "</td>";  
		echo "<td>" . $yr_lvl= $row['year_level'] . "</td>";  
		echo "<td>" . $s_des= $row['section_description'] . "</td>"; 
		echo "<td>" . $subj_code=$row['subj_code'] . "</td>";  
		echo "<td>" . $ave= $row['AVG(answer)'] . "</td>";  
					if($row['AVG(answer)'] >= 95 &&$row['AVG(answer)'] <= 100){
						$rating= "Outstanding";

					}else if($row['AVG(answer)'] >= 90 &&$row['AVG(answer)'] < 95){
						$rating = "Very Satisfactory";

					}else if($row['AVG(answer)'] >= 85 &&$row['AVG(answer)'] < 90){
						$rating = "Satisfactory";

					}else if($row['AVG(answer)'] >= 80 &&$row['AVG(answer)'] < 85){
						$rating = "Fair";

					}else{
						$rating= "Poor";

					}
		echo "<td>" . $rating . "</td>"; 

		echo "</tr>"; 

		}

		if($sum_prof >= 95 && $sum_prof <= 100){
						$rating_ave= "Outstanding";

					}else if($sum_prof >= 90 &&	$sum_prof < 95){
						$rating_ave = "Very Satisfactory";

					}else if($sum_prof >= 85 && $sum_prof < 90){
						$rating_ave = "Satisfactory";

					}else if($sum_prof >= 80 && $sum_prof < 85){
						$rating_ave = "Fair";

					}else{
						$rating_ave= "Poor";

					}
				$sql="INSERT INTO average(prof_id, prof_name, average, rating, sem_id, school_year, rating_period) VALUES('$prof_id', '$prof', '$sum_prof','$rating_ave','$sem_id', '$SY', '$RP' )";
                $query=mysqli_query($conn, $sql);
                if($query){
                    echo "ok";
					}

				$sql="UPDATE professor SET activate='1' WHERE prof_id='$prof_id'";
				$ok=mysqli_query($conn, $sql);
				if($ok){
					//echo "activated";
				}

		
		?>
	</table>

			<h3>Total Rating of Prof:	<?php echo "<strong>".$sum_prof. " " .$rating_ave."</strong>" ?></h3>

			<form method="POST" role="form" action="per-prof-average.php">
                    <input type="submit" class="btn btn-warning btn-large" name="asdasd" value="Export to PDF" style="margin:50px; float:right">
            </form>
           
	</body>
</html>