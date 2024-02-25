<?php include("../../include/header.php"); ?>
<link rel="stylesheet" href="../../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="../../assets/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="../../assets/plugins/bs-stepper/css/bs-stepper.min.css">
<style>
    .active .bs-stepper-title {
        color: #BC2721;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #f6f6f6;
        color: #444;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        line-height: 1;
    }

    .container {
        max-width: 1100px;
        padding: 0 20px;
        margin: 0 auto;
    }

    .panel {
        margin: 100px auto 40px;
        max-width: 500px;
        text-align: center;
    }

    .button_outer {
        background: #83ccd3;
        border-radius: 30px;
        text-align: center;
        height: 50px;
        width: 100%;
        display: inline-block;
        transition: .2s;
        position: relative;
        overflow: hidden;
    }

    .btn_upload {
        padding: 17px 30px 12px;
        color: #fff;
        text-align: center;
        position: relative;
        display: inline-block;
        overflow: hidden;
        z-index: 3;
        white-space: nowrap;
    }

    .btn_upload input {
        position: absolute;
        width: 100%;
        left: 0;
        top: 0;
        width: 100%;
        height: 105%;
        cursor: pointer;
        opacity: 0;
    }

    .file_uploading {
        width: 100%;
        height: 10px;
        margin-top: 20px;
        background: #ccc;
    }

    .file_uploading .btn_upload {
        display: none;
    }

    .processing_bar {
        position: absolute;
        left: 0;
        top: 0;
        width: 0;
        height: 100%;
        border-radius: 30px;
        background: #83ccd3;
        transition: 3s;
    }

    .file_uploading .processing_bar {
        width: 100%;
    }

    .success_box {
        display: none;
        width: 50px;
        height: 50px;
        position: relative;
    }

    .success_box:before {
        content: '';
        display: block;
        width: 9px;
        height: 18px;
        border-bottom: 6px solid #fff;
        border-right: 6px solid #fff;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        position: absolute;
        left: 17px;
        top: 10px;
    }

    .file_uploaded .success_box {
        display: inline-block;
    }

    .file_uploaded {
        margin-top: 0;
        width: 50px;
        background: #83ccd3;
        height: 50px;
    }

    .uploaded_file_view {
        max-width: 300px;
        margin: 40px auto;
        text-align: center;
        position: relative;
        transition: .2s;
        opacity: 0;
        border: 2px solid #ddd;
        padding: 15px;
    }

    .file_remove {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: block;
        position: absolute;
        background: #aaa;
        line-height: 30px;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
        right: -15px;
        top: -15px;
    }

    .file_remove:hover {
        background: #222;
        transition: .2s;
    }

    .uploaded_file_view img {
        max-width: 100%;
    }

    .uploaded_file_view.show {
        opacity: 1;
    }

    .error_msg {
        text-align: center;
        color: #f00
    }
