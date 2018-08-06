<?php
	include "../conn/db.php";

	$seatid = $_POST['seatid'];
	$arr = array();
//	echo $seatid;

	$sql = "SELECT * FROM libraryseat where aId = '$seatid'";
//	echo $sql;
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$arr[] = $row;
	}
	echo "{".'"list":'.json_encode($arr)."}";
	
	$conn->close();
	
	
?>