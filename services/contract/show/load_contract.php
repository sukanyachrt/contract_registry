<?php
include('../../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();

$data = [
    "registration_code" => '',
    "Customer_Name" => '',
    "type_payment" => '',
    "Order_details" => '',
    "period_payment" => '',
    "money_payment" => '',
    "contract_es" => '',
    "contract_el" => '',
    "contract_model" => '',
    "Order_details" => '',
    "Salesperson_Code"=>'',
    "Salesperson_Name"=>'',
    "Salesperson_Tel"=>''
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
    t_contract.Order_details,
    customer.Customer_Name,
    t_contract.Salesperson_Code,
    t_contract.Salesperson_Name,
    t_contract.Salesperson_Tel
FROM
	project AS t_project
	INNER JOIN contract_register AS t_contract ON t_project.Project_code = t_contract.Project_ID
	INNER JOIN customer ON t_contract.Customer_ID = customer.Customer_ID
WHERE t_contract.Project_ID='" . $_GET['id'] . "'";
$connect->queryData();
$rsconnect = $connect->fetch_AssocData();
$data['Order_details'] = $rsconnect['Order_details'];
$data['registration_code'] = $rsconnect['registration_code'];
$data['Customer_Name'] = $rsconnect['Customer_Name'];
$data['type_payment'] = $rsconnect['type_payment'];
$data['period_payment'] = $rsconnect['period_payment'];
$data['money_payment'] = $rsconnect['money_payment'];
$data['contract_es'] = $rsconnect['contract_es'];
$data['contract_el'] = $rsconnect['contract_el'];
$data['contract_model'] = $rsconnect['contract_model'];
$data['Salesperson_Code']=$rsconnect['Salesperson_Code'];
$data['Salesperson_Name']=$rsconnect['Salesperson_Name'];
$data['Salesperson_Tel']=$rsconnect['Salesperson_Tel'];



echo '<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">รหัสทะเบียนสัญญาเข้า : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
            ' . $data['registration_code'] . '
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
        ' . $data['Customer_Name'] . '
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
        ' . $data['type_payment'] . '
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
        ' . $data['money_payment'] . '
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
        ' . $data['period_payment'] . '
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
        ' . $data['contract_es'] . '
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
        ' . $data['contract_el'] . '
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
        ' . $data['contract_model'] . '
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
    <div class="form-group">';
    if($data['Order_details']!==""){
        echo '<a target="_blank" class="btn btn-outline-secondary" href="../../services/uploadfile/'. $data['Order_details'] .'" >
        <i class="bx bxs-file-pdf text-danger" ></i>
        ' . $data['Order_details'] . '
    </a>';
    }
    else{
        echo "-";
    }
    
echo '</div>
</div>
</div>
<div class="row mb-0">
    <div class="col-2 form-group">
    </div>
    <div class="col-8 form-group">
        <div class="divider">
            <div class="divider-text">ข้อมูลพนักงานขาย</div>
        </div>
    </div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">รหัสพนักงานขาย : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        ' . $data['Salesperson_Code'] . '
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">ชื่อพนักงานขาย : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        ' . $data['Salesperson_Name'] . '
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">เบอร์โทรศัพท์ : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        ' . $data['Salesperson_Tel'] . '
        </span>
    </div>
</div>
</div>
';
