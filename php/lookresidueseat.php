<?php
	include "../conn/db.php";
	
	$setid = $_POST['seatid'];
	$area = $_POST['area'];
//	echo $setid.",".$area;
	$arr = array();
	
	
	$sql = "SELECT amstate,pmstate,nightstate FROM libraryseat WHERE aarea = '$area' AND seatId = '$setid'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		if($row['amstate'] == '0'){
			 $row['amstate'] = '未被预约';
		} if($row['amstate'] == '1'){
			 $row['amstate'] = '已经被预约';
		} if($row['pmstate'] == '0'){
			 $row['pmstate'] = '未被预约';
		} if($row['pmstate'] == '1'){
			 $row['pmstate'] = '已经被预约';
		} if($row['nightstate'] == '0'){
			 $row['nightstate'] = '未被预约';
		} if($row['nightstate'] == '1'){
			 $row['nightstate'] = '已经被预约';
		}
		$arr[] = $row;
	}
	echo "{".'"state":'.json_encode($arr)."}";
	
	$conn->close();
	
?>