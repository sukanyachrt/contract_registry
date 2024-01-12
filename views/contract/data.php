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
                                                        <span class="text-sm ">การตรวจสอบและการรับงานติดตั้ง</span>
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

<script>
    $(document).ready(function() {

        project_form();
        contract_register_form();
        installation_work_form();
    });
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.wizard-modern-example'))
        
    });

    function loadStepper() {
        // const wizardNumbered = document.querySelector(".wizard-modern-example");

        // if (typeof wizardNumbered !== undefined && wizardNumbered !== null) {
        //     const wizardNumberedBtnNextList = [].slice.call(wizardNumbered.querySelectorAll('.btn-next')),
        //         wizardNumberedBtnPrevList = [].slice.call(wizardNumbered.querySelectorAll('.btn-prev')),
        //         wizardNumberedBtnSubmit = wizardNumbered.querySelector('.btn-submit');
        //     const numberedStepper = new Stepper(wizardNumbered, {
        //         linear: false
        //     });
        //     if (wizardNumberedBtnNextList) {
        //         wizardNumberedBtnNextList.forEach(wizardNumberedBtnNext => {
        //             wizardNumberedBtnNext.addEventListener('click', event => {
        //                 numberedStepper.next();
        //             });
        //         });
        //     }
        //     if (wizardNumberedBtnPrevList) {
        //         wizardNumberedBtnPrevList.forEach(wizardNumberedBtnPrev => {
        //             wizardNumberedBtnPrev.addEventListener('click', event => {
        //                 numberedStepper.previous();
        //             });
        //         });
        //     }
        //     if (wizardNumberedBtnSubmit) {
        //         wizardNumberedBtnSubmit.addEventListener('click', event => {
        //             alert('Submitted..!!');
        //         });
        //     }

        // }
    }




    function project_form() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load-project-form").innerHTML = this.responseText;
                loadStepper()
            }

        };

        xhttp.open("GET", "../../services/contract/form/project-form.php", true);
        xhttp.send();

    }

    function contract_register_form() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load-contract-register-form").innerHTML = this.responseText;
                loadStepper()
            }

        };
        xhttp.open("GET", "../../services/contract/form/contract-register-form.php", true);
        xhttp.send();

    }

    function installation_work_form() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load-installation-work-form").innerHTML = this.responseText;
                loadStepper()
            }

        };
        xhttp.open("GET", "../../services/contract/form/installation-work-form.php", true);
        xhttp.send();

    }

    $(".step").on('click', function(event) {
        stepper.to(2)
        //var stepper = new Stepper($('.step')[0]);
       // let curPage = stepper._currentIndex;
        //     $(".step").removeClass("active");
        //     $(this).addClass("active");
        //     const target = $(this).data('target');

        // // เปลี่ยน step ไปที่ target ที่ได้
        // window.stepper.to(target);

        // // เพิ่ม class 'active' ให้กับ target ที่ถูกเลือก
        // $(target).addClass("active");
    })
</script>