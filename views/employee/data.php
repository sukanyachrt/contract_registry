<?php include("../../include/header.php"); ?>
<link rel="stylesheet" href="../../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="../../assets/plugins/toastr/toastr.min.css">

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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">ข้อมูลพนักงาน</span></h4>
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
                                        <form id="employeeForm">
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="Salesperson_Code">รหัสพนักงาน</label>
                                                <div class="col-sm-10 form-group">
                                                    <input type="text" class="form-control" ReadOnly id="Salesperson_Code" name="Salesperson_Code" placeholder="รหัสพนักงาน" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="Salesperson_Name">ชื่อพนักงาน</label>
                                                <div class="col-sm-10 form-group">
                                                    <input type="text" class="form-control" id="Salesperson_Name" name="Salesperson_Name" placeholder="ชื่อพนักงาน" />
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
                                                <label class="col-sm-2 col-form-label" for="Salesperson_position">ตำแหน่งพนักงาน </label>
                                                <div class="col-sm-10 form-group">
                                                    <select id="Salesperson_position" name="Salesperson_position" class="form-select">
                                                        <option value="">เลือกตำแหน่งพนักงาน</option>
                                                        <option value="admin_sale">Admin Sale</option>
                                                        <option value="ฝ่ายสินเชื่อ">ฝ่ายสินเชื่อ</option>
                                                        <option value="ฝ่ายติดตั้ง">ฝ่ายติดตั้ง</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="Login_Code"> Username เข้าสู่ระบบ</label>
                                                <div class="col-sm-10 form-group">
                                                    <input type="text" id="Login_Code" name="Login_Code" class="form-control" placeholder="Username เข้าสู่ระบบ" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="Password_ID">รหัสผ่าน</label>
                                                <div class="col-sm-10 form-group">
                                                    <input type="text" id="Password_ID" name="Password_ID" class="form-control" placeholder="รหัสผ่าน" />
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
            getdataEmploy(id)
           

        } else {
            //เพิ่มข้อมูลใหม่
            $('#btnSave').show()
            $.ajax({
                url: "../../services/employee/data.php?v=maxIdEmploy",
                type: "GET",
                success: function(Res) {
                    $('#Salesperson_Code').val(Res.maxid)
                }
            });
        }

    });
    function getdataEmploy(id){
        $.ajax({
                url: "../../services/employee/data.php?v=dataEmployByID&id=" + id,
                type: "GET",
                success: function(Res) {
                    if (Res.status == "ok") {
                        let data = Res.data;
                        $('#Salesperson_Code').val(data.Salesperson_Code)
                        $('#Salesperson_Name').val(data.Salesperson_Name)
                        $('#Telephone_Number').val(data.Telephone_Number)
                        $('#Salesperson_position').val(data.Salesperson_position)
                        $('#Salesperson_status').val(data.Salesperson_status)
                        $('#Login_Code').val(data.Login_Code)
                        $('#Password_ID').val(data.Password_ID)
                        $('#employeeForm').valid();
                    }
                }
            });
    }
    //บันทึก
    $("#btnSave").on("click", function() {
        
        if ($('#employeeForm').valid()) {

            $.ajax({
                async: true,
                url: "../../services/employee/data.php?v=insertemploy",
                type: "POST",
                cache: false,
                data: $('#employeeForm').serialize(),
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

        if ($('#employeeForm').valid()) {
            let id = $('#btnSaveEdit').val();
            $.ajax({
                async: true,
                url: "../../services/employee/data.php?v=updateEmployAll&id=" + id,
                type: "POST",
                cache: false,
                data: $('#employeeForm').serialize(),
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
    

    $('#employeeForm').validate({
        rules: {
            Salesperson_Code: {
                required: true,
                alphanumeric: true,
            },
            Salesperson_Name: {
                required: true,

            },
            Telephone_Number: {
                required: true,
                digits: true, // ต้องเป็นตัวเลขเท่านั้น
                minlength: 10, // ต้องมีจำนวน 10 ตัว
                maxlength: 10
            },
            Salesperson_position: {
                required: true,
            },
            Login_Code: {
                required: true,
                alphanumeric: true,
                minlength: 1,
                maxlength: 10
            },
            Password_ID: {
                required: true,
                alphanumeric: true,
                minlength: 6,
                maxlength: 6
            },
        },
        messages: {
            Salesperson_Code: {
                required: "โปรดกรอกรหัสพนักงานขาย",
                alphanumeric: "โปรดกรอกรหัสผู้ใช้งานที่มีเฉพาะตัวเลขและตัวอักษร",
            },
            Salesperson_Name: {
                required: "โปรดกรอกรหัสผ่าน",
                alphanumeric: "โปรดกรอกรหัสผ่านที่มีเฉพาะตัวเลขและตัวอักษร",
            },
            Telephone_Number: {
                required: "กรุณากรอกเบอร์โทรศัพท์",
                digits: "กรุณากรอกเฉพาะตัวเลข",
                minlength: "กรุณากรอกเบอร์โทรศัพท์ที่มีจำนวน 10 ตัว"
            },
            Salesperson_position: {
                required: "กรุณาเลือกตำแหน่งพนักงานขาย",
            },
            Login_Code: {
                required: "กรุณากรอก USERNAME เข้าสู่ระบบ",
                digits: "กรุณากรอกเฉพาะตัวเลขและตัวอักษร A-ZA",
                minlength: "กรุณากรอกUSERNAME เข้าสู่ระบบ จำนวน 10 ตัว"
            },
            Password_ID: {
                required: "กรุณากรอกรหัสผ่านเข้าสู่ระบบ",
                digits: "กรุณากรอกเฉพาะตัวเลขและตัวอักษร A-ZA",
                minlength: "กรุณากรอกรหัสผ่านเข้าสู่ระบบ จำนวน 6 ตัว"
            }

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