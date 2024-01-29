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
    "uploadfile_install" => '',
    "Credit_department" => '',
    "Installation_department" => '',
    "Installation_status" => '',
];

if ($_GET['id'] <= 0) {
    $connect->sql = "SELECT	MAX( Installation_code ) AS maxid FROM	`installation_work`";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['Installation_code'] = $rsconnect['maxid'] + 1;
} else {

   
    $connect->sql = "SELECT
	t_install.Installation_code,
	t_install.Contract_delivery_datesend,
	t_install.Contract_delivery_dateoffer,
	t_install.Project_work_page,
	t_install.uploadfile_install,
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
    $data['uploadfile_install'] = $rsconnect['uploadfile_install'];
    $data['Credit_department'] = $rsconnect['Credit_department'];
    $data['Installation_department'] = $rsconnect['Installation_department'];
    $data['Installation_status'] = $rsconnect['Installation_status'];
}

echo ' <div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Installation_code">รหัสการรับงานติดตั้ง
</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" readOnly value="' . $data['Installation_code'] . '" id="Installation_code" name="Installation_code"  placeholder="รหัสการรับงานติดตั้ง" />
</div>
</div>
<div class="row mb-3 ">
<label class="col-sm-2 col-form-label" for="Contract_delivery_datesend">วันส่งของในสัญญา
</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control datepicker" readOnly value="' . $data['Contract_delivery_datesend'] . '" id="Contract_delivery_datesend" name="Contract_delivery_datesend" placeholder="วันส่งของในสัญญา" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Contract_delivery_dateoffer">วันส่งมอบในสัญญา
</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control datepicker" readOnly value="' . $data['Contract_delivery_dateoffer'] . '" id="Contract_delivery_dateoffer" name="Contract_delivery_dateoffer" placeholder="วันส่งมอบในสัญญา" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Project_work_page">ที่อยู่แบบหน้างานโครงการ
</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="' . $data['Project_work_page'] . '" id="Project_work_page" name="Project_work_page" placeholder="แบบหน้างานโครงการ" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="uploadfile_install">อัพโหลดไฟล์เอกสาร
</label>
<div class="col-sm-10 form-group">';

echo '<input class="form-control " type="file" id="uploadfile_install" name="uploadfile_install" accept="application/pdf" />';
echo '<div class="alert alert-primary alert-dismissible" role="alert" id="uploadfile_installAlert" onclick="Showfilepdf(\'' . $data['uploadfile_install'] . '\')">
    ' . $data['uploadfile_install'] . '
    <button type="button" class="btn-close" id="datauploadfile_install"  name="datauploadfile_install" value="' . $data['uploadfile_install'] . '" onclick="event.stopPropagation(); RemoveUploadfile(\'' . $data['uploadfile_install'] . '\')"  aria-label="Close"></button>
    </div>
</div>
</div>
</div>
<div class="row mb-3" style="display:none;">
<label class="col-sm-2 col-form-label">hiddenuploadfile_install
</label>
<div class="col-sm-10 form-group">
<input type="text" id="hiddenuploadfile_install" name="hiddenuploadfile_install" value="' . $data['uploadfile_install'] . '">
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Credit_department">ฝ่ายสินเชื่อ
</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="' . $data['Credit_department'] . '" id="Credit_department" name="Credit_department" placeholder="ฝ่ายสินเชื่อ" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Installation_department">ฝ่ายติดตั้ง
</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="' . $data['Installation_department'] . '" id="Installation_department" name="Installation_department" placeholder="ฝ่ายติดตั้ง" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Installation_status">สถานะการติดตั้ง</label>
<div class="col-sm-10 form-group">
<select class="form-control"  id="Installation_status" name="Installation_status">';
echo '<option value>เลือก</option>';
foreach ($options as $key => $value) {
    echo '<option value="' . $value['id'] . '"';
    if ($value['id'] == $rsconnect['Installation_status']) {
        echo " selected";
    }
    echo '>' . $value['status'] . '</option>';
}
echo '</select>
</div>
</div>

<div class="row justify-content-end">
<div class="col-12 d-flex justify-content-between">
    <button type="button" class="btn btn-outline-secondary" onclick="stepper.previous()">
        <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
        <span class="align-middle d-sm-inline-block d-none">ก่อนหน้า</span>
    </button>
    <button type="button" class="btn btn-success" onclick="checkInstall()"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">บันทึกข้อมูล</span> <i class="bx bx-save bx-sm me-sm-n2"></i></button>
</div>
</div>
';
