<?php 
	include '../conn/db.php';
	
	
	$sql = "UPDATE libraryseat SET amTimeslot = '',amstate = '0',amjobnum = '0',pmTimeslot ='',pmstate = '0',pmjobnum='0',nightTimeslot = '',nightstate = '0',nightjobnum = '0'";

	if($conn->query($sql) === TRUE){
		echo "1";
	}else{
		echo "2";
	}
	$conn->close();
?>