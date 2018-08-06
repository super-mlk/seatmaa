<?php
	
	include "../conn/db.php";
	
//	librarySeat
	
	$arr = array();
	$sql = "SELECT * FROM librarySeatInfo";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		//输出数据
		while($row = $result ->fetch_assoc()){
			$arr[] = $row;
		}
		echo "{".'"list":'.json_encode($arr)."}";
	}
	$conn->close();
?>