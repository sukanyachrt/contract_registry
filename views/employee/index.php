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
                                                        <th class="text-center">รหัสพนักงานขาย</th>
                                                        <th class="text-center">ชื่อพนักงานขาย</th>
                                                        <th class="text-center">เบอร์โทรศัพท์</th>
                                                        <th class="text-center">ตำแหน่ง</th>
                                                        <th class="text-center">สถานะ</th>
                                                        <th class="text-center">จัดการข้อมูล</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbEmploy">


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                    <div class="modal fade" id="modal_confirm_del" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning ">
                                    <h4 class="modal-title text-white" id="exampleModalLabel2">แจ้งเตือน</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="">ยืนยันการลบข้อมูล ?</h5>
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        ยกเลิก
                                    </button>
                                    <button type="button" id="btnIdEmploy" onclick="confirmDel_employ()" class="btn btn-warning">ยืนยัน</button>
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
<script>
    dataEmploy();

    function dataEmploy() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tbEmploy").innerHTML = this.responseText;

            }
        };
        xhttp.open("GET", "../../services/employee/tableEmploy.php", true);
        xhttp.send();
    }

    function updateEmployStatus(objId) {
        $('#modal_confirm_del').modal('show');
        $('#btnIdEmploy').val(objId)


    }

    function confirmDel_employ() {
        let objId= $('#btnIdEmploy').val();
        $.ajax({
            type: 'GET',
            url: "../../services/employee/data.php?v=updateEmployStatus&id=" + objId,
            success: function(response) {
                if (response.result == 1) {
                    dataEmploy();
                    $('#modal_confirm_del').modal('hide');
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }
</script>