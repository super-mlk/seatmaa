<?php 
	include "../conn/db.php";
	$arr = array();

	// $sql = "SELECT * FROM libraryseat WHERE amstate = '1' OR pmstate = '1' OR nightstate = '1'";
	$sql = "SELECT * FROM libraryseat";
	$result = $conn->query($sql);
	if($result->num_rows>0){
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
	    if($arr){
	        echo json_encode($arr);
	    }else{
	        echo "3";
	    }
	}else{
	    echo "2";
	}

	$conn->close();

?>