<?php
	
    include "../conn/db.php";
	
	$jobnum = $_POST['jobnum'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$againpassword = $_POST['againpassword'];
	$age = $_POST['age'];
	$grade = $_POST['grade'];
	$phone = $_POST['phone'];
	$sex = $_POST['sex'];
	$saying = $_POST['saying'];
	$pic=$_FILES['pic']['tmp_name'];
//	echo $pic;
//	echo "工号".$jobnum.",密码".$password.",第二次密码".$againpassword.",年龄".$age.",年级".$grade.",手机号码".$phone.",性别".$sex.",名人名言".$saying.",图片".$pic;
//	exit();
//echo $name;

	/*
	 * 数字含义
	 * 0:----注册失败
	 * 1:----注册成功
	 * 2:----账号已存在
	 * 4:----年级超过范围
	 * 5:----年纪太大
	 * 10:----判断为空
	 * 11:----两次密码不一样
	 * 12:----请输入中文名字
	 * */
	$image = $_FILES['pic']['name'];
	//images是目标文件名，比如你要存储的地方。$_FILES注意不能写成$FILES
    $target = 'images/'.basename($image);
 
	if($jobnum == "" || $password == "" || $againpassword == "" ||
		$age == "" || $grade == "" || $phone == "" || $saying == ""){
		echo "10";
		exit();
	}else{
		if($password!=$againpassword){
			echo "11";
			exit();
		}else{
			if (!isChineseName($name)) {
				echo "12";
				exit();
			} else {
				if($sex == '男'){
					$sex = '1';
				}else if($sex == '女'){
					$sex = '0';
				}
				$sqlJobnum = "SELECT sJobnum FROM studentadmin";
				$resultJobnum = $conn->query($sqlJobnum);
				while($row = $resultJobnum->fetch_assoc()) {
			       if($row['sJobnum'] == $jobnum){
			       	   echo "2";
					   exit();
			       }
				}
				if($age < 18 || $age >= 60){
					echo "5";
					exit();
				}
				if(!ismobilePhone($phone)){
					echo "13";
					exit();
				}
				if($grade>=1 && $grade<=4){
					$sql = "INSERT INTO studentadmin (sJobnum,sName,sPwd,sSex,sAge,sGrade,sPic,sSaying,sPhone,jifen) VALUES ('$jobnum','$name','$password','$sex','$age','$grade','$target','$saying','$phone','2')";
					if ($conn->query($sql) === TRUE) {
						 if(move_uploaded_file($_FILES["pic"]['tmp_name'],'../'.$target)){
			               echo "1";
				         }else{
			               echo "3";
				         }
					} else {
					    echo "0";
					}
				}else{
					echo "4";
					exit();
				}
			}
		}
	}


	/*判断姓名是不是中文名字*/
	function isChineseName($name){
		if (preg_match('/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/', $name)) {
			return true;
		} else {
			return false;
		}
	}
	
	/*判断手机号码格式*/
	function ismobilePhone($phone){
		if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){  
		    return true; 
		}else{  
		    return false;  
		}  
	}

	$conn->close();
?>