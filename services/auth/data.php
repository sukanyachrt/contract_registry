<?php
header('Content-Type: application/json');
include('./../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "checkauth") {
    
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $connect->sql = "SELECT * FROM	login
	INNER JOIN salesperson ON login.Salesperson_Code = salesperson.Salesperson_Code 
    WHERE	Login_Code ='" . $username . "' AND Salesperson_status=1";
    $connect->queryData();
    $row = $connect->num_rows();
    if ($row > 0) {
        $rsconnect = $connect->fetch_AssocData();
        if ($rsconnect['Password_ID'] == $password) {
            $result = [
                'status' => "ok",
                'data' => $rsconnect
            ];
        } else {
            $result = [
                'status' => "no",
                'msg' => "password ไม่ถูกต้องครับ"
            ];
        }
    } else {
        $result = [
            'status' => "no",
            'msg' => "ไม่พบรหัสผู้ใช้งาน"
        ];
    }
    
    echo json_encode($result);
}
