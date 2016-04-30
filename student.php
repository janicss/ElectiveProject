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
      $prof = @$_POST['prof-name'];
	   $_SESSION['prof-name']=$prof;
      $sec= @$_POST['section'];
      $_SESSION['section']=$sec;
      $subj=$_POST['subj'];
      $_SESSION['subj']=$subj;


        

      //section
        $sql = "SELECT section_description FROM student_section WHERE stud_id='$userId'";
         $go = mysqli_query($conn, $sql);
         if(isset($_SESSION['section'])){
            $option2 = $sec;
         }else{
            $option2="CHOOSE ONE";
         }

         if($go){
            while($row = mysqli_fetch_array($go, MYSQLI_NUM)){
               $option2 = $option2."<option>$row[0]</option>";
            }

         }

         //converts section to section_id
         $sql="SELECT section_id FROM section WHERE section_description='$sec'";
                  $query=mysqli_query($conn, $sql);

                  if($query){
                     while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
                        $sec_id=$row[0];

                     }

                  }

         //converts course to course_desc
         $sql="SELECT course_description FROM course WHERE course_id='$course'";
                  $query=mysqli_query($conn, $sql);

                  if($query){
                     while ($row=mysqli_fetch_array($query, MYSQLI_NUM)) {
                        $course_desc=$row[0];
                        //echo $course_desc;

                     }

                  }

       

    



   		//tally
         
         //$prof = $_SESSION['prof_name'];
         //echo $prof_name;

         $query = "SELECT prof_name FROM stud_prof WHERE stud_id='$userId' AND evaluated='0'"; 
         $result = mysqli_query($conn, $query);
         if(isset($_SESSION['prof-name'])){
            $option1 = $prof;
         }else{
            $option1="CHOOSE ONE";
         }

         while($row = mysqli_fetch_array($result)){
            $option1 = $option1."<option>$row[0]</option>";

         }
          
          
           

            if (isset($prof)) {
                  
                       //echo $prof;
                        $sql="SELECT prof_id FROM stud_prof WHERE prof_name= '$prof'";
                        $query= mysqli_query($conn, $sql);

                        if($query){
                           while($row = mysqli_fetch_array($query, MYSQLI_NUM)){
                              $prof_id= $row[0];
                              //echo $prof_id, " ows ";
                           }
                        }
                    }

           //subject
         $sql = "SELECT subj_code FROM stud_prof WHERE stud_id='$userId' ";
         $go = mysqli_query($conn, $sql);
           if(isset($_SESSION['subj'])){
               $option3 = $subj;
            }else{
               $option3="CHOOSE ONE";
            }

         if($go){
            while($row = mysqli_fetch_array($go, MYSQLI_NUM)){
               $option3 = $option3."<option>$row[0]</option>";
            }

         }
         


         
        
   		$q1 = @$_POST['a1'];
   		$q2 = $_POST['a2'];
   		$q3 = $_POST['a3'];
   		$q4 = $_POST['a4'];
   		$q5 = $_POST['a5'];
   		$q6 = $_POST['b1'];
   		$q7 = $_POST['b2'];
   		$q8 = $_POST['b3'];
   		$q9 = $_POST['b4'];
   		$q10 = $_POST['b5'];
   		$q11 = $_POST['c1'];
   		$q12 = $_POST['c2'];
   		$q13 = $_POST['c3'];
   		$q14 = $_POST['c4'];
   		$q15 = $_POST['c5'];
   		$q16 = $_POST['d1'];
   		$q17 = $_POST['d2'];
   		$q18 = $_POST['d3'];
   		$q19 = $_POST['d4'];
   		$q20 = $_POST['d5'];
         $a1="";
         $a2="";
         $a3="";
         $a4="";
         $a5="";
         $b1="";
         $b2="";
         $b3="";
         $b4="";
         $b5=""; 
         $c1="";
         $c2="";
         $c3="";
         $c4="";
         $c5="";
         $d1="";
         $d2="";
         $d3="";
         $d4="";
         $d5="";

        

         if($_POST['submit']){
   			/**Question 1**/
   			if (isset($q1) && $q1 =='1'){
   				$a= 1;
               $_SESSION['a1'] = $q1;
               
   			
   				}elseif(isset($q1) && $q1 =='2'){
   					$a=2;
                  $_SESSION['a1'] = $q1;
   		
   					}elseif(isset($q1) && $q1 =='3'){
   						$a= 3;
                     $_SESSION['a1'] = $q1;

   				}elseif(isset($q1) && $q1 =='4'){
   					$a = 4;
                  $_SESSION['a1'] = $q1;
   				
   			}elseif(isset($q1) && $q1 =='5'){
   				$a= 5;
               $_SESSION['a1'] = $q1;

   			}

   			/**QUESTION 2**/
   			if(isset($q2) && $q2 =='1'){
   				$b=1;
               $_SESSION['a2'] = $q2;

   				}elseif(isset($q2) && $q2 =='2'){
   					$b=2;
                  $_SESSION['a2'] = $q2;

   			
   		
   					}elseif(isset($q2) && $q2 =='3'){
   						$b=3;
                     $_SESSION['a2'] = $q2;
   			

   				}elseif(isset($q2) && $q2 =='4'){
   					$b=4;
                  $_SESSION['a2'] = $q2;
   				
   			}elseif(isset($q2) && $q2 =='5'){
   				$b=5;
               $_SESSION['a2'] = $q2;

   			}


   			/**QUESTION 3**/
   			if(isset($q3) && $q3 =='1'){
   				$c=1;
               $_SESSION['a3'] = $q3;
   					

   				}elseif(isset($q3) && $q3 =='2'){
   					$c=2;
                  $_SESSION['a3'] = $q3;

   			
   		
   					}elseif(isset($q3) && $q3 =='3'){
   						$c=3;
                     $_SESSION['a3'] = $q3;

   			

   				}elseif(isset($q3) && $q3 =='4'){
   					$c=4;
                  $_SESSION['a3'] = $q3;

   				
   			}elseif(isset($q3) && $q3 =='5'){
   				$c=5;
               $_SESSION['a3'] = $q3;

   			}


   			/**QUESTION 4**/
   			if(isset($q4) && $q4 =='1'){
   				$d=1;
               $_SESSION['a4'] = $q4;
   					

   				}elseif(isset($q4) && $q4=='2'){
   					$d=2;
                  $_SESSION['a4'] = $q4;

   			
   		
   					}elseif(isset($q4) && $q4 =='3'){
   						$d=3;
                     $_SESSION['a4'] = $q4;

   			

   				}elseif(isset($q4) && $q4 =='4'){
   					$d=4;
                  $_SESSION['a4'] = $q4;

   				
   			}elseif(isset($q4) && $q4 =='5'){
   				  $d=5;
                 $_SESSION['a4'] = $q4;

   			}


   			/**QUESTION 5**/
   			if(isset($q5) && $q5 =='1'){
   				$e=1;  		
               $_SESSION['a5'] = $q5;			

   				}elseif(isset($q5) && $q5 =='2'){
   					$e=2;	
                  $_SESSION['a5'] = $q5;
   		
   					}elseif(isset($q5) && $q5 =='3'){
   						$e=3;	
                     $_SESSION['a5'] = $q5;

   				}elseif(isset($q5) && $q5 =='4'){
   					$e=4;
                  $_SESSION['a5'] = $q5;
   				
   			}elseif(isset($q5) && $q5 =='5'){
   				$e=5;
               $_SESSION['a5'] = $q5;

   			}

            //Question6
            if(isset($q6) && $q6 =='1'){
               $f=1;
               $_SESSION['a6'] = $q6;
                  

               }elseif(isset($q6) && $q6 =='2'){
                  $f=2;
               $_SESSION['a6'] = $q6;

            
         
                  }elseif(isset($q6) && $q6 =='3'){
                     $f=3;
                  $_SESSION['a6'] = $q6;

            

               }elseif(isset($q6) && $q6 =='4'){
                  $f=4;
                 $_SESSION['a6'] = $q6;

               
            }elseif(isset($q6) && $q6 =='5'){
               $f=5;
               $_SESSION['a6'] = $q6;

            }


            //Question7
            if(isset($q7) && $q7 =='1'){
               $g=1;
               $_SESSION['a7'] = $q7;
                  

               }elseif(isset($q7) && $q7 =='2'){
                  $g=2;
               $_SESSION['a7'] = $q7;

            
         
                  }elseif(isset($q7) && $q7 =='3'){
                     $g=3;
                     $_SESSION['a7'] = $q7;
            

               }elseif(isset($q7) && $q7 =='4'){
                  $g=4;
               $_SESSION['a7'] = $q7;

               
            }elseif(isset($q7) && $q7 =='5'){
               $g=5;
               $_SESSION['a7'] = $q7;

            }


            //Question8
            if(isset($q8) && $q8 =='1'){
               $h=1;
               $_SESSION['a8'] = $q8;
                  

               }elseif(isset($q8) && $q8 =='2'){
                  $h=2;
                  $_SESSION['a8'] = $q8;

            
         
                  }elseif(isset($q8) && $q8 =='3'){
                     $h=3;
                     $_SESSION['a8'] = $q8;

            

               }elseif(isset($q8) && $q8 =='4'){
                  $h=4;
                   $_SESSION['a8'] = $q8;

               
            }elseif(isset($q8) && $q8 =='5'){
               $h=5;
               $_SESSION['a8'] = $q8;

            }

            //Question9
            if(isset($q9) && $q9 =='1'){
               $i=1;
               $_SESSION['a9'] = $q9;
                  

               }elseif(isset($q9) && $q9 =='2'){
                  $i=2;
                  $_SESSION['a9'] = $q9;

            
         
                  }elseif(isset($q9) && $q9 =='3'){
                     $i=3;
                     $_SESSION['a9'] = $q9;

            

               }elseif(isset($q9) && $q9 =='4'){
                  $i=4;
                  $_SESSION['a9'] = $q9;

            
            }elseif(isset($q9) && $q9 =='5'){
               $i=5;
               $_SESSION['a9'] = $q9;

            }

            //Question10
            if(isset($q10) && $q10 =='1'){
               $j=1;
               $_SESSION['a10'] = $q10;
                  

               }elseif(isset($q10) && $q10 =='2'){
                  $j=2;
               $_SESSION['a10'] = $q10;

            
         
                  }elseif(isset($q10) && $q10 =='3'){
                     $j=3;
               $_SESSION['a10'] = $q10;

            

               }elseif(isset($q10) && $q10 =='4'){
                  $j=4;
               $_SESSION['a10'] = $q10;

            
            }elseif(isset($q10) && $q10 =='5'){
               $j=5;
               $_SESSION['a10'] = $q10;

            }

            //Question11
            if(isset($q11) && $q11 =='1'){
               $k=1;
               $_SESSION['a11'] = $q11;
                  

               }elseif(isset($q11) && $q11 =='2'){
                   $k=2;
                   $_SESSION['a11'] = $q11;

            
         
                  }elseif(isset($q11) && $q11 =='3'){
                     $k=3;
                      $_SESSION['a11'] = $q11;
            

               }elseif(isset($q11) && $q11 =='4'){
                  $k=4;
               $_SESSION['a11'] = $q11;

            
            }elseif(isset($q11) && $q11 =='5'){
               $k=5;
               $_SESSION['a11'] = $q11;

            }

            //Question12
            if(isset($q12) && $q12 =='1'){
               $l=1;
               $_SESSION['a12'] = $q12;
                  

               }elseif(isset($q12) && $q12=='2'){
                  $l=2;
               $_SESSION['a12'] = $q12;

            
         
                  }elseif(isset($q12) && $q12 =='3'){
                     $l=3;
               $_SESSION['a12'] = $q12;

            

               }elseif(isset($q12) && $q12 =='4'){
                 $l=4;
               $_SESSION['a12'] = $q12;

            
            }elseif(isset($q12) && $q12 =='5'){
               $l=5;
               $_SESSION['a12'] = $q12;

            }


            //Question13
            if(isset($q13) && $q13 =='1'){
               $m=1;
               $_SESSION['a13'] = $q13;
                  

               }elseif(isset($q13) && $q13 =='2'){
                  $m=2;
               $_SESSION['a13'] = $q13;

            
         
                  }elseif(isset($q13) && $q13 =='3'){
                     $m=3;
               $_SESSION['a13'] = $q13;

            

               }elseif(isset($q13) && $q13 =='4'){
                  $m=4;
               $_SESSION['a13'] = $q13;

            
            }elseif(isset($q13) && $q13 =='5'){
               $m=5;
               $_SESSION['a13'] = $q13;
            }


            //Question14
            if(isset($q14) && $q14 =='1'){
               $n=1;
               $_SESSION['a14'] = $q14;
                  

               }elseif(isset($q14) && $q14 =='2'){
                  $n=2;
               $_SESSION['a14'] = $q14;

            
         
                  }elseif(isset($q14) && $q14 =='3'){
                     $n=3;
               $_SESSION['a14'] = $q14;

            

               }elseif(isset($q14) && $q14 =='4'){
                  $n=4;
               $_SESSION['a14'] = $q14;

            
            }elseif(isset($q14) && $q14 =='5'){
               $n=5;
               $_SESSION['a14'] = $q14;
            }


            //Question15
            if(isset($q15) && $q15 =='1'){
               $o=1;
               $_SESSION['a15'] = $q15;
                  

               }elseif(isset($q15) && $q15 =='2'){
                  $o=2;
               $_SESSION['a15'] = $q15;

            
         
                  }elseif(isset($q15) && $q15 =='3'){
                    $o=3;
                   $_SESSION['a15'] = $q15;

            

               }elseif(isset($q15) && $q15 =='4'){
                  $o=4;
               $_SESSION['a15'] = $q15;

            
            }elseif(isset($q15) && $q15 =='5'){
               $o=5;
               $_SESSION['a15'] = $q15;
            }


            //Question16
            if(isset($q16) && $q16 =='1'){
               $p=1;
               $_SESSION['a16'] = $q16;
                  

               }elseif(isset($q16) && $q16 =='2'){
                  $p=2;
               $_SESSION['a16'] = $q16;

            
         
                  }elseif(isset($q16) && $q16 =='3'){
                     $p=3;
               $_SESSION['a16'] = $q16;

            

               }elseif(isset($q16) && $q16 =='4'){
                  $p=4;
               $_SESSION['a16'] = $q16;

            
            }elseif(isset($q16) && $q16 =='5'){
               $p=5;
               $_SESSION['a16'] = $q16;
            }


            //Question17
            if(isset($q17) && $q17 =='1'){
               $q=1;
               $_SESSION['a17'] = $q17;
                  

               }elseif(isset($q17) && $q17 =='2'){
                  $q=2;
               $_SESSION['a17'] = $q17;

            
         
                  }elseif(isset($q17) && $q17 =='3'){
                     $q=3;
               $_SESSION['a17'] = $q17;

            

               }elseif(isset($q17) && $q17 =='4'){
                  $q=4;
               $_SESSION['a17'] = $q17;

            
            }elseif(isset($q17) && $q17 =='5'){
               $q=5;
               $_SESSION['a17'] = $q17;
            }


            //Question18
            if(isset($q18) && $q18 =='1'){
               $r=1;
               $_SESSION['a18'] = $q18;
                  

               }elseif(isset($q18) && $q18 =='2'){
                  $r=2;
               $_SESSION['a18'] = $q18;

            
         
                  }elseif(isset($q18) && $q18 =='3'){
                     $r=3;
               $_SESSION['a18'] = $q18;

            

               }elseif(isset($q18) && $q18 =='4'){
                  $r=4;
               $_SESSION['a18'] = $q18;

            
            }elseif(isset($q18) && $q18 =='5'){
               $r=5;
               $_SESSION['a18'] = $q18;
            }


            //Question19
            if(isset($q19) && $q19 =='1'){
               $s=1;
               $_SESSION['a19'] = $q19;
                  

               }elseif(isset($q19) && $q19 =='2'){
                  $s=2;
               $_SESSION['a19'] = $q19;

            
         
                  }elseif(isset($q19) && $q19 =='3'){
                     $s=3;
               $_SESSION['a19'] = $q19;

            

               }elseif(isset($q19) && $q19 =='4'){
                  $s=4;
               $_SESSION['a19'] = $q19;

            
            }elseif(isset($q19) && $q19 =='5'){
               $s=5;
               $_SESSION['a19'] = $q19;
         }


            //Question20
            if(isset($q20) && $q20 =='1'){
               $t=1;
               $_SESSION['a20'] = $q20;
                  

               }elseif(isset($q20) && $q20 =='2'){
                  $t=2;
               $_SESSION['a20'] = $q20;

            
         
                  }elseif(isset($q20) && $q20 =='3'){
                     $t=3;
               $_SESSION['a20'] = $q20;

            

               }elseif(isset($q20) && $q20 =='4'){
                  $t=4;
               $_SESSION['a20'] = $q20;

            
            }elseif(isset($q20) && $q20 =='5'){
              $t=5;
               $_SESSION['a20'] = $q20;
            }

         if($prof== "CHOOSE ONE" || $sec == "CHOOSE ONE" || $subj == "CHOOSE ONE"){
               $note= "professor/section/subject is not selected";

         }else if(isset($q1)&& isset($q2) && isset($q3) && isset($q4) && isset($q5) && isset($q6) && isset($q7) && isset($q8) && isset($q9) && isset($q10) && isset($q11) && isset($q12) && isset($q13) && isset($q14) && isset($q15) && isset($q16) && isset($q17) && isset($q18) && isset($q9) && isset($q20) && $prof!= "CHOOSE ONE" && $sec!="CHOOSE ONE" && $subj != "CHOOSE ONE"){

                    

                     $sql= "SELECT stud_id, prof_id from stud_prof where (stud_id='$userId' AND prof_id='$prof_id') OR (stud_id='$userId' AND subj_code='$subj') OR (stud_id='$userId' AND subj_code='$subj')";
                     $query= mysqli_query($conn, $sql);

                     if ($query){
                        $row=mysqli_fetch_array($query, MYSQLI_NUM);
                        $stud_cmp=$row[0];
                        $prof_cmp=$row[1];
                        //echo $stud_cmp, "<br />";
                        //echo $prof_cmp, "<br />";
                        
                     }
                 
                     if($stud_cmp == $userId && $prof_cmp == $prof_id){

                           
                           $sql="SELECT prof_id, stud_id FROM answer";
                           $query=mysqli_query($conn, $sql);

                           if($query){
                              while($row=mysqli_fetch_array($query, MYSQLI_NUM)){
                              $prof_ans=$row[0];
                              $stud_ans=$row[1];
                              echo $prof_ans;
                              echo $stud_ans;
                           }

                           } 
                           if($prof_ans == $prof_id && $stud_ans == $userId){
                              $note= "May data na ang prof";

                           }else{
                              $sum= $a + $b + $c + $d + $e + $f +$g + $h + $i + $j + $k + $l + $m + $n + $o + $p + $q + $r + $s + $t;
                           $tally= "INSERT INTO answer(prof_id, subj_code, stud_id, answer, college_id, course_id, course_description, section_id, section_description, year_level, sem_id, school_year, rating_period) VALUES('$prof_id','$subj', '$userId', '$sum', '$college', '$course', '$course_desc', '$sec_id', '$sec', '$year', '$sem', '$SY', '$RP')";
                          $query = mysqli_query($conn, $tally);

                         if($query){


                              $sql_eval = "UPDATE stud_prof SET evaluated='1' WHERE (subj_code='$subj' AND section_id='$sec_id') AND (stud_id='$userId' AND prof_id='$prof_id')";
                               mysqli_query($conn, $sql_eval);
                               header('location: submit-tally.php');   

                           }
                           
                        
                        }
                        unset($_SESSION['a1']);
                        unset($_SESSION['a2']);
                        unset($_SESSION['a3']);
                        unset($_SESSION['a4']);
                        unset($_SESSION['a5']);
                        unset($_SESSION['a6']);
                        unset($_SESSION['a7']);
                        unset($_SESSION['a8']);
                        unset($_SESSION['a9']);
                        unset($_SESSION['a10']);
                        unset($_SESSION['a11']);
                        unset($_SESSION['a12']);
                        unset($_SESSION['a13']);
                        unset($_SESSION['a14']);
                        unset($_SESSION['a15']);
                        unset($_SESSION['a16']);
                        unset($_SESSION['a17']);
                        unset($_SESSION['a18']);
                        unset($_SESSION['a19']);
                        unset($_SESSION['a20']);
                        unset($_SESSION['prof-name']);
                        unset($_SESSION['sec']);
                        unset($_SESSION['subj']);

                     }
               }//end ng isset
               else{
                   if(isset($_SESSION['a1'])){
                     $a1= $_SESSION['a1'];
                   }
                  if(isset($_SESSION['a2'])){
                     $a2= $_SESSION['a2'];
                   }
                   if(isset($_SESSION['a3'])){
                      $a3= $_SESSION['a3'];
                   }
                  if(isset($_SESSION['a4'])){
                     $a4= $_SESSION['a4'];
                   }
                  if(isset($_SESSION['a5'])){
                     $a5= $_SESSION['a5'];
                   }
                   if(isset($_SESSION['a6'])){
                     $b1= $_SESSION['a6'];
                   }
                   if(isset($_SESSION['a7'])){
                     $b2= $_SESSION['a7'];
                   }
                   if(isset($_SESSION['a8'])){
                     $b3= $_SESSION['a8'];
                   }
                   if(isset($_SESSION['a9'])){
                     $b4= $_SESSION['a9'];
                   }
                   if(isset($_SESSION['a10'])){
                     $b5= $_SESSION['a10'];
                   }
                   if(isset($_SESSION['a11'])){
                     $c1= $_SESSION['a11'];
                   }
                   if(isset($_SESSION['a12'])){
                     $c2= $_SESSION['a12'];
                   }
                   if(isset($_SESSION['a13'])){
                     $c3= $_SESSION['a13'];
                   }
                   if(isset($_SESSION['a14'])){
                     $c4= $_SESSION['a14'];
                   }
                   if(isset($_SESSION['a15'])){
                     $c5= $_SESSION['a15'];
                   }
                   if(isset($_SESSION['a16'])){
                     $d1= $_SESSION['a16'];
                   }
                   if(isset($_SESSION['a17'])){
                     $d2= $_SESSION['a17'];
                   }
                   if(isset($_SESSION['a18'])){
                     $d3= $_SESSION['a18'];
                   }
                   if(isset($_SESSION['a19'])){
                     $d4= $_SESSION['a19'];
                   }
                   if(isset($_SESSION['a20'])){
                     $d5= $_SESSION['a20'];
                   }
                 

                  $note= "you must fill all";

               }



            /*$total="SELECT SUM(answer) AS total FROM average";
            $query = mysqli_query($conn, $total);

            echo $query;*/



   			
		}//end of POST['sub'] if statement

      


	}else{
		header('Location:index.php');
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
    <title>STUDENT<?php echo $userId;?></title>
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
         margin:20px;
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
          <?php if (isset($note)) {echo "<div class=\"alert alert-danger\"><strong>Note: </strong>" .$note. "</div>"; }?>

          
   <form role="form" action="student.php" method="POST">
         <div class="row">
            <div class="row col-sm-12">
               <label for="faculty"><b>Name of Faculty:</b></label><select id="basic" class="selectpicker show-pick form-control" name="prof-name"><option><?php echo $option1;?></option></select>
            </div>
            <div class="row col-sm-6">
               <label for="section">Section</label><select id="basic" class="selectpicker show-pick form-control" name="section"><option><?php echo $option2;?></option></select>
            </div>
            <div class="row col-sm-6">
             <label for="subject">Subject</label><select id="basic" class="selectpicker show-pick form-control" name="subj"><option><?php echo $option3;?></option></select></div>
            </div>
            <div class="row col-sm-12">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <td><b>Scale</b></td>
                     <td><b>Descriptive Rating</b></td>
                     <td><b>Qualitative Description</b></td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td><strong>5</strong></td>
                     <td>Outstanding</td>
                     <td>The performance always exceeds the job requirements and an exceptional role model.</td>
                  </tr>
                  <tr>
                     <td><strong>4</strong></td>
                     <td>Very Satisfactory</td>
                     <td>The performance meets and often exceeds the job requirements.</td>
                  </tr>
                  <tr>
                     <td><strong>3</strong></td>
                     <td>Satisfactory</td>
                     <td>The performance meets job requirements.</td>
                  </tr>
                  <tr>
                     <td><strong>2</strong></td>
                     <td>Fair</td>
                     <td>The performance needs some development to meet job requirements.</td>
                  </tr>
                  <tr>
                     <td><strong>1</strong></td>
                     <td>Poor</td>
                     <td>The faculty fails to meet job requirements.</td>
                  </tr>
               </tbody>
         </table>
         </div><!--end ng row-->

         <div class="alert alert-danger"><strong>Note:</strong> Click the <strong>category</strong> to show the collapsible items.</div>
           <div class="panel-group" id="accordion">
             <div class="panel panel-default">
               <div class="panel-heading">
                 <h4 class="panel-title">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">A. COMMITMENT</a>
                 </h4>
               </div>
               <div id="collapse1" class="panel-collapse collapse in">
                 <div class="panel-body">
                  <table class="table">
               <tr>
               <th>COMMITMENT</th>
               <th>5</th>
               <th>4</th>
               <th>3</th>
               <th>2</th>
               <th>1</th>
            </tr>
            <tr>
               <td><p >1. Demonstrates sensitivity to student's ability to attend and absorb content information.</td>
               <td><input type="radio" name="a1" value="5" <?php if($a1 == '5'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a1" value="4" <?php if($a1 == '4'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a1" value="3" <?php if($a1 == '3'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a1" value="2" <?php if($a1 == '2'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a1" value="1" <?php if($a1 == '1'){echo 'checked="checked"';}?> /></td>
            </tr>
            <tr>
               <td>2.   Integrates sensitively his/her learning objectives with those of the students in a collaborative process.</td>
               <td><input type="radio" name="a2" value="5" <?php if($a2 == '5'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a2" value="4" <?php if($a2 == '4'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a2" value="3" <?php if($a2 == '3'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a2" value="2" <?php if($a2 == '2'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a2" value="1" <?php if($a2 == '1'){echo 'checked="checked"';}?> /></td>
            </tr>
            <tr>
               <td>3.   Makes self available to students beyond official time.</td>
               <td><input type="radio" name="a3" value="5" <?php if($a3 == '5'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a3" value="4" <?php if($a3 == '4'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a3" value="3" <?php if($a3 == '3'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a3" value="2" <?php if($a3 == '2'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a3" value="1" <?php if($a3 == '1'){echo 'checked="checked"';}?> /></td>
            </tr>
            <tr>
               <td>4.   Regularly comes to class on time, well-groomed and well-prepared to complete assigned responsibilities.</td>
               <td><input type="radio" name="a4" value="5" <?php if($a4 == '5'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a4" value="4" <?php if($a4 == '4'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a4" value="3" <?php if($a4 == '3'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a4" value="2" <?php if($a4 == '2'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a4" value="1" <?php if($a4 == '1'){echo 'checked="checked"';}?> /></td>
            </tr>
            <tr>
               <td>5.   Keeps accurate records of student's performance and prompt submission of the same.</td>
               <td><input type="radio" name="a5" value="5" <?php if($a5 == '5'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a5" value="4" <?php if($a5 == '4'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a5" value="3" <?php if($a5 == '3'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a5" value="2" <?php if($a5 == '2'){echo 'checked="checked"';}?> /></td>
               <td><input type="radio" name="a5" value="1" <?php if($a5 == '1'){echo 'checked="checked"';}?> /></td>
            </tr>
            </table>
                 </div>
               </div>
             </div>
             <div class="panel panel-default">
               <div class="panel-heading">
                 <h4 class="panel-title">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">B. KNOWLEDGE OF SUBJECT</a>
                 </h4>
               </div>
               <div id="collapse2" class="panel-collapse collapse">
                 <div class="panel-body">
               <table class="table">
               <tr>
                  <th>KNOWLEDGE OF SUBJECT</th>
                  <th>5</th>
                  <th>4</th>
                  <th>3</th>
                  <th>2</th>
                  <th>1</th>
               </tr>
               <tr>
                  <td>1.   Demonstrates mastery of the subject matter (explain the subject matter without relying solely on the prescribed textbook).</td>
                  <td><input type="radio" name="b1" value="5" <?php if($b1 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b1" value="4" <?php if($b1 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b1" value="3" <?php if($b1 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b1" value="2" <?php if($b1 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b1" value="1" <?php if($b1 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
               <tr>
                  <td>2.   Draws and share information on the state of the art theory and practice in his/her discipline.</td>
                  <td><input type="radio" name="b2" value="5" <?php if($b2 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b2" value="4" <?php if($b2 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b2" value="3" <?php if($b2 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b2" value="2" <?php if($b2 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b2" value="1" <?php if($b2 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
               <tr>
                  <td>3.   Integrates subject to practical circumstances and learning intents/ purposes of students.</td>
                  <td><input type="radio" name="b3" value="5" <?php if($b3 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b3" value="4" <?php if($b3 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b3" value="3" <?php if($b3 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b3" value="2" <?php if($b3 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b3" value="1" <?php if($b3 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>  
               <tr>
                  <td>4.   Explains the relevance of present topics to the previous lessons and relates the subjects matter to relevant current issues and/or daily life activities.</td>
                  <td><input type="radio" name="b4" value="5" <?php if($b4 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b4" value="4" <?php if($b4 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b4" value="3" <?php if($b4 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b4" value="2" <?php if($b4 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b4" value="1" <?php if($b4 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
               <tr>
                  <td>5.   Demonstrates up-to-date knowledge and/or awareness on current trends and issues.</td>
                  <td><input type="radio" name="b5" value="5" <?php if($b5 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b5" value="4" <?php if($b5 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b5" value="3" <?php if($b5 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b5" value="2" <?php if($b5 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="b5" value="1" <?php if($b5 == '1'){echo 'checked="checked"';}?> /></td>
               </tr> 
         </table>
            </div>
               </div>
             </div>
             <div class="panel panel-default">
               <div class="panel-heading">
                 <h4 class="panel-title">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">C. TEACHING FOR INDEPENDENT LEARNING </a>
                 </h4>
               </div>
               <div id="collapse3" class="panel-collapse collapse">
                 <div class="panel-body">
                     <table class="table">
                <tr>
                  <th>TEACHING FOR INDEPENDENT LEARNING </th>
                  <th>5</th>
                  <th>4</th>
                  <th>3</th>
                  <th>2</th>
                  <th>1</th>
               </tr>
               <tr>
                  <td>1.   Create teaching strategies that allow students to practice using concepts they need to understand (interactive discussion).</td>
                  <td><input type="radio" name="c1" value="5" <?php if($c1 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c1" value="4" <?php if($c1 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c1" value="3" <?php if($c1 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c1" value="2" <?php if($c1 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c1" value="1" <?php if($c1 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
               <tr>
                  <td>2.   Enhances student self-esteem and/or gives due recognition to student's performance/potentials.</td>
                  <td><input type="radio" name="c2" value="5" <?php if($c2 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c2" value="4" <?php if($c2 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c2" value="3" <?php if($c2 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c2" value="2" <?php if($c2 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c2" value="1" <?php if($c2 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
               <tr>
                  <td>3.   Allows students to create their own course with objectives and realistically defined student-professor rules and make them accountable for their performance.</td>
                  <td><input type="radio" name="c3" value="5" <?php if($c3 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c3" value="4" <?php if($c3 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c3" value="3" <?php if($c3 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c3" value="2" <?php if($c3 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c3" value="1" <?php if($c3 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>  
               <tr>
                  <td>4.   Allows students to think independently and make their own decisions and holding them accountable for their performance based largely on their success in executing decisions.</td>
                  <td><input type="radio" name="c4" value="5" <?php if($c4 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c4" value="4" <?php if($c4 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c4" value="3" <?php if($c4 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c4" value="2" <?php if($c4 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c4" value="1" <?php if($c4 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
               <tr>
                  <td>5.   Encourage students to learn beyond what is required and help/guide the students how to apply the concepts learned.</td>
                  <td><input type="radio" name="c5" value="5" <?php if($c5 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c5" value="4" <?php if($c5 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c5" value="3" <?php if($c5 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c5" value="2" <?php if($c5 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="c5" value="1" <?php if($c5 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
           </table>
                 </div>
               </div>
             </div>
             <div class="panel panel-default">
               <div class="panel-heading">
                 <h4 class="panel-title">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">D. MANAGEMENT OF LEARNING</a>
                 </h4>
               </div>
               <div id="collapse4" class="panel-collapse collapse">
                 <div class="panel-body">
                      <table class="table">
               <tr>
                  <th>MANAGEMENT OF LEARNING</th>
                  <th>5</th>
                  <th>4</th>
                  <th>3</th>
                  <th>2</th>
                  <th>1</th>
               </tr>
               <tr>
                  <td>1.   Create opportunities for intensive and/or extensive contribution of students in the class activities (e.g. breaks class into dyads, triads, or buzz/task groups).</td>
                  <td><input type="radio" name="d1" value="5" <?php if($d1 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d1" value="4" <?php if($d1 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d1" value="3" <?php if($d1 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d1" value="2" <?php if($d1 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d1" value="1" <?php if($d1 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
               <tr>
                  <td>2.   Assumes roles as facilitator, resource person, coach, inquisitor, integrator, referee in drawing students to contribute to knowledge and understanding of the concepts t hand.</td>
                  <td><input type="radio" name="d2" value="5" <?php if($d2 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d2" value="4" <?php if($d2 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d2" value="3" <?php if($d2 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d2" value="2" <?php if($d2 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d2" value="1" <?php if($d2 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
               <tr>
                  <td>3.   Design and implements learning conditions and experience that promotes healthy exchange and/or confrontations.</td>
                  <td><input type="radio" name="d3" value="5" <?php if($d3 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d3" value="4" <?php if($d3 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d3" value="3" <?php if($d3 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d3" value="2" <?php if($d3 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d3" value="1" <?php if($d3 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>  
               <tr>
                  <td>4.   Structures/re-structures learning and teaching-learning context to enhance attainment of collective learning objectives.</td>
                  <td><input type="radio" name="d4" value="5" <?php if($d4 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d4" value="4" <?php if($d4 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d4" value="3" <?php if($d4 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d4" value="2" <?php if($d4 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d4" value="1" <?php if($d4 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
               <tr>
                  <td>5.   Use of instructional materials (audio/video materials, fieldtrips, film showing, computer-aided instruction and etc. ) to reinforce learning processes.</td>
                  <td><input type="radio" name="d5" value="5" <?php if($d5 == '5'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d5" value="4" <?php if($d5 == '4'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d5" value="3" <?php if($d5 == '3'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d5" value="2" <?php if($d5 == '2'){echo 'checked="checked"';}?> /></td>
                  <td><input type="radio" name="d5" value="1" <?php if($d5 == '1'){echo 'checked="checked"';}?> /></td>
               </tr>
            </table>
                 </div>
               </div>
             </div>
           </div>

         
      
      <div class="button">
               <input type="submit" name="submit" class="btn btn-danger btn-lg"  value="Submit" />
            </div>
      </form>
   </div><!--end of container-->
    <!-- jQuery -->
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sidebar_menu.js"></script>


</body>
</html>




