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

    $data['Project_code']=$_GET['id'];
    $connect->sql = "SELECT	* FROM	`project` WHERE Project_code='".$_GET['id']."'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $data['Project_code']=$rsconnect['Project_code'];
    $data['Name_Project']=$rsconnect['Name_Project'];
    $data['Date']=date('d/m/Y',strtotime($rsconnect['Date']));
    $data['Address']=$rsconnect['Address'];

echo '<div class="row mb-3">
<div class="col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">รหัสโครงการ : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
            '.$data['Project_code'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class=" col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">ชื่อโครงการ : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['Name_Project'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class=" col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">วัน/เดือน/ปี : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['Date'].'
        </span>
    </div>
</div>
</div>
<div class="row mb-3">
<div class=" col-4 text-end">
    <div class="form-group">
        <label for="txtidcard" class="text-gray  ">ที่อยู่โครงการ : </label>
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <span id="txtidcard" class="text-gray">
        '.$data['Address'].'
        </span>
    </div>
</div>
</div>';
