<?php
include('../../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();
$options = array(
    [
        'id' => '1',
        'status' => 'รอการติดตั้ง'
    ],
    [
        'id' => '2',
        'status' => 'ติดตั้งเสร็จแล้ว'
    ],
);
$data = [
    "Installation_code" => '',
    "Contract_delivery_datesend" => '',
    "Contract_delivery_dateoffer" => '',
    "Project_work_page" => '',
    "Picture" => '',
    "Order_details" => '',
    "Credit_department" => '',
    "Installation_department" => '',
    "Installation_status" => '',
    "hiddenPic" => ''
];



$connect->sql = "SELECT
	t_install.Installation_code,
	t_install.Contract_delivery_datesend,
	t_install.Contract_delivery_dateoffer,
	t_install.Project_work_page,
	t_install.Picture,
	t_install.Order_details,
	t_install.Credit_department,
	t_install.Installation_department,
	t_install.Installation_status 
FROM
	project AS t_project
	INNER JOIN installation_work AS t_install ON t_project.Project_code = t_install.Project_ID 
WHERE
	t_project.Project_code = '" . $_GET['id'] . "'";
$connect->queryData();
$rsconnect = $connect->fetch_AssocData();
$data['Installation_code'] = $rsconnect['Installation_code'];
$data['Contract_delivery_datesend'] = date('d/m/Y', strtotime($rsconnect['Contract_delivery_datesend']));
$data['Contract_delivery_dateoffer'] = date('d/m/Y', strtotime($rsconnect['Contract_delivery_dateoffer']));
$data['Project_work_page'] = $rsconnect['Project_work_page'];
if ($rsconnect['Picture'] != "") {
    $imageData = "../../services/uploadfile/" . $rsconnect['Picture'];
} else {
    $imageData = "";
}

$data['hiddenPic'] = $rsconnect['Picture'];
$data['Picture'] = $imageData;
$data['Order_details'] = $rsconnect['Order_details'];
$data['Credit_department'] = $rsconnect['Credit_department'];
$data['Installation_department'] = $rsconnect['Installation_department'];
$data['Installation_status'] = $rsconnect['Installation_status'];

echo '<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">รหัสการรับงานติดตั้ง : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
            ' . $data['Installation_code'] . '
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">วันส่งของในสัญญา : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        ' . $data['Contract_delivery_datesend'] . '
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">วันส่งมอบในสัญญา : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        ' . $data['Contract_delivery_dateoffer'] . '
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">แบบหน้างานโครงการ : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        ' . $data['Project_work_page'] . '
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">รูปภาพ : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <div class="uploaded_file_view" id="uploaded_view">
    </div>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">รายละเอียดการสั่งซื้อ : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        ' . $data['Order_details'] . '
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">ฝ่ายสินเชื่อ : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        ' . $data['Credit_department'] . '
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">ฝ่ายติดตั้ง : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        ' . $data['Installation_department'] . '
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">สถานะการติดตั้ง : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">';
        

$installationStatusId = $data['Installation_status'];
$foundStatus = '';

foreach ($options as $option) {
    if ($option['id'] == $installationStatusId) {
        $foundStatus = $option['status'];
        break;
    }
}
if($foundStatus=="รอการติดตั้ง"){
    echo '<span id="txtidcard" class="badge bg-label-warning">';
}
else{
    echo '<span id="txtidcard" class="badge bg-label-success">';
}

echo $foundStatus;

echo '</span>
    </div>
</div>
</div>
<input type="hidden" class="button_outer" id="hiddenPic" name="hiddenPic" value="'.$data['Picture'].'">
';
