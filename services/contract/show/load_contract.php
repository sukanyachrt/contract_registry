<?php
include('../../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();

$data=[
    "registration_code" => '',
    "Customer_Name" => '',
    "Installment_payment" => '',
    "Sale_Contract" => '',
];
   

    
    $connect->sql = "SELECT
	t_contract.registration_code,
	t_contract.Customer_ID,
	t_contract.Installment_payment,
	t_contract.Sale_Contract,
	customer.Customer_Name 
FROM
	project AS t_project
	INNER JOIN contract_register AS t_contract ON t_project.Project_code = t_contract.Project_ID
	INNER JOIN customer ON t_contract.Customer_ID = customer.Customer_ID
WHERE t_contract.Project_ID='".$_GET['id']."'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['registration_code']=$rsconnect['registration_code'];
    $data['Customer_Name']=$rsconnect['Customer_Name'];
    $data['Installment_payment']=$rsconnect['Installment_payment'];
    $data['Sale_Contract']=$rsconnect['Sale_Contract'];



echo '<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">รหัสทะเบียนสัญญาเข้า : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
            '.$data['registration_code'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">ชื่อ-สกุลลูกค้า : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['Customer_Name'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">ชำระเงินงวด : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['Installment_payment'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">สัญญาซื้อขาย : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['Sale_Contract'].'
        </span>
    </div>
</div>
</div>';
