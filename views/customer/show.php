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
                        <div class="d-flex mb-0">

                            <div class="flex-grow-1 row">
                                <div class="col-6 col-sm-7 mb-sm-0">
                                    <h4 class="py-3 mb-2">รายละเอียดข้อมูลลูกค้า<span class="text-muted fw-light"> </span> </h4>
                                </div>
                                <?php
                                if ($_SESSION['Salesperson_position'] == "admin_sale") {
                                ?>
                                    <div class="col-6 col-sm-5 text-end pt-3">
                                        <a href="data.php?id=<?php echo $_GET['id'] ?>" class="text-white btn btn-xs btn-warning">
                                            <i class="tf-icons bx bx-edit-alt"></i> แก้ไข
                                        </a>
                                        <button type="button" class="btn btn-xs btn-danger" onclick="updateCustomerStatus('<?php echo $_GET['id'] ?>')">
                                            <i class="tf-icons bx bx-trash"></i>
                                            ลบ
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="card-body" id="load_detail_customer">


                                    </div>
                                    <div class="card-footer">

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-12 text-center">
                                <a href="index.php" class="btn btn-secondary mx-4">
                                    <i class="tf-icons bx bxs-left-arrow-alt"></i>
                                    กลับ
                                </a>
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
                                    <button type="button" id="btnIdCustomer" onclick="confirmDel_customer()" class="btn btn-warning">ยืนยัน</button>
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
        load_detail_customer();
    });

    function load_detail_customer() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load_detail_customer").innerHTML = this.responseText;

            }
        };
        xhttp.open("GET", "../../services/customer/show.php?id=<?php echo $_GET['id'] ?>", true);
        xhttp.send();
    }

    function updateCustomerStatus(objId) {
        $('#modal_confirm_del').modal('show');
        $('#btnIdCustomer').val(objId)
    }

    function confirmDel_customer() {
        let objId = $('#btnIdCustomer').val();
        $.ajax({
            type: 'GET',
            url: "../../services/customer/data.php?v=customerStatus&id=" + objId,
            success: function(response) {
                console.log(response)
                if (response.result == 1) {
                    sessionStorage.setItem('toastrShown', 'save');
                    location.href = 'index.php';
                    $('#modal_confirm_del').modal('hide');
                } else {
                    sessionStorage.setItem('toastrShown', 'no');
                    location.href = 'index.php';
                    $('#modal_confirm_del').modal('hide');
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }
</script>