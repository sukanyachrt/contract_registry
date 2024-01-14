<?php
include('../../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();

$data=[
    "registration_code" => '',
    "Customer_Name" => '',
    "type_payment" => '',
    "Order_details" => '',
    "period_payment" =>'',
    "money_payment" => '',
    "contract_es" => '',
    "contract_el" => '',
    "contract_model"=>''

];
   

    
    $connect->sql = "SELECT
	t_contract.registration_code,
	t_contract.Customer_ID,
	t_contract.type_payment,
    t_contract.period_payment,
    t_contract.money_payment,
	t_contract.contract_es,
    t_contract.contract_el,
    t_contract.contract_model,
    customer.Customer_Name 
FROM
	project AS t_project
	INNER JOIN contract_register AS t_contract ON t_project.Project_code = t_contract.Project_ID
	INNER JOIN customer ON t_contract.Customer_ID = customer.Customer_ID
WHERE t_contract.Project_ID='".$_GET['id']."'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['Order_details']=$rsconnect['Order_details'];
    $data['registration_code']=$rsconnect['registration_code'];
    $data['Customer_Name']=$rsconnect['Customer_Name'];
    $data['type_payment']=$rsconnect['type_payment'];
    $data['period_payment']=$rsconnect['period_payment'];
    $data['money_payment']=$rsconnect['money_payment'];
    $data['contract_es']=$rsconnect['contract_es'];
    $data['contract_el']=$rsconnect['contract_el'];
    $data['contract_model']=$rsconnect['contract_model'];



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
<div class="row mb-0">
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
<div class="row mb-0">
<div class="col-2 form-group">
</div>
<div class="col-8 form-group">
<div class="divider">
<div class="divider-text">การชำระเงิน</div>
</div>
</div>
</div>

<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">ประเภทการชำระเงิน : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['type_payment'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">จำนวนเงิน : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['money_payment'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-0">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">งวดในการชำระ : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['period_payment'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-0">
    <div class="col-2 form-group">
    </div>
    <div class="col-8 form-group">
        <div class="divider">
            <div class="divider-text">สัญญาซื้อขาย</div>
        </div>
    </div>
</div>

<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">E/S : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['contract_es'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">E/L : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['contract_el'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">Model : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['contract_model'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">รายละเอียด : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        ' . $data['Order_details'] . '
        </span>
    </div>
</div>
</div>';
