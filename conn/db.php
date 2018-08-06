<?php
/**
 * 2018-03-19
 * 数据库链接
 */

 $servername = "localhost";
 $username = "root";
 $password = "root";
 $dbname = "slseatmanager";

 //创建连接
 $conn = new mysqli($servername,$username,$password,$dbname);
 

 //检测连接
 if($conn -> connect_error){
     die("连接失败:" .$conn->connect_error);
 }
//  echo "链接成功";


mysql_query("SET NAMES utf8");
header("Content-type:text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:post');
header('Access-Control-Allow-Headers:x-requested-with,content-type');