</style>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include("../../include/checkmenu.php"); ?>
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
                        <div class="row justify-content-center mt-4">
                            <div class="col-sm-12 text-center">
                                <a href="javascript:history.back()" class="btn btn-secondary mx-4">
                                    <i class="tf-icons bx bxs-left-arrow-alt"></i>
                                    กลับ
                                </a>
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
                if ($('#dataOrder_details').val() == "") {

                    $('#Order_details').show()
                    $('#orderDetailsAlert').hide()
                } else {
                    $('#Order_details').hide()
                    $('#orderDetailsAlert').show()
                }
                var dateTypePayments = document.querySelectorAll('input[name="dateTypePayment[]"]');

                for (var i = 0; i < dateTypePayments.length; i++) {
                    var currentElement = dateTypePayments[i];
                    var currentValue = currentElement.value;
                    $(currentElement).datepicker({
                        format: 'dd/mm/yyyy',
                        todayBtn: true,
                        language: 'th',
                        thaiyear: true
                    });
                    $(currentElement).datepicker('setDate', moment(currentValue, 'DD/MM/YYYY').toDate());
                }


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
                if ($('#datauploadfile_install').val() == "") {

                    $('#uploadfile_install').show()
                    $('#uploadfile_installAlert').hide()
                } else {
                    $('#uploadfile_install').hide()
                    $('#uploadfile_installAlert').show()
                }
                // var fileInputContainer = document.querySelector('.button_outer');
                // loadfile(fileInputContainer);
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
        checkPaymentinformation()
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
            console.log(checkPaymentinformation())
            if (checkPaymentinformation() == true) {
                console.log("บันทึกข้อมูล")
                $.ajax({
                    async: true,
                    url: "../../services/contract/data.php?v=data_Project&id=<?php echo $id ?>",
                    type: "POST",
                    cache: false,
                    data: $('#project-form').serialize(),
                    success: function(Res) {
                        console.log(Res)
                        if (Res.status == "ok") {
                            //บันทึกข้อมูลโครงการ
                            let id = Res.id;
                            var formregister = new FormData($('#contract-register-form')[0]);
                            var files = $('#Order_details')[0].files[0];
                            formregister.append('Order_details', files);


                            $.ajax({
                                async: true,
                                url: "../../services/contract/data.php?v=data_Contract_register&id=" + id,
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formregister,
                                success: function(Res) {
                                    console.log(Res)
                                    if (Res.status == "ok") {

                                        //บันทึกการชำระเงิน
                                        let tbPaymentinformation = [];
                                        $('#tbPaymentinformation tbody tr').each(function() {
                                            var type_payment = $(this).find('td:eq(0) select option:selected').val();
                                            var period_payment = $(this).find('td:eq(1) select option:selected').val();
                                            var date_payment = $(this).find('td:eq(2) input[type="text"]').val();
                                            var money_payment = $(this).find('td:eq(3) input[type="number"]').val();
                                            tbPaymentinformation.push({
                                                'type_payment': type_payment,
                                                'period_payment': period_payment,
                                                'date_payment': date_payment,
                                                'money_payment': money_payment,
                                            });
                                        });

                                        $.ajax({
                                            async: true,
                                            url: "../../services/contract/data.php?v=data_Payment&id=" + id,
                                            type: "POST",
                                            cache: false,
                                            data: {
                                                tbPaymentinformation: JSON.stringify(tbPaymentinformation)
                                            },
                                            success: function(Res) {
                                                console.log(Res)
                                                if (Res.status == "ok") {
                                                    //บันทึกข้อมูลการตรวจสอบการติดตั้ง
                                                    var fd = new FormData($('#installation-work-form')[0]);
                                                    var files = $('#uploadfile_install')[0].files[0];
                                                    fd.append('uploadfile_install', files);



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
                                                            if (Res.status == "ok") {
                                                                sessionStorage.setItem('toastrShown', 'saveContract');
                                                                if ('<?php echo $_SESSION['Salesperson_position']; ?>' === "admin_sale") {
                                                                    location.href = 'index.php';
                                                                } else {
                                                                    location.href = 'listcontract.php';
                                                                }
                                                            }
                                                        },
                                                        error: function(e) {
                                                            console.log(e)
                                                            toastr.error(e.responseText);
                                                        }
                                                    });
                                                }
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
                toastr.error("โปรดกรอกข้อมูลการชำระเงินในหน้าทะเบียนสัญญาให้ครบ !");
            }

        } else {
            toastr.error("โปรดกรอกข้อมูลให้ครบค่ะ !");
        }



    }

    function checkPaymentinformation() {
        var isValid = true;

        $('#tbPaymentinformation tbody tr').each(function() {
            var inputs = $(this).find('input');
            inputs.each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    return false;
                }
            });

            if (!isValid) {
                return false;
            }
        });

        if (isValid) {
            $('.error_Paymentinformation').hide();
            return true;



        } else {

            $('.error_Paymentinformation').show();
            return false;
        }
    }


    function addRow() {
        var newRow = `<tr>
            <td>
            <select id="type_payment" class="form-control" placeholder="ประเภทการชำระ">
                <option value=""> เลือกประเภทการชำระ </option>
                <option value="เช็ค">เช็ค</option>
                <option value="ตั๋ว">ตั๋ว</option>
                <option value="สลิป">สลิป</option>
             </select>
            </td>
            <td>
            <select id="period_payment" class="form-control" placeholder="งวดที่ชำระ">
                <option value=""> งวดที่ชำระ </option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
             </select>
            </td>
            <td>
                <input type="text" autocomplete="yes" class="form-control dateTypePayment" readOnly id="date_payment" placeholder="วันเดือนปีที่ชำระ">
            </td>
            <td>
                <input type="number" autocomplete="yes" class="form-control" id="money_payment" placeholder="จำนวนเงิน">
            </td>
            <td class="text-right py-0 align-middle">
                <div class="btn-group btn-group-sm">
                    <button type="button"  class="btn btn-primary" onclick="addRow()"> <i class="tf-icons bx bx-plus"></i></button>
                    <button type="button"   class="btn btn-danger" onclick="removeRow(this)"><i class="bx bx-trash me-1"></i></button>
                </div>
            </td>
        </tr>`;

        $("#tbPaymentinformation tbody").append(newRow);
        $('.dateTypePayment').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: true,
            language: 'th',
            thaiyear: true
        });
    }

    function removeRow(e) {
        if ($("#tbPaymentinformation tbody tr").length === 1) {
            return;
        }
        var row = $(e).closest("tr");
        row.remove();
    }



    function file_remove() {
        $('.uploadImage').show();
        $('.displayimage').hide();
        $("#uploaded_view").removeClass("show");
        $("#uploaded_view").find("img").remove();
        var btnOuter = $(".button_outer");
        btnOuter.removeClass("file_uploading");
        btnOuter.removeClass("file_uploaded");
        $("#hiddenPic").val('');

    }

    function showFile() {
        var el = window._protected_reference = document.getElementById("Picture");
        el.type = "file";
        el.accept = "image/*";
        el.multiple = "multiple"; // remove to have a single file selection

        // (cancel will not trigger 'change')
        el.addEventListener('change', function(ev2) {
            var btnOuter = $(".button_outer");
            btnOuter.addClass("file_uploading");
            setTimeout(function() {
                btnOuter.addClass("file_uploaded");
            }, 3000);
            if (el.files.length) {
                console.log(el.files[0])
                var ext = el.files[0].type;
                if ($.inArray(ext, ['image/gif', 'image/png', 'image/jpg', 'image/jpeg']) == -1) {
                    $(".error_msg").text("โปรดอัพโหลดรูปภาพเท่านั้นค่ะ (.gif, .png, .jpg ,.jpeg)");
                    $('.displayimage').show();
                    $('.uploadImage').show();
                    $("#uploaded_view").removeClass("show");
                    $("#uploaded_view").find("img").remove();
                    btnOuter.removeClass("file_uploading");
                    setTimeout(function() {
                        btnOuter.removeClass("file_uploaded");
                    }, 1500);

                } else {
                    $(".error_msg").text('');
                    $('.displayimage').hide();
                    btnOuter.addClass("file_uploading");
                    setTimeout(function() {
                        btnOuter.addClass("file_uploaded");
                    }, 1000);
                    var uploadedFile = URL.createObjectURL(el.files[0]);
                    setTimeout(function() {
                        $("#uploaded_view").find("img").remove();
                        $('.displayimage').show();
                        $('.uploadImage').hide();
                        $("#uploaded_view").append('<img src="' + uploadedFile + '" />').addClass("show");
                    }, 1000);
                }


            }



        });

        el.click();
    }

    function loadfile(input) {
        var fileInput = $('#Picture').attr('value');
        if (fileInput != "") {
            $("#uploaded_view").find("img").remove();
            $('.displayimage').show();
            $('.uploadImage').hide();
            $("#uploaded_view").append('<img src="' + fileInput + '" alt="Uploaded Image" />').addClass("show");

        }
    }

    function RemoveFilePdf(filepdf) {
        $('#hiddenOrder_details').val('')
        $('#Order_details').show()
        $('#orderDetailsAlert').hide()
    }

    function Showfilepdf(file) {
        var url = '../../services/uploadfile/' + file;
        window.open(url, '_blank');
    }

    function RemoveUploadfile(filepdf) {
        $('#hiddenuploadfile_install').val('')
        $('#uploadfile_install').show()
        $('#uploadfile_installAlert').hide()
    }
</script>