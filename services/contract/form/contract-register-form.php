<?php
include('../../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();

$data = [
    "registration_code" => '',
    "Customer_ID" => '',
    "type_payment" => '',
    "money_payment" => '',
    "period_payment" => '',
    "contract_es" => '',
    "contract_el" => '',
    "contract_model" => '',
    "Order_details" => '',
    "Salesperson_Code" => '',
    "Salesperson_Name" => '',
    "Salesperson_Tel" => ''

];

if ($_GET['id'] <= 0) {
    $connect->sql = "SELECT MAX(CAST(SUBSTRING(registration_code, 5) AS UNSIGNED)) AS maxid
    FROM contract_register
    WHERE registration_code LIKE 'THE%'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $maxid= $rsconnect['maxid'] + 1;
    if($maxid<=9){
        $data['registration_code'] = "THE."."00".$maxid."/".(date('Y')+543);
    }
    else  if($maxid>=10 && $maxid<=99)
    {
        $data['registration_code'] = "THE."."0".$maxid."/".(date('Y')+543);
    }
    else{
        $data['registration_code'] = "THE.".$maxid."/".(date('Y')+543);
    }
    
    
   
} else {

    $connect->sql = "SELECT 
    t_contract.registration_code,
	t_contract.Customer_ID,
	t_contract.contract_es,
    t_contract.contract_model,
    t_contract.contract_el,
    t_contract.Order_details,
    t_contract.Salesperson_Code,
    t_contract.Salesperson_Name,
    t_contract.Salesperson_Tel

FROM
	project AS t_project
	INNER JOIN contract_register AS t_contract ON t_project.Project_code = t_contract.Project_ID
WHERE t_contract.Project_ID='" . $_GET['id'] . "'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['registration_code'] = $rsconnect['registration_code'];
    $data['Customer_ID'] = $rsconnect['Customer_ID'];
    $data['contract_es'] = $rsconnect['contract_es'];
    $data['contract_el'] = $rsconnect['contract_el'];
    $data['contract_model'] = $rsconnect['contract_model'];
    $data['Order_details'] = $rsconnect['Order_details'];
    $data['Salesperson_Code'] = $rsconnect['Salesperson_Code'];
    $data['Salesperson_Name'] = $rsconnect['Salesperson_Name'];
    $data['Salesperson_Tel'] = $rsconnect['Salesperson_Tel'];
}


echo '<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="registration_code">รหัสทะเบียนสัญญาเข้า</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" readOnly value="' . $data['registration_code'] . '" id="registration_code" name="registration_code" placeholder="รหัสทะเบียนสัญญาเข้า" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Customer_ID">รหัสลูกค้า</label>
<div class="col-sm-10 form-group">
<select class="form-control" value="' . $data['Customer_ID'] . '" id="Customer_ID" name="Customer_ID">';
echo '<option value>เลือก</option>';
$connect->sql = "SELECT	* FROM	`customer` WHERE Customer_Status='1'";
$connect->queryData();
while ($rsconnect = $connect->fetch_AssocData()) {
    if($rsconnect['Customer_ID']<=9){
        $max="00".$rsconnect['Customer_ID'];
    }
    else if($rsconnect['Customer_ID']>=10 && $rsconnect['maxid']<=99){
        $max="0".$rsconnect['Customer_ID'];
    }
    else{
        $max=$rsconnect['Customer_ID'];
    }

    echo '<option value="' . $rsconnect['Customer_ID'] . '"';
    if ($data['Customer_ID'] == $rsconnect['Customer_ID']) {
        echo " selected";
    }
    echo '>' . $max . '</option>';
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
<div class="col-sm-12 text-center error_Paymentinformation" style="display:none;">
    <p style="color: red;" id="error_Paymentinformation">** โปรดกรอกข้อมูลการชำระให้ครบถ้วนค่ะ **</p>
</div>

<div class="col-sm-12">
<table class="table table-bordered table-hover text-xs " id="tbPaymentinformation">
    <thead class="bg-primary">
        <tr>
            <th class="text-center text-white">ประเภทการชำระ</th>
            <th class="text-center text-white">งวดที่ชำระ</th>
            <th class="text-center text-white">วันเดือนปีที่ชำระ</th>
            <th class="text-center text-white">จำนวนเงิน</th>
            <th class="text-center text-white"></th>
        </tr>
    </thead>
    <tbody>';
        if ($_GET['id'] <= 0) {
        echo '<tr>
            <td>
                <input type="text" autocomplete="yes" class="form-control" id="type_payment" placeholder="ประเภทการชำระ">
            </td>
            <td>
                <input type="number" autocomplete="yes" class="form-control" id="period_payment" placeholder="งวดที่ชำระ">
            </td>
            <td>
                <input type="text" autocomplete="yes" name="dateTypePayment[]" class="form-control dateTypePayment" readOnly placeholder="วันเดือนปีที่ชำระ">
            </td>
            <td>
                <input type="number" autocomplete="yes" class="form-control" id="money_payment" placeholder="จำนวนเงิน">
            </td>
            <td class="text-right py-0 align-middle">
                <div class="btn-group btn-group-sm">
                    <button type="button"  class="btn btn-primary" onclick="addRow()"> <i class="tf-icons bx bx-plus"></i></button>
                    <button type="button"   class="btn btn-danger" onclick="removeRow(this)"><i class="bx bx-trash me-1"></i></button>
                </div>
            </td>
        </tr>';
        }
        else{
            $connect->sql = "SELECT
            Payment_code, 
            type_payment, 
            period_payment, 
            date_payment, 
            money_payment
            FROM
                payment_information
            WHERE Project_ID='" . $_GET['id'] . "'";
            $connect->queryData();
            while($rsconnect = $connect->fetch_AssocData()){
                echo '<tr>
                <td>
                    <input type="text" autocomplete="yes" class="form-control" name="type_payment[]" value="' . $rsconnect['type_payment'] . '" placeholder="ประเภทการชำระ">
                </td>
                <td>
                    <input type="number" autocomplete="yes" class="form-control" name="period_payment[]" value="' . $rsconnect['period_payment'] . '" placeholder="งวดที่ชำระ">
                </td>
                <td>
                    <input type="text" autocomplete="yes" name="dateTypePayment[]" class="form-control dateTypePayment" value="' . date('d/m/Y',strtotime($rsconnect['date_payment'])) . '" readOnly id="date_payment" placeholder="วันเดือนปีที่ชำระ">
                </td>
                <td>
                    <input type="number" autocomplete="yes" class="form-control" name="money_payment[]" value="' . $rsconnect['money_payment'] . '" placeholder="จำนวนเงิน">
                </td>
                <td class="text-right py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <button type="button"  class="btn btn-primary" onclick="addRow()"> <i class="tf-icons bx bx-plus"></i></button>
                        <button type="button"   class="btn btn-danger" onclick="removeRow(this)"><i class="bx bx-trash me-1"></i></button>
                    </div>
                </td>
            </tr>';
            }
        }
    echo '</tbody>
</table>
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
    <input type="text" class="form-control" value="' . $data['contract_es'] . '" id="contract_es" name="contract_es" placeholder="E/S" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="contract_el">E/L</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="' . $data['contract_el'] . '" id="contract_el" name="contract_el" placeholder="E/L" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="contract_model">Model</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="' . $data['contract_model'] . '" id="contract_model" name="contract_model" placeholder="Model" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Order_details">รายละเอียด
</label>
<div class="col-sm-10 form-group">';

echo '<input class="form-control " type="file" id="Order_details" name="Order_details" accept="application/pdf" />';
echo '<div class="alert alert-primary alert-dismissible" role="alert" id="orderDetailsAlert" onclick="Showfilepdf(\'' . $data['Order_details'] . '\')">
    ' . $data['Order_details'] . '
    <button type="button" class="btn-close" id="dataOrder_details"  name="dataOrder_details" value="' . $data['Order_details'] . '" onclick="event.stopPropagation(); RemoveFilePdf(\'' . $data['Order_details'] . '\')"  aria-label="Close"></button>
    </div>
</div>
</div>
</div>
<div class="row mb-3" style="display:none;">
<label class="col-sm-2 col-form-label">hiddenOrder_details
</label>
<div class="col-sm-10 form-group">
<input type="text" id="hiddenOrder_details" name="hiddenOrder_details" value="' . $data['Order_details'] . '">
</div>
</div>
<div class="row mb-3">
<div class="col-sm-12 form-group">
<div class="divider">
<div class="divider-text">ข้อมูลพนักงานขาย</div>
</div>
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Salesperson_Code">รหัสพนักงานขาย</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="' . $data['Salesperson_Code'] . '" id="Salesperson_Code" name="Salesperson_Code" placeholder="รหัสพนักงานขาย" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Salesperson_Name">ชื่อพนักงานขาย</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="' . $data['Salesperson_Name'] . '" id="Salesperson_Name" name="Salesperson_Name" placeholder="ชื่อพนักงานขาย" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Salesperson_Tel">เบอร์โทรศัพท์</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="' . $data['Salesperson_Tel'] . '" id="Salesperson_Tel" name="Salesperson_Tel" placeholder="เบอร์โทรศัพท์" />
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
</div>

';
