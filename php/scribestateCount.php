<?php
/**
 * Created by PhpStorm.
 * User: mlk
 * Date: 2018/4/23
 * Time: 21:36
 */

include '../conn/db.php';

/*
 * 0----没有数据
 *
 * */


/*查看每个时间段的预约的总数*/
$sql = "SELECT amstate,pmstate,nightstate FROM libraryseat";
$arr = array();
//统计上午
$amcount = 0;
//统计下午
$pmcount = 0;
//统计傍晚
$nightcount = 0;

//统计本月


$result = $conn -> query($sql);
if($result->num_rows>0){
    //输出数据
    while ($row = $result->fetch_assoc()){
        if($row['amstate'] == '1'){
            $amcount++;
        }
        if($row['pmstate'] == '1'){
            $pmcount++;
        }
        if($row['nightstate'] == '1'){
            $nightcount++;
        }
    }
    array_push($arr,$amcount,$pmcount,$nightcount);
    echo json_encode($arr);
}else{
    echo "0";
}

$conn->close();
