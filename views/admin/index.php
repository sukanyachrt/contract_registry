<?php include("../../include/header.php"); ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include("../../include/menu_admin.php"); ?>
            <div class="layout-page">
                <?php include("../../include/navbar.php"); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-0 order-0 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary account-image-reset mb-4">
                                    <i class="bx bx-plus d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">
                                        <i class="bx bx-plus me-1"></i>

                                        เพิ่มข้อมูล</span>
                                </button>
                            </div>

                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <h5 class="card-header">ข้อมูลพนักงาน</h5>
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>รหัสพนักงานขาย</th>
                                                        <th>ชื่อพนักงานขาย</th>
                                                        <th>เบอร์โทรศัพท์</th>
                                                        <th>ตำแหน่ง</th>
                                                        <th>จัดการข้อมูล</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">00001</span>
                                                        </td>
                                                        <td>วรนุช วงศ์สวรรค์</td>
                                                        <td>
                                                            0819549763
                                                        </td>
                                                        <td><span class="badge bg-label-primary me-1">Admin Sales</span></td>
                                                        <td>
                                                            <a class="text-warning" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a>
                                                            <a class="text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">00001</span>
                                                        </td>
                                                        <td>มนตรี แก่นแก้ว</td>
                                                        <td>
                                                            0819549763
                                                        </td>
                                                        <td><span class="badge bg-label-info me-1">ฝ่ายสินเชื่อ</span></td>
                                                        <td>
                                                            <a class="text-warning" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a>
                                                            <a class="text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">00001</span>
                                                        </td>
                                                        <td>จำปี แก้วณรงค์</td>
                                                        <td>
                                                            0819549763
                                                        </td>
                                                        <td><span class="badge bg-label-success me-1">ฝ่ายติดตั้ง</span></td>
                                                        <td>
                                                            <a class="text-warning" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a>
                                                            <a class="text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                    <?php include("../../include/footer.php"); ?>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
</body>
<?php include("../../include/script.php"); ?>
<script src="../../include/changepage.js"></script>
