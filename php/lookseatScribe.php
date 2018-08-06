<?php
	include "../conn/db.php";
	
	$sJobnum = $_POST['sJobnum'];
	$arr = array();

	$sql = "SELECT * FROM libraryseat where amjobnum = '$sJobnum' OR  pmjobnum = '$sJobnum' OR  nightjobnum = '$sJobnum'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($row['amjobnum'] == $sJobnum){
		$lookseatsql = "SELECT aarea,aSeat,amTimeslot,amstate,amseatInfo,amjobnum FROM libraryseat WHERE amjobnum = '$sJobnum'";
	}else if($row['pmjobnum'] == $sJobnum){
		$lookseatsql = "SELECT aarea,aSeat,pmTimeslot,pmstate,pmseatInfo,pmjobnum FROM libraryseat WHERE pmjobnum = '$sJobnum'";
	}else if($row['nightjobnum'] == $sJobnum){
		$lookseatsql = "SELECT aarea,aSeat,nightTimeslot,nightstate,nseatInfo,nightjobnum FROM libraryseat WHERE nightjobnum = '$sJobnum'";
	}
	$resultseat = $conn->query($lookseatsql);
	while($rowseat = $resultseat->fetch_assoc()){
		/*if($rowseat['amseatInfo'] == "one" || $rowseat['pmseatInfo'] == "one" || $rowseat['nseatInfo'] == "one"){
			$rowseat['amseatInfo'] = '8:00 ~ 10:30';
			$rowseat['pmseatInfo'] = '8:00 ~ 10:30';
			$rowseat['nseatInfo'] = '8:00 ~ 10:30';
		}else if($rowseat['amseatInfo'] == "two" || $rowseat['pmseatInfo'] == "two" || $rowseat['nseatInfo'] == "two"){
			$rowseat['amseatInfo'] = '13:00 ~ 16:00';
			$rowseat['pmseatInfo'] = '13:00 ~ 16:00';
			$rowseat['nseatInfo'] = '13:00 ~ 16:00';

		 * 
		 * 
		 * 
		 * 
		 * 
		 * 
		 * 
		 * 
		 * 
			$rowseat['pmseatInfo'] = '18:00 ~ 20:30';
			$rowseat['nseatInfo'] = '18:00 ~ 20:30';
		}*/
		if($rowseat['amseatInfo'] == "one" ){
	        $rowseat['amseatInfo'] = '8:00 ~ 10:30';
	    }if($rowseat['pmseatInfo'] == "two"){
	        $rowseat['pmseatInfo'] = '13:00 ~ 16:00';
	    }if($rowseat['nseatInfo'] == "three"){
	        $rowseat['nseatInfo'] = '18:00 ~ 20:30';
	    }
		$arr[] = $rowseat;
	}
	echo "{".'"lookseatScribe":'.json_encode($arr)."}";
	
	$conn->close();
?>