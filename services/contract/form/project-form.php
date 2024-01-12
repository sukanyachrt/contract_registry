<?php
echo '<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="basic-default-name">รหัสโครงการ</label>
<div class="col-sm-10">
    <input type="text" class="form-control" id="basic-default-name" placeholder="รหัสโครงการ" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="basic-default-company">ชื่อโครงการ</label>
<div class="col-sm-10">
    <input type="text" class="form-control" id="basic-default-company" placeholder="ชื่อโครงการ" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="basic-default-company">วัน/เดือน/ปี</label>
<div class="col-sm-10">
    <input type="text" class="form-control" id="basic-default-company" placeholder="วัน/เดือน/ปี" />
</div>
</div>
<div class="row mb-3">
<label class="col-sm-2 col-form-label" for="basic-default-company">ที่อยู่โครงการ</label>
<div class="col-sm-10">
    <input type="text" class="form-control" id="basic-default-company" placeholder="ที่อยู่โครงการ" />
</div>
</div>

<div class="row justify-content-end">
<div class="col-12 d-flex justify-content-between">
    <button class="btn btn-label-secondary btn-prev" disabled>
        <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
        <span class="align-middle d-sm-inline-block d-none">ก่อนหน้า</span>
    </button>
    <button  type="button" class="btn btn-primary btn-next"  onclick="stepper.next()">
        <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">ถัดไป</span>
        <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
    </button>
</div>
</div>';
