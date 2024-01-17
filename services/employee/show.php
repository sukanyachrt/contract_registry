<?php
include('../Connect_Data.php');
session_start();
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();
$data=[
    "Login_Code" => '',
    "Password_ID" => '',
    "Salesperson_Code" => '',
    "Salesperson_Name" => '',
    "Telephone_Number" =>'',
    "Salesperson_position" => '',
    "Salesperson_status" => '',
];

$connect->sql = "SELECT
t_login.Login_Code,
t_login.Password_ID,
t_employ.Salesperson_Code,
t_employ.Salesperson_Name,
t_employ.`Telephone_Number`,
t_employ.Salesperson_position,
t_employ.Salesperson_status 
FROM
login AS t_login
INNER JOIN salesperson AS t_employ ON t_login.Salesperson_Code = t_employ.Salesperson_Code
WHERE t_employ.Salesperson_Code='" . $_GET['id'] . "'";
$connect->queryData();
$rsconnect = $connect->fetch_AssocData();
$data['Login_Code']=$rsconnect['Login_Code'];
$data['Password_ID']=$rsconnect['Password_ID'];
$data['Salesperson_Code']=$rsconnect['Salesperson_Code'];
$data['Salesperson_Name']=$rsconnect['Salesperson_Name'];
$data['Telephone_Number']=$rsconnect['Telephone_Number'];
$data['Salesperson_position']=$rsconnect['Salesperson_position'];
$data['Salesperson_status']=$rsconnect['Salesperson_status'];


echo '<div class="row justify-content-around">
<div class="col-4 text-end h6">
รหัสพนักงาน :
</div>
<div class="col-8 text-start h6 text-muted ">
    '.$data['Salesperson_Code'].'
</div>
</div>
<div class="row justify-content-around">
<div class="col-4 text-end h6">
ชื่อพนักงาน :
</div>
<div class="col-8 text-start h6 text-muted">
'.$data['Salesperson_Name'].'
</div>
</div>
<div class="row justify-content-around">
<div class="col-4 text-end h6">
เบอร์โทรศัพท์ :
</div>
<div class="col-8 text-start h6 text-muted">
'.$data['Telephone_Number'].'
</div>
</div>
<div class="row justify-content-around">
<div class="col-4 text-end h6">
ตำแหน่งพนักงาน :
</div>
<div class="col-8 text-start h6 text-muted">
'.$data['Salesperson_position'].'
</div>
</div>
<div class="row justify-content-around">
<div class="col-4 text-end h6">
USERNAME เข้าสู่ระบบ :
</div>
<div class="col-8 text-start h6 text-muted">
'.$data['Login_Code'].'
</div>
</div>
<div class="row justify-content-around">
<div class="col-4 text-end h6">
รหัสผ่าน :
</div>
<div class="col-8 text-start h6 text-muted">
'.$data['Password_ID'].'
</div>
</div>';
