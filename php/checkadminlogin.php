<?php 
	include "../conn/db.php";
	$jobnum = $_GET['jobnum'];
	$password = $_GET['password'];
	if($jobnum == "" || $password == ""){
		echo "3";
		exit();
	}else{
		$sql = "SELECT * FROM Administrator WHERE ajobnum = '$jobnum'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo "1";
		}else{
			echo "2";
			exit();
		}		
	}

	
	$conn->close();
?>