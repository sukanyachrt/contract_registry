<?php
include('../../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();

$data=[
    "registration_code" => '',
    "Customer_ID" => '',
    "type_payment" => '',
    "money_payment" => '',
    "period_payment" => '',
    "contract_es" => '',
    "contract_el" => '',
    "contract_model" => ''
];
   
if($_GET['id']<=0){
    $connect->sql = "SELECT	MAX( registration_code  ) AS maxid FROM	`contract_register`";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['registration_code']=$rsconnect['maxid']+1;
}
else{
    
    $connect->sql = "SELECT 
    t_contract.registration_code,
	t_contract.Customer_ID,
	t_contract.type_payment,
    t_contract.money_payment,
    t_contract.period_payment,
	t_contract.contract_es,
    t_contract.contract_model,
    t_contract.contract_el,
    t_contract.Order_details
FROM
	project AS t_project
	INNER JOIN contract_register AS t_contract ON t_project.Project_code = t_contract.Project_ID
WHERE t_contract.Project_ID='".$_GET['id']."'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['registration_code']=$rsconnect['registration_code'];
    $data['Customer_ID']=$rsconnect['Customer_ID'];
    $data['type_payment']=$rsconnect['type_payment'];
    $data['money_payment']=$rsconnect['money_payment'];
    $data['period_payment']=$rsconnect['period_payment'];
    $data['contract_es']=$rsconnect['contract_es'];
    $data['contract_el']=$rsconnect['contract_el'];
    $data['contract_model']=$rsconnect['contract_model'];
}


echo '<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="registration_code">รหัสทะเบียนสัญญาเข้า</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" readOnly value="'.$data['registration_code'].'" id="registration_code" name="registration_code" placeholder="รหัสทะเบียนสัญญาเข้า" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Customer_ID">รหัสลูกค้า</label>
<div class="col-sm-10 form-group">
<select class="form-control" value="'.$data['Customer_ID'].'" id="Customer_ID" name="Customer_ID">';
echo '<option value>เลือก</option>';
$connect->sql = "SELECT	* FROM	`customer` WHERE Customer_Status='1'";
$connect->queryData();
while($rsconnect = $connect->fetch_AssocData()){
    echo '<option value="'.$rsconnect['Customer_ID'].'"';
    if ($data['Customer_ID'] == $rsconnect['Customer_ID']) {
        echo " selected";
    }
    echo '>'.$rsconnect['Customer_ID'].'</option>';
    
   
}
echo '</select>
</div>
</div>
<div class="row mb-3">
<div class="col-sm-12 form-group">
<div class="divider">
<div class="divider-text">การชำระเงิน</div>
</div>
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="type_payment">ประเภทการชำระ</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="'.$data['type_payment'].'" id="type_payment" name="type_payment" placeholder="ประเภทการชำระ" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="money_payment">จำนวนเงิน</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="'.$data['money_payment'].'" id="money_payment" name="money_payment" placeholder="จำนวนเงิน" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="period_payment">งวดที่ชำระ</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="'.$data['period_payment'].'" id="period_payment" name="period_payment" placeholder="งวดที่ชำระ" />
</div>
</div>
<div class="row mb-3">
<div class="col-sm-12 form-group">
<div class="divider">
<div class="divider-text">สัญญาซื้อขาย</div>
</div>
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="contract_es">E/S</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="'.$data['contract_es'].'" id="contract_es" name="contract_es" placeholder="E/S" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="contract_el">E/L</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="'.$data['contract_el'].'" id="contract_el" name="contract_el" placeholder="E/L" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="contract_model">Model</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="'.$data['contract_model'].'" id="contract_model" name="contract_model" placeholder="Model" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Order_details">รายละเอียด
</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="' . $data['Order_details'] . '" id="Order_details" name="Order_details" placeholder="รายละเอียดการสั่งซื้อ" />
</div>
</div>
<div class="row justify-content-end">
<div class="col-12 d-flex justify-content-between">
    <button type="button" class="btn btn-outline-secondary" onclick="stepper.previous()">
        <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
        <span class="align-middle d-sm-inline-block d-none">ก่อนหน้า</span>
    </button>
    <button  type="button" class="btn btn-primary" onclick="checkContract()">
        <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0" >ถัดไป</span>
        <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
    </button>
</div>
</div>';
?>