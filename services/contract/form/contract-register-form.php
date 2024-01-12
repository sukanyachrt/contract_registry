<?php 
echo '<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="basic-default-name">รหัสทะเบียนสัญญาเข้า</label>
<div class="col-sm-10">
    <input type="text" class="form-control" id="basic-default-name" placeholder="รหัสทะเบียนสัญญาเข้า" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="basic-default-name">วัน/เดือน/ปี</label>
<div class="col-sm-10">
    <input type="text" class="form-control" id="basic-default-name" placeholder="วัน/เดือน/ปี" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="basic-default-name">รหัสลูกค้า</label>
<div class="col-sm-10">
    <input type="text" class="form-control" id="basic-default-name" placeholder="รหัสลูกค้า" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="basic-default-name">ชำระเงินงวด</label>
<div class="col-sm-10">
    <input type="text" class="form-control" id="basic-default-name" placeholder="ชำระเงินงวด" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="basic-default-name">สัญญาซื้อขาย</label>
<div class="col-sm-10">
    <input type="text" class="form-control" id="basic-default-name" placeholder="สัญญาซื้อขาย" />
</div>
</div>
<div class="row justify-content-end">
<div class="col-12 d-flex justify-content-between">
    <button type="button" class="btn btn-outline-secondary btn-prev" onclick="stepper.previous()">
        <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
        <span class="align-middle d-sm-inline-block d-none">ก่อนหน้า</span>
    </button>
    <button  type="button" class="btn btn-primary btn-next">
        <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0" onclick="stepper.next()">ถัดไป</span>
        <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
    </button>
</div>
</div>';
?>