<?php
	include "../conn/db.php";
//	echo $seatid;
//	$arr = array();
	$sql = "SELECT seatId,amstate,pmstate,nightstate FROM libraryseat";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$arr[] = $row;
	}
//	echo $row['amstate'].$row['pmstate'].$row['nightstate']."-".$row['seatId'];
//	echo json_encode($arr);
	echo "{".'"list":'.json_encode($arr)."}";
	$conn->close();
?>