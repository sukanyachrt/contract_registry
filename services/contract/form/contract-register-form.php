<?php
include('../../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();

$data=[
    "registration_code" => '',
    "Customer_ID" => '',
    "Installment_payment" => '',
    "Sale_Contract" => '',
];
   
if($_GET['id']<=0){
    $connect->sql = "SELECT	MAX( registration_code  ) AS maxid FROM	`contract_register`";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['registration_code']=$rsconnect['maxid']+1;
}
else{
    $data['registration_code']=$_GET['id'];
    $connect->sql = "SELECT 
	t_contract.Customer_ID,
	t_contract.Installment_payment,
	t_contract.Sale_Contract 
FROM
	project AS t_project
	INNER JOIN contract_register AS t_contract ON t_project.Project_code = t_contract.Project_ID
WHERE t_contract.Project_ID='".$_GET['id']."'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['registration_code']=$rsconnect['registration_code'];
    $data['Customer_ID']=$rsconnect['Customer_ID'];
    $data['Installment_payment']=$rsconnect['Installment_payment'];
    $data['Sale_Contract']=$rsconnect['Sale_Contract'];
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
    echo '>'.$rsconnect['Customer_Name'].'</option>';
    
   
}
echo '</select>
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Installment_payment">ชำระเงินงวด</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="'.$data['Installment_payment'].'" id="Installment_payment" name="Installment_payment" placeholder="ชำระเงินงวด" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Sale_Contract">สัญญาซื้อขาย</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="'.$data['Sale_Contract'].'" id="Sale_Contract" name="Sale_Contract" placeholder="สัญญาซื้อขาย" />
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