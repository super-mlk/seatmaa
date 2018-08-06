<?php
	include "../conn/db.php";
	
	/*
	 * 数字介绍
	 * 1---更新成功
	 * 0---更新失败
	 * 3---没有积分
	 * */
	
	
	$jobnum = $_POST['sJobnum'];
//	echo $jobnum;

    $jifenQuery = "SELECT * FROM studentadmin WHERE sJobnum = '$jobnum'";
	$resultjifen = $conn->query($jifenQuery);
	if ($resultjifen->num_rows > 0) {
		while($rowjifen = $resultjifen->fetch_assoc()){
			if($rowjifen['jifen'] == '1'){
				$jifen = '2';
			}else if($rowjifen['jifen'] == '0'){
				$jifen = '1';
			}
		}
	}else{
		echo "3";
	}
	
	
		

	$sql = "SELECT * FROM libraryseat WHERE amjobnum = '$jobnum' OR pmjobnum = '$jobnum' OR nightjobnum = '$jobnum'";
//	echo $sql;
	$result = $conn->query($sql);
	if($result->num_rows>0){
		$row = $result ->fetch_assoc();
		if($row['amjobnum'] == $jobnum){
			$submitScribesql = "UPDATE libraryseat SET amTimeslot = '',amstate = '0',amjobnum = '0' WHERE amjobnum = '$jobnum' ";
			$jifensql = "UPDATE studentadmin SET jifen = '$jifen' WHERE sJobnum = '$jobnum' ";
		}else if($row['pmjobnum'] == $jobnum){
			$submitScribesql = "UPDATE libraryseat SET pmTimeslot = '',pmstate = '0',pmjobnum = '0' WHERE pmjobnum = '$jobnum' ";
			$jifensql = "UPDATE studentadmin SET jifen = '$jifen' WHERE sJobnum = '$jobnum' ";
		}else if($row['nightjobnum'] == $jobnum){
			$submitScribesql = "UPDATE libraryseat SET nightTimeslot = '',nightstate = '0',nightjobnum = '0' WHERE nightjobnum = '$jobnum' ";
			$jifensql = "UPDATE studentadmin SET jifen = '$jifen' WHERE sJobnum = '$jobnum'";
		}
		
		if($conn->query($submitScribesql) === TRUE && $conn->query($jifensql) === TRUE){
			echo "1";
		}else{
			echo "2";
		}
		
	}
?>