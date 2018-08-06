<?php
	include "../conn/db.php";
	
	$pic=$_FILES['pic']['tmp_name'];
	$image = $_FILES['pic']['name'];
	//$sd=$_POST['oldimgsrc'];
	
	//images是目标文件名，比如你要存储的地方。$_FILES注意不能写成$FILES
    $target = 'images/'.basename($image);
 	function changefile($filename){
 		if(file_exists($filename)){
 			unlink($filename);
 		}
 	}
	changefile('../images/ic_launcher.png');
	 $sql = "UPDATE studentadmin SET sPic = '$target' WHERE sJobnum = '20142344917'";
	 if ($conn->query($sql) === TRUE) {
		 if(move_uploaded_file($_FILES["pic"]['tmp_name'],'../'.$target)){
           	echo json_encode($pic);
           //echo "1";
         }else{
         	echo json_encode($pic);
          // echo "2";
         }
	} else {
	    echo "0";
	}

	$conn->close();
	
	
	
?>