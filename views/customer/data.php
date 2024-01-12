<?php include("../../include/header.php"); ?>
<link rel="stylesheet" href="../../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="../../assets/plugins/toastr/toastr.min.css">

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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">ข้อมูลลูกค้า</span></h4>
                        <div class="row">
                            <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">
                                        <?php if($id=="") { echo "เพิ่มข้อมูล" ;} else { echo "แก้ไขข้อมูล";}?>
                                        </h5>

                                    </div>
                                    <div class="card-body">
                                        <form id="customerForm">
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="Customer_ID">รหัสลูกค้า</label>
                                                <div class="col-sm-10 form-group">
                                                    <input type="text" class="form-control" ReadOnly id="Customer_ID" name="Customer_ID" placeholder="รหัสลูกค้า" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="Customer_Name">ชื่อลูกค้า</label>
                                                <div class="col-sm-10 form-group">
                                                    <input type="text" class="form-control" id="Customer_Name" name="Customer_Name" placeholder="ชื่อลูกค้า" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="Address">ที่อยู่</label>
                                                <div class="col-sm-10 form-group">
                                                    <div class="input-group input-group-merge">
                                                        <textarea class="form-control" id="Address" name="Address" rows="2" placeholder="ที่อยู่"></textarea>
                                                       
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="Telephone_Number">เบอร์โทรศัพท์</label>
                                                <div class="col-sm-10 form-group">
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" id="Telephone_Number" name="Telephone_Number" class="form-control" placeholder="เบอร์โทรศัพท์" />

                                                    </div>

                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="Customer_Status"> สถานะ</label>
                                                <div class="col-sm-10 form-group">
                                                    <select id="Customer_Status" name="Customer_Status" class="form-select">
                                                        <option value="">เลือกสถานะ</option>
                                                        <option value="1">ใช้งาน</option>
                                                        <option value="0">ไม่ใช้งาน</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row justify-content-end">
                                                <div class="col-sm-10">
                                                    <button type="button" id="btnSave" style="display: none;" class="btn btn-primary">บันทึกข้อมูล</button>
                                                    <button type="button" id="btnSaveEdit" style="display: none;" value="<?php echo $id ?>" class="btn btn-primary">บันทึกการแก้ไข</button>
                                                    <button type="button" id="btnReset" class="btn btn-outline-secondary">กลับ</button>
                                                </div>
                                            </div>
                                        </form>
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
    $(function() {
        
        let id = $('#btnSaveEdit').val();
        if (id != "") {
            $('#btnSaveEdit').show()
            getdataCustomer(id)
           

        } else {
            //เพิ่มข้อมูลใหม่
            $('#btnSave').show()
            $.ajax({
                url: "../../services/customer/data.php?v=maxIdCustomer",
                type: "GET",
                success: function(Res) {
                    $('#Customer_ID').val(Res.maxid)
                }
            });
        }

    });
    function getdataCustomer(id){
        $.ajax({
                url: "../../services/customer/data.php?v=dataCustomerByID&id=" + id,
                type: "GET",
                success: function(Res) {
                    if (Res.status == "ok") {
                        let data = Res.data;
                        $('#Customer_ID').val(data.Customer_ID)
                        $('#Customer_Name').val(data.Customer_Name)
                        $('#Telephone_Number').val(data.Telephone_Number)
                        $('#Address').val(data.Address)
                        $('#Customer_Status').val(data.Customer_Status)
                        $('#customerForm').valid();
                    }
                }
            });
    }
    //บันทึก
    $("#btnSave").on("click", function() {
        
        if ($('#customerForm').valid()) {

            $.ajax({
                async: true,
                url: "../../services/customer/data.php?v=insertcustomer",
                type: "POST",
                cache: false,
                data: $('#customerForm').serialize(),
                success: function(Res) {
                    console.log(Res);
                    if (Res.result >= 0) {
                        sessionStorage.setItem('toastrShown', 'save');
                        location.href = 'index.php';

                    }
                }
            });
        }
    });

    $("#btnSaveEdit").on("click", function() {

        if ($('#customerForm').valid()) {
            let id = $('#btnSaveEdit').val();
            $.ajax({
                async: true,
                url: "../../services/customer/data.php?v=updateCustomerAll&id=" + id,
                type: "POST",
                cache: false,
                data: $('#customerForm').serialize(),
                success: function(Res) {
                    console.log(Res);
                    if (Res.result >= 0) {
                        sessionStorage.setItem('toastrShown', 'edit');
                        location.href = 'index.php';

                    }
                }
            });
        }
    });
    $("#btnReset").on("click", function() {
        location.href = 'index.php';
    })
    

    $('#customerForm').validate({
        rules: {
            Customer_ID: {
                required: true,
                alphanumeric: true,
            },
            Customer_Name: {
                required: true,

            },
            Telephone_Number: {
                required: true,
                digits: true, // ต้องเป็นตัวเลขเท่านั้น
                minlength: 10, // ต้องมีจำนวน 10 ตัว
                maxlength: 10
            },
            Address: {
                required: true,
            },
            Customer_Status: {
                required: true,
            },
            
        },
        messages: {
            Customer_ID: {
                required: "โปรดกรอกรหัสลูกค้า",
                alphanumeric: "โปรดกรอกรหัสผู้ใช้งานที่มีเฉพาะตัวเลขและตัวอักษร",
            },
            Customer_Name: {
                required: "โปรดกรอกรหัสผ่าน",
                alphanumeric: "โปรดกรอกรหัสผ่านที่มีเฉพาะตัวเลขและตัวอักษร",
            },
            Telephone_Number: {
                required: "กรุณากรอกเบอร์โทรศัพท์",
                digits: "กรุณากรอกเฉพาะตัวเลข",
                minlength: "กรุณากรอกเบอร์โทรศัพท์ที่มีจำนวน 10 ตัว"
            },
            Address: {
                required: "กรุณากรอกที่อยู่",
            },
            Customer_Status: {
                required: "กรุณาเลือกสถานะ",
            },
            

        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },

    });

    // เพิ่มเงื่อนไขสำหรับกฎ alphanumeric
    $.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
    }, "โปรดกรอกข้อมูลที่มีเฉพาะตัวเลขและตัวอักษร (a-z)");
</script>