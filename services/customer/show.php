<?php
include('../Connect_Data.php');
session_start();
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();
$data=[
    "Customer_ID" => '',
    "Customer_Name" => '',
    "Address" => '',
    "Telephone_Number" => '',
    "Customer_Status" =>'',
    "Salesperson_Code" => '',
    "Salesperson_Name" => '',
];

$connect->sql = "SELECT
t_cus.Customer_ID,
t_cus.Customer_Name,
t_cus.Address,
t_cus.`Telephone_Number`,
t_cus.Customer_Status,
t_cus.Salesperson_Code,
t_sale.Salesperson_Name 
FROM
customer AS t_cus
INNER JOIN salesperson AS t_sale ON t_cus.Salesperson_Code = t_sale.Salesperson_Code
WHERE t_cus.Customer_ID='" . $_GET['id'] . "'";
$connect->queryData();
$rsconnect = $connect->fetch_AssocData();
$data['Customer_ID']=$rsconnect['Customer_ID'];
$data['Customer_Name']=$rsconnect['Customer_Name'];
$data['Address']=$rsconnect['Address'];
$data['Telephone_Number']=$rsconnect['Telephone_Number'];
$data['Customer_Status']=$rsconnect['Customer_Status'];
$data['money_payment']=$rsconnect['money_payment'];
$data['Salesperson_Code']=$rsconnect['Salesperson_Code'];
$data['Salesperson_Name']=$rsconnect['Salesperson_Name'];

echo '<div class="row justify-content-around">
<div class="col-4 text-end h6">
    รหัสลูกค้า :
</div>
<div class="col-8 text-start h6 text-muted ">
    '.$data['Customer_ID'].'
</div>
</div>
<div class="row justify-content-around">
<div class="col-4 text-end h6">
ชื่อลูกค้า :
</div>
<div class="col-8 text-start h6 text-muted">
'.$data['Customer_Name'].'
</div>
</div>
<div class="row justify-content-around">
<div class="col-4 text-end h6">
ที่อยู่ :
</div>
<div class="col-8 text-start h6 text-muted">
'.$data['Address'].'
</div>
</div>
<div class="row justify-content-around">
<div class="col-4 text-end h6">
เบอร์โทรศัพท์ :
</div>
<div class="col-8 text-start h6 text-muted">
'.$data['Telephone_Number'].'
</div>
</div>';
