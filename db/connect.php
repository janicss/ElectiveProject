<?php

$conn = new mysqli('127.0.0.1', 'root', '', 'elective');


if($conn->connect_errno){
	echo $db->connect_error;
	//die( '<br />Sorry we are having some problems');

}

?>