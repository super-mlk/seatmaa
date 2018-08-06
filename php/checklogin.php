<?php
	include "../conn/db.php";
	$jobNumber = $_POST['Jnumber'];
	$password  = $_POST['password'];
//	echo $jobNumber.",".$password;
	
	//获取到密码的长度，做一次判断
	 $passwordPanduan = strlen($password);
	 //工号判断
	 $jobNumberPanduan = strlen($jobNumber);
	
	//如果输出结果等于2  ，那么前台提示工号或者密码为空
	if($jobNumber == "" || $password == ""){
		echo "2";
	}else{
		//如果密码长度小于3，输出密码不对
		if($passwordPanduan < 3 || $jobNumberPanduan < 11){
			echo "3";
		}else{
			$sql = "SELECT * FROM studentadmin WHERE sJobnum = '$jobNumber' AND sPwd = '$password'";
//			echo $sql;
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				//输出1代表登录成功
				echo "1";
			}else{
				//输出0代表登录失败
				echo "0";
			}
		}
	}
	$conn->close();
?>