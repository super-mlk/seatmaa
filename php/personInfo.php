<?php
	include "../conn/db.php";

	$sJobnum = $_POST['sJobnum'];
	$arr = array();

	$sql = "SELECT * FROM studentadmin where sJobnum = '$sJobnum'";
//	echo $sql;
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		if($row['sSex'] == "1"){
			$row['sSex'] = '男';
		}else{
			$row['sSex'] = '女';
		}
		$arr[] = $row;
	}
	echo "{".'"person":'.json_encode($arr)."}";
	
	$conn->close();
	
	
?>