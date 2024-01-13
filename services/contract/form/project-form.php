<?php
include('../../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();

$data=[
    "Project_code" => '',
    "Name_Project" => '',
    "Date" => '',
    "Address" => '',
];
   
if($_GET['id']<=0){
    $connect->sql = "SELECT	MAX( Project_code  ) AS maxid FROM	`project`";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['Project_code']=$rsconnect['maxid']+1;
}
else{
    $data['Project_code']=$_GET['id'];
    $connect->sql = "SELECT	* FROM	`project` WHERE Project_code='".$_GET['id']."'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['Name_Project']=$rsconnect['Name_Project'];
    $data['Date']=$rsconnect['Date'];
    $data['Address']=$rsconnect['Address'];
}

echo '<div class="row mb-3 ">
<label class="col-sm-2 col-form-label" for="Project_code">รหัสโครงการ</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" readOnly value="'.$data['Project_code'].'" id="Project_code" name="Project_code" placeholder="รหัสโครงการ" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Name_Project">ชื่อโครงการ</label>
<div class="col-sm-10  form-group">
    <input type="text" class="form-control" value="'.$data['Name_Project'].'" id="Name_Project" name="Name_Project" placeholder="ชื่อโครงการ" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Date">วัน/เดือน/ปี</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control datepicker" readOnly value="'.$data['Date'].'" id="Date" name="Date" placeholder="วัน/เดือน/ปี" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="Address">ที่อยู่โครงการ</label>
<div class="col-sm-10 form-group">
    <input type="text" class="form-control" value="'.$data['Address'].'" id="Address" name="Address" placeholder="ที่อยู่โครงการ" />
</div>
</div>

<div class="row justify-content-end">
<div class="col-12 d-flex justify-content-between">
    <button class="btn btn-label-secondary" disabled>
        <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
        <span class="align-middle d-sm-inline-block d-none">ก่อนหน้า</span>
    </button>
    <button  type="button" class="btn btn-primary"  onclick="checkProject()">
        <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">ถัดไป</span>
        <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
    </button>
</div>
</div>';
