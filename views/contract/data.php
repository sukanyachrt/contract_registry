<?php include("../../include/header.php"); ?>
<link rel="stylesheet" href="../../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="../../assets/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="../../assets/plugins/bs-stepper/css/bs-stepper.min.css">
<style>
    .active .bs-stepper-title {
        color: #696cff;
    }

    .step {
        cursor: pointer
    }
</style>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include("../../include/menu_admin.php"); ?>
            <div class="layout-page">
                <?php include("../../include/navbar.php"); ?>
                <?php
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">ข้อมูลทะเบียนสัญญา</span></h4>
                        <div class="row">
                            <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">
                                            <?php if ($id == "") {
                                                echo "เพิ่มข้อมูล";
                                            } else {
                                                echo "แก้ไขข้อมูล";
                                            } ?>
                                        </h5>

                                    </div>
                                    <div class="card-body">
                                        <div class="bs-stepper wizard-modern wizard-modern-example">
                                            <div class="bs-stepper-header table-responsive">

                                                <div class="step" data-target="#project-detail">
                                                    <button type="button" class="step-trigger">
                                                        <span class="bs-stepper-circle">1</span>
                                                        <span class="text-sm bs-stepper-title">โครงการ</span>

                                                    </button>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#contract-register-detail">
                                                    <button type="button" class="step-trigger">
                                                        <span class="bs-stepper-circle">2</span>
                                                        <span class="text-sm bs-stepper-title">ทะเบียนสัญญา</span>
                                                    </button>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#installation-work-detail">
                                                    <button type="button" class="step-trigger">
                                                        <span class="bs-stepper-circle">3</span>
                                                        <span class="text-sm bs-stepper-title">การตรวจสอบและการรับงานติดตั้ง</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="bs-stepper-content">
                                                <div id="project-detail" class="content">
                                                    <div class="col-xxl">
                                                        <div class="mb-4">

                                                            <div class="card-body">
                                                                <form id="project-form">
                                                                    <div id="load-project-form">

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Personal Info -->
                                                <div id="contract-register-detail" class="content">
                                                    <div class="col-xxl">
                                                        <div class="mb-4">

                                                            <div class="card-body">
                                                                <form id="contract-register-form">
                                                                    <div id="load-contract-register-form">

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Social Links -->
                                                <div id="installation-work-detail" class="content">
                                                    <div class="col-xxl">
                                                        <div class="mb-4">
                                                            <div class="card-body">
                                                                <form id="installation-work-form">
                                                                    <div id="load-installation-work-form">

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
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
<script src="../../assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="../../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../../assets/plugins/toastr/toastr.min.js"></script>
<link href="../../assets/datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="../../assets/datepicker/js/bootstrap-datepicker-custom.js"></script>
<script src="../../assets/datepicker/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<script src="../../assets/js/moment.js"></script>
<!-- form -->
<script src="js/project-form.js"></script>
<script src="js/contract-register-form.js"></script>
<script src="js/installation-work-form.js"></script>
<script>
    $(document).ready(function() {

        project_form();
        contract_register_form();
        installation_work_form();
    });
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.wizard-modern-example'), {
            linear: false,
            animation: true
        })

    });






    function project_form() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load-project-form").innerHTML = this.responseText;
                var Date = document.getElementById("Date").value;
                $('#Date').datepicker({
                    format: 'dd/mm/yyyy',
                    todayBtn: true,
                    language: 'th',
                    thaiyear: true
                }).datepicker('update', moment(Date, 'DD/MM/YYYY').toDate());
            }

        };

        xhttp.open("GET", "../../services/contract/form/project-form.php?id=<?php echo $id ?>", true);
        xhttp.send();

    }

    function contract_register_form() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load-contract-register-form").innerHTML = this.responseText;

            }

        };
        xhttp.open("GET", "../../services/contract/form/contract-register-form.php?id=<?php echo $id ?>", true);
        xhttp.send();

    }

    function installation_work_form() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load-installation-work-form").innerHTML = this.responseText;
                var Contract_delivery_datesend = document.getElementById("Contract_delivery_datesend").value;
                var Contract_delivery_dateoffer = document.getElementById("Contract_delivery_dateoffer").value;
                $('#Contract_delivery_datesend').datepicker({
                    format: 'dd/mm/yyyy',
                    todayBtn: true,
                    language: 'th',
                    thaiyear: true
                }).datepicker('update', moment(Contract_delivery_datesend, 'DD/MM/YYYY').toDate());

                $('#Contract_delivery_dateoffer').datepicker({
                    format: 'dd/mm/yyyy',
                    todayBtn: true,
                    language: 'th',
                    thaiyear: true
                }).datepicker('update', moment(Contract_delivery_dateoffer, 'DD/MM/YYYY').toDate());
            }

        };
        xhttp.open("GET", "../../services/contract/form/installation-work-form.php?id=<?php echo $id ?>", true);
        xhttp.send();

    }

    function checkProject() {
        if ($('#project-form').valid()) {
            $('[data-target="#project-detail"] .step-trigger .bs-stepper-title').css('color', 'green');
            $('[data-target="#project-detail"] .bs-stepper-circle').css('background-color', 'green');
        } else {
            $('[data-target="#project-detail"] .step-trigger .bs-stepper-title').css('color', 'red');
            $('[data-target="#project-detail"] .bs-stepper-circle').css('background-color', 'red');
        }

        stepper.next();
    }

    function checkContract() {
        if ($('#contract-register-form').valid()) {
            $('[data-target="#contract-register-detail"] .step-trigger .bs-stepper-title').css('color', 'green');
            $('[data-target="#contract-register-detail"] .bs-stepper-circle').css('background-color', 'green');
        } else {
            $('[data-target="#contract-register-detail"] .step-trigger .bs-stepper-title').css('color', 'red');
            $('[data-target="#contract-register-detail"] .bs-stepper-circle').css('background-color', 'red');
        }

        stepper.next();
    }

    function checkInstall() {
        if ($('#installation-work-form').valid()) {
            $('[data-target="#installation-work-detail"] .step-trigger .bs-stepper-title').css('color', 'green');
            $('[data-target="#installation-work-detail"] .bs-stepper-circle').css('background-color', 'green');
        } else {
            $('[data-target="#installation-work-detail"] .step-trigger .bs-stepper-title').css('color', 'red');
            $('[data-target="#installation-work-detail"] .bs-stepper-circle').css('background-color', 'red');
        }

        if ($('#project-form').valid() && $('#contract-register-form').valid() && $('#installation-work-form').valid()) {
            //บันทึกข้อมูล
            console.log("บันทึกข้อมูล")
            $.ajax({
                async: true,
                url: "../../services/contract/data.php?v=data_Project&id=<?php echo $id ?>",
                type: "POST",
                cache: false,
                data: $('#project-form').serialize(),
                success: function(Res) {
                    console.log(Res)
                    if (Res.id > 0 && Res.status == "ok") {
                        //บันทึกข้อมูลโครงการ
                        let id = Res.id;

                        $.ajax({
                            async: true,
                            url: "../../services/contract/data.php?v=data_Contract_register&id=" + id,
                            type: "POST",
                            cache: false,
                            data: $('#contract-register-form').serialize(),
                            success: function(Res) {
                                console.log(Res)
                                if (Res.id > 0 && Res.status == "ok") {
                                    //บันทึกข้อมูลการตรวจสอบการติดตั้ง
                                    var fd = new FormData($('#installation-work-form')[0]);
                                    var files = $('#Picture')[0].files[0];
                                    fd.append('Picture', files);
                                    $.ajax({
                                        async: true,
                                        url: "../../services/contract/data.php?v=data_Installation&id=" + id,
                                        type: "POST",
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        data: fd,
                                        success: function(Res) {
                                            console.log(Res)
                                            if (Res.id > 0 && Res.status == "ok") {
                                                sessionStorage.setItem('toastrShown', 'saveContract');
                                                location.href = 'index.php';
                                            }
                                        },
                                        error: function(e) {
                                            console.log(e)
                                            toastr.error(e.responseText);
                                        }
                                    });
                                }

                            },
                            error: function(e) {
                                console.log(e)
                                toastr.error(e.responseText);
                            }
                        });
                    }
                },
                error: function(e) {
                    console.log(e)
                    toastr.error(e.responseText);
                }
            });
        } else {
            toastr.error("โปรดกรอกข้อมูลให้ครบค่ะ !");
        }



    }
</script>