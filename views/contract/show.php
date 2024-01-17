<?php include("../../include/header.php"); ?>
<link rel="stylesheet" href="../../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="../../assets/plugins/toastr/toastr.min.css">
<style>
    .active .bs-stepper-title {
        color: #696cff;
    }

    .uploaded_file_view {
        max-width: 300px;
        margin: 20px auto;
        text-align: center;
        position: relative;
        transition: .2s;
        opacity: 0;
        border: 2px solid #ddd;
        padding: 15px;
    }

    .uploaded_file_view img {
        max-width: 100%;
    }

    .uploaded_file_view.show {
        opacity: 1;
    }
</style>

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
                                    <h4 class="py-3 mb-2">ข้อมูลทะเบียนสัญญา<span class="text-muted fw-light"> </span> </h4>
                                </div>
                                <?php
                                if ($_SESSION['Salesperson_position'] != "ฝ่ายติดตั้ง") {
                                ?>
                                    <div class="col-6 col-sm-5 text-end pt-3">
                                        <a href="data.php?id=<?php echo $_GET['id'] ?>" class="text-white btn btn-xs btn-warning">
                                            <i class="tf-icons bx bx-edit-alt"></i> แก้ไข
                                        </a>
                                        <button type="button" class="btn btn-xs btn-danger" onclick="updateProject('<?php echo $_GET['id'] ?>')">
                                            <i class="tf-icons bx bx-trash"></i>
                                            ลบ
                                        </button>
                                    </div>
                                <?php } ?>
                                <?php
                                if ($_SESSION['Salesperson_position'] == "ฝ่ายติดตั้ง") {
                                ?>
                                    <div class="col-6 col-sm-5 text-end pt-3">

                                        <button type="button" class="btn btn-md btn-primary" onclick="updateInstallStatus('<?php echo $_GET['id'] ?>')">
                                            <i class="tf-icons bx bx-message-alt-edit"></i>
                                            อัพเดทสถานะงาน
                                        </button>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-inline-spacing">
                                    <div class="list-group card">
                                        <div class="list-group-item list-group-item-action text-primary h5">รายละเอียดข้อมูลโครงการ</div>
                                        <div class="list-group-item list-group-item-action ">
                                            <div id="load_project"></div>
                                        </div>
                                        <div class="list-group-item list-group-item-action text-primary h5">รายละเอียดข้อมูลทะเบียนสัญญา</div>
                                        <div class="list-group-item list-group-item-action ">
                                            <div id="load_contract"></div>
                                        </div>
                                        <div class="list-group-item list-group-item-action text-primary h5">รายละเอียดข้อมูลการตรวจสอบและรับงานติดตั้ง</div>
                                        <div class="list-group-item list-group-item-action ">
                                            <div id="load_install"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-4">
                            <div class="col-sm-12 text-center">
                                <a href="javascript:history.back()" class="btn btn-secondary mx-4">
                                    <i class="tf-icons bx bxs-left-arrow-alt"></i>
                                    กลับ
                                </a>
                            </div>
                        </div>
                        <!-- ลบข้อมูล -->
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
                                        <button type="button" id="btnIdProject" onclick="confirmDel_project()" class="btn btn-warning">ยืนยัน</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- อัพเดทสถานะงาน -->
                        <div class="modal fade" id="modal_update_status" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header alert alert-primary">
                                        <h4 class="modal-title" id="exampleModalLabel2">อัพเดทสถานะการติดตั้ง</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 h6 pt-2 text-sm-end text-start" for="basic-default-name">สถานะการติดตั้ง : </label>
                                                <div class="col-sm-6">
                                                    <?php
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
                                                    ?>
                                                    <select class="form-control" id="Installation_status" name="Installation_status">
                                                        <option value>เลือก</option>
                                                        <?php foreach ($options as $key => $value) {
                                                        ?>
                                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['status'] ?></option>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            ยกเลิก
                                        </button>
                                        <button type="button" id="btnIdUpdateStatus" onclick="confirm_Update_status()" class="btn btn-outline-primary">ยืนยัน</button>
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
        load_project();
        load_contract();
        load_install();
    });

    function load_project() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load_project").innerHTML = this.responseText;

            }
        };
        xhttp.open("GET", "../../services/contract/show/load_project.php?id=<?php echo $_GET['id'] ?>", true);
        xhttp.send();
    }

    function load_contract() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load_contract").innerHTML = this.responseText;

            }
        };
        xhttp.open("GET", "../../services/contract/show/load_contract.php?id=<?php echo $_GET['id'] ?>", true);
        xhttp.send();
    }

    function load_install() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load_install").innerHTML = this.responseText;
                var fileInputContainer = document.querySelector(' .button_outer');
                loadfile(fileInputContainer);
            }
        };
        xhttp.open("GET", "../../services/contract/show/load_install.php?id=<?php echo $_GET['id'] ?>", true);
        xhttp.send();
    }

    function loadfile(input) {
        var fileInput = $('#hiddenPic').attr('value');
        if (fileInput != "") {
            $("#uploaded_view").find("img").remove();
            $("#uploaded_view").append('<img src="' + fileInput + '" alt="Uploaded Image" />').addClass("show");

        } else {
            $("#uploaded_view").html('-')
            $('#uploaded_view').removeClass("uploaded_file_view");
        }
    }

    function updateProject(id) {
        $('#modal_confirm_del').modal('show');
        $('#btnIdProject').val(id)
    }

    function confirmDel_project() {
        let objId = $('#btnIdProject').val();
        $.ajax({
            type: 'GET',
            url: "../../services/contract/data.php?v=projectStatus&id=" + objId,
            success: function(response) {
                if (response.result == 1) {
                    sessionStorage.setItem('toastrShown', 'delproject');
                    window.location.href = document.referrer;

                }
            },
            error: function(error) {
                console.log(error)
            }
        });

    }

    function updateInstallStatus(objId) {
        var statusInstall = $('.statusInstall').html();
        $('#Installation_status option').filter(function() {
            return $(this).text() === statusInstall;
        }).prop('selected', true);
        $('#modal_update_status').modal('show');
        $('#btnIdUpdateStatus').val(objId)
    }

    function confirm_Update_status() {
        let objId = $('#btnIdUpdateStatus').val();
        let Installation_status = $('#Installation_status').val();
        $.ajax({
            type: 'GET',
            url: "../../services/contract/data.php?v=installStatus&id=" + objId + "&status=" + Installation_status,
            success: function(response) {
                console.log(response);
                $('#modal_update_status').modal('hide');
                load_install();
                toastr.success("อัพเดทสถานะแล้วค่ะ !");
                // if (response.result == 1) {
                //     sessionStorage.setItem('toastrShown', 'delproject');
                //     window.location.href = document.referrer;

                // }
            },
            error: function(error) {
                console.log(error)
            }
        });

    }
    
</script>