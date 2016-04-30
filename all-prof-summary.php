<?php
	require ('db/connect.php');
	session_start();

	$profs=$_SESSION['prof'];

	require ("fpdf/fpdf.php");//path of fpdf file from pdf directory 
	$pdf=new FPDF();//Object for FPDF class wherein you can use the object $pdf to create pdfs,images etc.

	//There are available functions on the fpdf library downloaded type localhost/pdf/ on the browser
	//Functions used in creating pdf
	$pdf->AddPage('p','LEGAL');
	$pdf->SetTitle("TEACHER'S EVALUATION RESULT");

	$pdf->Image('img/slsu.png',20,20,30,30);
	$pdf->Image('img/cen.png',165,20,30,30);
	$pdf->Cell(0,15,'',0,1);
	$pdf->SetFont('Times','',12);	
	$pdf->Cell(0,5,'Republic of the Philippines',0,1,'C');
	$pdf->SetFont('Times','B',12);	
	$pdf->Cell(0,5,'SOUTHERN LUZON STATE UNIVERSITY',0,1,'C');
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,5,'College of Engineering',0,1,'C');
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,5,'Lucban, Quezon',0,1,'C');
	$pdf->Ln(15);

	$pdf->SetFont('Times','UB',20);
	$pdf->Cell(0,5,"TEACHER'S  EVALUATION  RESULT",0,1,'C');
	$pdf->Cell(0,10,"SUMMARY",0,1,'C');
	$pdf->Ln(15);
	//$pdf->SetFont('Times','',15);
	//$pdf->Cell(0,5,"| S.Y 20__ - 20__  |  _____ Semester |",0,1,'C');
	
	//$pdf->Cell(10);
	//$pdf->SetFont('Times','',12);
	//$pdf->Cell(0,20,'Date: _______    Time:_______',0,1);
	//TABLE

	$pdf->Cell(10);	
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(60,10,'INSTRUCTOR NAME',1,0,'C');
	$pdf->Cell(60,10,'TOTAL AVERAGE',1,0,'C');
	$pdf->Cell(60,10,'REMARKS',1,1,'C');

	$sql="SELECT * FROM average";
		$query=mysqli_query($conn, $sql);

			while ($row=mysqli_fetch_array($query))
			 {
				$prof=$row[2];
				$ave=$row[3];
				$rating=$row[4];
		
	$pdf->Cell(10);	
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(60,10,$prof,1,0,'C');
	$pdf->Cell(60,10,$ave,1,0,'C');
	$pdf->Cell(60,10,$rating,1,1,'C');

			}
	$pdf->Output();//Outputs pdf file to browser

?>