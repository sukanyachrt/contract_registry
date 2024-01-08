<?php
header('Content-Type: application/json');
include('../Connect_Data.php');
//error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();

if ($data == "updateEmployStatus") {
     $connect->sql = "UPDATE salesperson SET Salesperson_status = '0' 
     WHERE Salesperson_Code='".$_GET['id']."'";
    $connect->queryData();
    echo json_encode(["result"=>$connect->affected_rows()]);
}
