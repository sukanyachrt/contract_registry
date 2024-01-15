<?php include("../../include/header.php"); ?>
<link rel="stylesheet" href="../../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="../../assets/plugins/toastr/toastr.min.css">

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include("../../include/checkmenu.php"); ?>
            <div class="layout-page">
                <?php include("../../include/navbar.php"); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-0">ข้อมูลทะเบียนสัญญา</h4>

                        <div class="row">
                            <div class="col-lg-12 mb-0 order-0 d-flex justify-content-end">
                                <a href="data.php" class="btn btn-primary text-white account-image-reset mb-4">
                                    <i class="bx bx-plus d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">
                                        <i class="bx bx-plus me-1"></i>

                                        เพิ่มข้อมูล</span>
                                </a>
                            </div>
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <h5 class="card-header ">
                                        <div class="input-group ">
                                            <span class="input-group-text bg-primary text-white" id="basic-addon11">ค้นหาข้อมูล </span>
                                            <input type="text" autocomplete="yes" id="search" name="search" class="form-control" placeholder="ค้นหาข้อมูลจากตาราง" />
                                        </div>
                                    </h5>
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">รหัสโครงการ</th>
                                                        <th class="text-center">ชื่อโครงการ</th>
                                                        <th class="text-center">รหัสทะเบียนสัญญาเข้า</th>
                                                        <th class="text-center">วัน/เดือน/ปี</th>
                                                        <th class="text-center">ชื่อลูกค้า</th>
                                                        <th class="text-center">ที่อยู่โครงการ</th>
                                                        <th class="text-center">สถานะการติดตั้ง</th>
                                                        <th class="text-center">จัดการข้อมูล</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableinstallContract"></tbody>
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
<script src="../../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../../assets/plugins/toastr/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        tablelistContract();
    });
    function tablelistContract() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tableinstallContract").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../services/contract/tableinstallContract.php", true);
        xhttp.send();
    }
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableinstallContract tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
</script>