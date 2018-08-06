<?php

	include "../conn/db.php";
	date_default_timezone_set('prc');
	$jobnum = $_POST['jobnum'];
	$name = $_POST['name'];
	$timeSolt = $_POST['timeSolt'];
	$getdate = $_POST['setDate'];
	$seatinfoId = $_POST['seatinfoId'];
	$area = $_POST['area'];
//	echo $seatinfoId.",".$area;
	
	/*获取日期*/
	$datetime =  date('H:i',time());

	/*
	 * 关于数字的解释
	 * 0----预约失败
	 * 1----预约成功
	 * 2----请输入工号
	 * 3----请输入姓名
	 * 4----请输入日期
	 * 5----请输入时间段
	 * 6----积分不足
	 * 7----该座位已经被预约
	 * 8----积分不够
	 * 9----工号不存在
	 * 10----只能预约一次
	 * */
	if($jobnum == ""){
		echo '2';
		exit();
	}else if($name == ""){
		echo "3";
		exit();
	}else if($getdate == ""){
		echo "4";
		exit();
	}else if($timeSolt == ""){
		echo "5";
		exit();
	}else{
		//查询这个工号有没有预约过座位
		$querysqljobnumstate = "SELECT * FROM libraryseat where amjobnum = '$jobnum' OR pmjobnum = '$jobnum' OR nightjobnum = '$jobnum'";
//		echo $querysqljobnumstate;
//		exit();
		$resultquerysqljobnumstate = $conn->query($querysqljobnumstate);
		$rowjobnum = $resultquerysqljobnumstate->fetch_assoc();
		if($rowjobnum['amjobnum'] == $jobnum || $rowjobnum['pmjobnum'] == $jobnum || $rowjobnum['nightjobnum'] == $jobnum){
			echo "10";
			exit();
		}else{
			//查询座位
			$querySeatsql = "SELECT * FROM libraryseat where aarea = '$area' AND seatId = '$seatinfoId'";
			$resultSeat = $conn->query($querySeatsql);
			$rowSeat = $resultSeat->fetch_assoc();
		//	echo $rowSeat['amstate'].",".$rowSeat['pmstate'].",".$rowSeat['nightstate'];
			//获取积分
			$querySql = "SELECT `jifen` FROM studentadmin WHERE sJobnum = '$jobnum'";
			$result = $conn->query($querySql);
			$row = $result->fetch_assoc();
	//		echo $row['jifen'];
			if($row['jifen'] == 2 || $row['jifen'] == 1){
				$jifen = $row['jifen'] - 1;
				switch($timeSolt){
					case 'one':
						if($rowSeat['amstate'] == "0"){
							//$sql = "INSERT INTO libraryseat (amTimeslot,amstate) VALUES ('$getdate','$timeSolt')";
							$sql = "UPDATE libraryseat SET amTimeslot = '$getdate',amstate = '1',amjobnum = '$jobnum'  WHERE aarea = '$area' AND seatId = '$seatinfoId'";
							$reducesql = "UPDATE studentadmin SET `jifen`= '$jifen' WHERE sJobnum = '$jobnum'";
						}else{
							echo "7";
							exit();
						}
						break;
					case 'two':
						if($rowSeat['pmstate'] == "0"){
			//				$sql = "INSERT INTO libraryseat (pmTimeslot,pmstate) VALUES ('$getdate','$timeSolt')";
							$sql = "UPDATE libraryseat SET pmTimeslot = '$getdate',pmstate = '1',pmjobnum = '$jobnum'  WHERE aarea = '$area' AND seatId = '$seatinfoId'";
							$reducesql = "UPDATE studentadmin SET `jifen`= '$jifen' WHERE sJobnum = '$jobnum'";
						}else{
							echo "7";
							exit();
						}
						break;
					case 'three':
						if($rowSeat['nightstate'] == "0"){
	//						$sql = "INSERT INTO libraryseat (nightTimeslot,nightstate) VALUES ('$getdate','$timeSolt')";
							$sql = "UPDATE libraryseat SET nightTimeslot = '$getdate',nightstate = '1',nightjobnum = '$jobnum'  WHERE aarea = '$area' AND seatId = '$seatinfoId'";
							$reducesql = "UPDATE studentadmin SET `jifen`= '$jifen' WHERE sJobnum = '$jobnum'";
						}else{
							echo "7";
							exit();
						}
						break;
				}
			}else{
				echo '6';
				exit();
			}
		}
		if($conn->query($sql) === TRUE && $conn->query($reducesql) === TRUE){
			echo "1";
		}else{
			echo "0";
		}
	}
	$conn->close();
?>